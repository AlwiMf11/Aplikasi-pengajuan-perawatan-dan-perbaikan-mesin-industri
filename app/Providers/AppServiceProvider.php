<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Blade;
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
        Schema::defaultStringLength(191);
            Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });
        view()->composer('layouts/navbars/navs/auth', function($view)
        {
            $view->with('permintaan', DB::table('permintaan')->where('status','open')->get());
            $view->with('perbaikan', DB::table('permintaan')->where('status','open')->where('type','perbaikan')->get());
            $view->with('perawatan', DB::table('permintaan')->where('status','open')->where('type','perawatan')->get());
            
        });

    }
}
