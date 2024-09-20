<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        $about = DB::table('about')->first();
        \Illuminate\Support\Facades\View::share('about', $about);
        $price_classified = DB::table('package_price')->first();
        \Illuminate\Support\Facades\View::share('config_price',$price_classified);

        
    }
}
