<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Hash;
use Auth;
use Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;

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

    public function store(UserRequest $request) {
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

    public function update(EditUserRequest $request, $id) {
        $checkPassword = $this->checkPasswordConfirm($request, $id);
        if(!$checkPassword) return redirect()->back();
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

            //check user to logout
            if(auth()->id() == $id) Auth::logout();
            
            DB::commit();
            return redirect()->route('list-users');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function checkPasswordConfirm($request, $id) {
        $user = $this->user->find($id);
        $newPassword = Hash::make($request->password);
        if(Hash::check($request->old_password, $user->password)) {
            if(!Hash::check($request->old_password, $newPassword)) {
                return true;
            } else {
                Session::flash('error', 'The new password can not duplicate the old password');
                return false;
            }
        } else {
            Session::flash('error', 'Old password is wrong');
            return false;
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
