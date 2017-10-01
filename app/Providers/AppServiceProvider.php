<?php

namespace App\Providers;

use App\City;
use App\Country;
use App\Region;
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
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        view()->share('countries', $countries);
        view()->share('regions', $regions);
        view()->share('cities', $cities);
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
