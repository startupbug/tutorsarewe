<?php

namespace App\Http\Controllers\Paypal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaction as TransactionModel;
use Auth;
use App\Wallet;
use App\WithdrawWallet;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Redirect;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\ResultPrinter;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;



class StudentPayment extends Controller
{
    //

    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }


    public function depositWallet(Request $request){
    	
    	$deposit = (float) $request->get('amount');

    	 // dd(gettype($amount));
    	$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal($deposit);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setDescription("this is paypal payment deposit")
		    ->setInvoiceNumber(md5(mt_rand()));

		//$baseUrl = getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(action('Paypal\StudentPayment@getDone'))
		    ->setCancelUrl(action('Paypal\StudentPayment@getCancel'));

		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));


		$response = $payment->create($this->apiContext);
		$redirectUrl = $response->links[1]->href;
		
		return \Redirect::to( $redirectUrl );
    }


    public function getDone(Request $request){

    	$paymentId = $request->paymentId;
		$token = $request->token;
		$payer_id = $request->PayerID;

		$payment = Payment::get($paymentId, $this->apiContext);


		$execution = new PaymentExecution();
    	$execution->setPayerId($payer_id);


    	$result = $payment->execute($execution, $this->apiContext);

	    $payment = Payment::get($paymentId, $this->apiContext);

	    TransactionModel::create([
	    	'user_id' => Auth::user()->id,
	    	'description' => $result,
	    	'type' => 'deposit',
	    ]);
	    $balance = Wallet::where('user_id', Auth::user()->id)->first(['balance']); 
	    Wallet::where('user_id', Auth::user()->id)->update([
	    	'balance' => $balance->balance + $result->transactions[0]->amount->total
	    ]);
    	
	    $this->set_session('Deposit successfully completed', true);
        return redirect()->route('my_balance');

    }

    public function getCancel()
	{
	    // Curse and humiliate the user for cancelling this most sacred payment (yours)
		
		dd($balance->balance);
	}


    public function accept_withdraw($id){
        
       $data['withdraws'] = WithdrawWallet::select('withdraw_wallets.id as wallet_id','withdraw_wallets.*', 'withdraw_wallets.created_at as date', 'users.*', 'wallets.*', 'roles.*')->leftJoin('users', 'users.id', '=', 'withdraw_wallets.user_id')
                                  ->leftJoin('wallets', 'wallets.user_id', '=', 'withdraw_wallets.user_id')
                                  ->leftJoin('roles', 'users.role_id', '=', 'roles.id')->orderBy('withdraw_wallets.created_at', 'desc')
                                  ->where('withdraw_wallets.id', $id)->first();
        
       $amount = $data['withdraws']->amount;
       $avl_balance = $data['withdraws']->balance;
       dd($data['withdraws']);
       
       //Deduct the Amount from Admin Paypal Account

       //Add amount to student paypal

       //Deduct amount from student wallet
       //
    }	
}
