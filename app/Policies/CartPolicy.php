<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.cart.list-cart'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.cart.show-cart'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.cart.delete-cart'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Cart $cart)
    {
        //
    }
}
