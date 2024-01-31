<?php

namespace App\Providers;

use App\Policies\TagPolicy;
use App\Policies\MenuPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\SliderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\SettingPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserRolePolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\PermissionRolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //define gate category
        $this->defineGateCategory();
        //define gate menu
        $this->defineGateMenu();
        //define gate product
        $this->defineGateProduct();
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
    }

    public function defineGateCategory() {
        Gate::define('list-category', [CategoryPolicy::class, 'view']);
        Gate::define('add-category', [CategoryPolicy::class, 'create']);
        Gate::define('edit-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
    }

    public function defineGateMenu() {
        Gate::define('list-menu', [MenuPolicy::class, 'view']);
        Gate::define('add-menu', [MenuPolicy::class, 'create']);
        Gate::define('edit-menu', [MenuPolicy::class, 'update']);
        Gate::define('delete-menu', [MenuPolicy::class, 'delete']);
    }

    public function defineGateProduct() {
        Gate::define('list-product', [ProductPolicy::class, 'view']);
        Gate::define('add-product', [ProductPolicy::class, 'create']);
        Gate::define('edit-product', [ProductPolicy::class, 'update']);
        Gate::define('delete-product', [ProductPolicy::class, 'delete']);
    }

    public function defineGateTag() {
        Gate::define('list-tag', [TagPolicy::class, 'view']);
        Gate::define('add-tag', [TagPolicy::class, 'create']);
        Gate::define('edit-tag', [TagPolicy::class, 'update']);
        Gate::define('delete-tag', [TagPolicy::class, 'delete']);
    }

    public function defineGateSlider() {
        Gate::define('list-slider', [SliderPolicy::class, 'view']);
        Gate::define('add-slider', [SliderPolicy::class, 'create']);
        Gate::define('edit-slider', [SliderPolicy::class, 'update']);
        Gate::define('delete-slider', [SliderPolicy::class, 'delete']);
    }

    public function defineGateSetting() {
        Gate::define('list-setting', [SettingPolicy::class, 'view']);
        Gate::define('add-setting', [SettingPolicy::class, 'create']);
        Gate::define('edit-setting', [SettingPolicy::class, 'update']);
        Gate::define('delete-setting', [SettingPolicy::class, 'delete']);
    }

    public function defineGateUser() {
        Gate::define('list-user', [UserPolicy::class, 'view']);
        Gate::define('add-user', [UserPolicy::class, 'create']);
        Gate::define('edit-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
    }

    public function defineGateRole() {
        Gate::define('list-role', [RolePolicy::class, 'view']);
        Gate::define('add-role', [RolePolicy::class, 'create']);
        Gate::define('edit-role', [RolePolicy::class, 'update']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);
    }

    public function defineGatePermission() {
        Gate::define('list-permission', [PermissionPolicy::class, 'view']);
        Gate::define('add-permission', [PermissionPolicy::class, 'create']);
        Gate::define('edit-permission', [PermissionPolicy::class, 'update']);
        Gate::define('delete-permission', [PermissionPolicy::class, 'delete']);
    }

    public function defineGateUserRole() {
        Gate::define('list-user-role', [UserRolePolicy::class, 'view']);
    }

    public function defineGatePermissionRole() {
        Gate::define('list-permission-role', [PermissionRolePolicy::class, 'view']);
    }
}
