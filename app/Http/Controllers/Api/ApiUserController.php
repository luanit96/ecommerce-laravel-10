<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function register(ApiRegisterRequest $request) {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function login(ApiLoginRequest $request) {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $user = User::where('email', $request->email)->first();
            $user->token = $user->createToken('UserToken')->accessToken;
            return response()->json($user);
        }
    }

    public function userInfo(Request $request) {
        return auth('api')->user();
    }

    public function logout(Request $request) {
        if (Auth::check()) {
            $request->user()->tokens->each(function ($token) {
                $token->delete();
            });
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
    }
}
