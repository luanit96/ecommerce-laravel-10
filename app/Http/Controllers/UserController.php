<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class UserController extends Controller
{
    use DeleteModelTrait;
    private $user, $role;

    public function __construct(User $user, Role $role) {
        $this->user = $user;
        $this->role = $role;
    }

    public function index() {
        $users = $this->user->all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        $roles = $this->role->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();
            //insert data to table users 
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            //insert data to table roles
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('list-users');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function edit($id) {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $userOfRoles = $user->roles;
        return view('admin.users.edit', compact('roles', 'user', 'userOfRoles'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            //update data to table users 
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            //insert data to table roles
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('list-users');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->user, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
