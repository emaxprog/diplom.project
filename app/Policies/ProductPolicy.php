<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\Models\Backend\User $user
     * @param  \App\Models\Backend\Product $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return $user->hasPermission('view-product');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\Models\Backend\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-product');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\Models\Backend\User $user
     * @param  \App\Models\Backend\Product $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return $user->hasPermission('update-product');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\Models\Backend\User $user
     * @param  \App\Models\Backend\Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $user->hasPermission('delete-product');
    }
}
