<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    use DeleteModelTrait;
    private $role, $permission;

    public function __construct(Role $role, Permission $permission) {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index() {
        $roles = $this->role->all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        $permissionParents = $this->permission->where('parent_id', 0)->get();
        return view('admin.roles.create', compact('permissionParents'));
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();
            //insert data to table roles
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            //insert data to table permission_role
            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('list-roles');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function edit($id) {
        $permissionParents = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $roleOfPermissions = $role->permissions;
        return view('admin.roles.edit', compact('permissionParents', 'role', 'roleOfPermissions'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            //update data to table roles 
            $this->role->find($id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            $role = $this->role->find($id);
            //delete and insert data to table permission_role
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('list-roles');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->role, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
