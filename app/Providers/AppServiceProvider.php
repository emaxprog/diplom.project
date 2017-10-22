<?php

namespace App\Providers;

use App\Category;
use App\City;
use App\Country;
use App\Image;
use App\Observers\ImageObserver;
use App\Observers\ProductObserver;
use App\Product;
use App\Region;
use App\Header;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Image::observe(ImageObserver::class);
        Product::observe(ProductObserver::class);
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
