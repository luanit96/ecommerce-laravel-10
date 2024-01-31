<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Services\PermissionGatePolicy;
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
        //define permission Gate and Policy
        $permissionGatePolicy = new PermissionGatePolicy();
        $permissionGatePolicy->setPermissionGatePolicy();
    }
}
