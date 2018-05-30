<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use DB;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

         view()->composer('*', function ($view) {
                 
            if(Auth::check())
            {
                $wallet = DB::table('wallets')                               
                                    ->where('user_id','=',Auth::user()->id)
                                    ->first(['balance']);
 
                View::composer('dashboard.partials.dashboard-sidebar', function($view) use($wallet)
                {
                    $view->with('wallet',$wallet);
                });
            }   
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
