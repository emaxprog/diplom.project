<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Repositories\Backend\Image;
use App\Observers\ImageObserver;
use App\Observers\ProductObserver;
use App\Repositories\Backend\Product;
use App\Models\Region;
use App\Models\Header;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        View::share('categories', Category::getCategories());
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
