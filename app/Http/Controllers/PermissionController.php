<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Core\PermissionRecusive;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\EditPermissionRequest;

class PermissionController extends Controller
{
    use DeleteModelTrait;
    private $permission;

    public function __construct(Permission $permission) {
        $this->permission = $permission;
    }

    public function index() {
        $permissions = $this->permission->all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create() {
        $htmlOptions = $this->getPermission($parentId = '');
        return view('admin.permissions.create', compact('htmlOptions'));
    }

    public function getPermission($parentId) {
        $recusive = new PermissionRecusive();
        $htmlOptions = $recusive->getPermissionRecusive($parentId);
        return $htmlOptions;
    }

    public function store(AddPermissionRequest $request) {
        $this->permission->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'parent_id' => $request->parent_id,
            'key_code' => $request->parent_id != 0 ? Str::slug($request->name) : ''
        ]);
        return redirect()->route('list-permissions');
    }

    public function edit($id) {
        $permission = $this->permission->find($id);
        $htmlOptions = $this->getPermission($permission->parent_id);
        return view('admin.permissions.edit', compact('permission', 'htmlOptions'));
    }

    public function update(EditPermissionRequest $request, $id) {
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        return redirect()->route('list-roles');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->permission, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
