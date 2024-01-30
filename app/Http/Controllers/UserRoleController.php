<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    private $userRole;

    public function __construct(UserRole $userRole) {
        $this->userRole = $userRole;
    }

    public function index() {
        $userRoles = $this->userRole->all();
        return view('admin.user-role.index', compact('userRoles'));
    }
} 
