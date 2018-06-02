<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AnalyticsController;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use DB;
use App\Activity_log;
use App\WithdrawWallet;
use App\Todo;
use App\Page;

class AdminController extends Controller
{
    public function index(){

        if(env('ANALYTICS_CONFIGURED') == TRUE){
           $analytics = new AnalyticsController;
           $data['country'] = $analytics->getCountries();
        }

           $data['usercount'] = User::all()->count();
           $data['today_usercount'] = User::whereDate('created_at', DB::raw('CURDATE()'))->count();
           $data['activitylogcount'] = Activity_log::all()->count();
           $data['today_activitylogcount'] = Activity_log::whereDate('created_at', DB::raw('CURDATE()'))->count();
           $data['todocount'] = Todo::all()->count(); 
           $data['com_todocount'] = Todo::where('status', 2)->count();

           $data['pagecount'] = Page::all()->count();

           return view('admin.index')->with($data);
    }

    public function usermanagement_index(){

    	return view('admin.user-management');
    }

    //Activity Log Controller
    public function activitylog_index(){
        $data['activity_logs'] = Activity_log::select('users.first_name', 'activity_log.*')
                                    ->leftjoin('users', 'users.id', '=', 'activity_log.user_id')->get();        
        return view('admin.activitylog.index')->with($data);
    }   


    public function transactions(){
      $data['transactions'] = Transaction::all();
      return view('admin.transactions.transactions')->with($data);
    }  


    public function withdraws(){
      $data['withdraws'] = WithdrawWallet::select('withdraw_wallets.id as wallet_id', 'withdraw_wallets.*', 'withdraw_wallets.created_at as date', 'users.*', 'wallets.*', 'roles.*')->leftJoin('users', 'users.id', '=', 'withdraw_wallets.user_id')
                            ->leftJoin('wallets', 'wallets.user_id', '=', 'withdraw_wallets.user_id')
                            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')->orderBy('withdraw_wallets.created_at', 'desc')->get();
        //dd($data['withdraws']);
      return view('admin.transactions.withdraw')->with($data);
    } 


    public function transaction_detail($id){
      try {

        $data['transaction'] = Transaction::find($id);
        $data['description'] = json_decode($data['transaction']->description);
        return view('admin.transactions.transaction_detail')->with($data);
          
      } catch (Exception $e) {
          print_r($e);
      }
    }


}
