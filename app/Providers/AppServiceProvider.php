<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Session;
use Redirect;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['master'], function ($view) {
            if(session::has('id')){
                $kh = DB::table('khachhang')
                ->where('MaKH','=',Session('id'))
                ->first();
                $img = $kh->IMG;
            }
            else
                $img = "";
            $view->with(compact('img'));
        });
    }
}
