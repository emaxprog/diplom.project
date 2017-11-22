<?php

namespace App\Providers;

use App\Policies\ProductPolicy;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        Gate::define('view-admin', function ($user) {
            return $user->hasPermission('view-admin');
        });
    }
}
