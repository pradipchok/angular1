<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Product;
use App\Service;
use App\Banner;

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

        view()->composer('*', function($view)
        {
            $view->with('serviceMenu', Service::where('status',1)->get());
            $view->with('productMenu', Product::where('parent_id', 0)->get());
            $view->with('banners', Banner::where('status',1)->orderBy('sequence')->get());
        });

    }
}
