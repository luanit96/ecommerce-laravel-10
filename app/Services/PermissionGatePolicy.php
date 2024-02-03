<?php

namespace App\Services;

use App\Policies\TagPolicy;
use App\Policies\MenuPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\AdminPolicy;
use App\Policies\SliderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\SettingPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserRolePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductTagPolicy;
use App\Policies\ProductImagePolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\PermissionRolePolicy;

class PermissionGatePolicy {
    public function setPermissionGatePolicy() {
        //define gate category
        $this->defineGateCategory();
        //define gate menu
        $this->defineGateMenu();
        //define gate product
        $this->defineGateProduct();
        //define gate product image
        $this->defineGateProductImage();
        //define gate product tag
        $this->defineGateProductTag();
        //define gate tag
        $this->defineGateTag();
        //define gate slider
        $this->defineGateSlider();
        //define gate setting
        $this->defineGateSetting();
        //define gate user
        $this->defineGateUser();
        //define gate role
        $this->defineGateRole();
        //define gate permission
        $this->defineGatePermission();
        //define gate user role
        $this->defineGateUserRole();
        //define gate permission role
        $this->defineGatePermissionRole();
        //define gate dashboard
        $this->defineGateDashboard();
    }

    /* Define gate category*/
    public function defineGateCategory() {
        Gate::define('list-category', [CategoryPolicy::class, 'view']);
        Gate::define('add-category', [CategoryPolicy::class, 'create']);
        Gate::define('edit-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
    }

    /* Define gate menu*/
    public function defineGateMenu() {
        Gate::define('list-menu', [MenuPolicy::class, 'view']);
        Gate::define('add-menu', [MenuPolicy::class, 'create']);
        Gate::define('edit-menu', [MenuPolicy::class, 'update']);
        Gate::define('delete-menu', [MenuPolicy::class, 'delete']);
    }

    /* Define gate product*/
    public function defineGateProduct() {
        Gate::define('list-product', [ProductPolicy::class, 'view']);
        Gate::define('add-product', [ProductPolicy::class, 'create']);
        Gate::define('edit-product', [ProductPolicy::class, 'update']);
        Gate::define('delete-product', [ProductPolicy::class, 'delete']);
    }

    /* Define gate product image */
    public function defineGateProductImage() {
        Gate::define('list-product-image', [ProductImagePolicy::class, 'view']);
    }

    /* Define gate product tag */
    public function defineGateProductTag() {
        Gate::define('list-product-tag', [ProductTagPolicy::class, 'view']);
    }

    /* Define gate tag*/
    public function defineGateTag() {
        Gate::define('list-tag', [TagPolicy::class, 'view']);
        Gate::define('add-tag', [TagPolicy::class, 'create']);
        Gate::define('edit-tag', [TagPolicy::class, 'update']);
        Gate::define('delete-tag', [TagPolicy::class, 'delete']);
    }

    /* Define gate slider*/
    public function defineGateSlider() {
        Gate::define('list-slider', [SliderPolicy::class, 'view']);
        Gate::define('add-slider', [SliderPolicy::class, 'create']);
        Gate::define('edit-slider', [SliderPolicy::class, 'update']);
        Gate::define('delete-slider', [SliderPolicy::class, 'delete']);
    }

    /* Define gate setting*/
    public function defineGateSetting() {
        Gate::define('list-setting', [SettingPolicy::class, 'view']);
        Gate::define('add-setting', [SettingPolicy::class, 'create']);
        Gate::define('edit-setting', [SettingPolicy::class, 'update']);
        Gate::define('delete-setting', [SettingPolicy::class, 'delete']);
    }

    /* Define gate user*/
    public function defineGateUser() {
        Gate::define('list-user', [UserPolicy::class, 'view']);
        Gate::define('add-user', [UserPolicy::class, 'create']);
        Gate::define('edit-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
    }

    /* Define gate role*/
    public function defineGateRole() {
        Gate::define('list-role', [RolePolicy::class, 'view']);
        Gate::define('add-role', [RolePolicy::class, 'create']);
        Gate::define('edit-role', [RolePolicy::class, 'update']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);
    }

    /* Define gate permission */
    public function defineGatePermission() {
        Gate::define('list-permission', [PermissionPolicy::class, 'view']);
        Gate::define('add-permission', [PermissionPolicy::class, 'create']);
        Gate::define('edit-permission', [PermissionPolicy::class, 'update']);
        Gate::define('delete-permission', [PermissionPolicy::class, 'delete']);
    }

    /* Define gate user role */
    public function defineGateUserRole() {
        Gate::define('list-user-role', [UserRolePolicy::class, 'view']);
    }

    /* Define gate permission role */
    public function defineGatePermissionRole() {
        Gate::define('list-permission-role', [PermissionRolePolicy::class, 'view']);
    }

    /* Define gate dashboard */
    public function defineGateDashboard() {
        Gate::define('dashboard', [AdminPolicy::class, 'view']);
    }

}
