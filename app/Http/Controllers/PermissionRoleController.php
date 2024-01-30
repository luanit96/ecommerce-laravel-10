<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionRole;

class PermissionRoleController extends Controller
{
    private $permissionRole;
    
    public function __construct(PermissionRole $permissionRole) {
        $this->permissionRole = $permissionRole;
    }
    public function index() {
        $permissionRoles = $this->permissionRole->all();
        return view('admin.permission-role.index', compact('permissionRoles'));
    }
}
