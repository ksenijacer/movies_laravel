<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Requests\LoginReguest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json(200);
    }


    public function login(LoginReguest $request)
    {
        $credentials = $request->validated();
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid username or password'
            ]);
        }

        return [
            'access_token' => $token,
            'user' => Auth::user()
        ];
    }

    public function getActiveUser()
    {
        $activeUser = Auth::user();
        return response()->json($activeUser);
    }

    public function logout()
    {
        Auth::logout();
        return response(null);
    }

    public function refreshToken()
    {
        $token = Auth::refresh();
        return response()->json([
            'token' => $token
        ]);
    }
}
