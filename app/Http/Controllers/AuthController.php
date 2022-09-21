<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $token = Auth::login($user);

        return response()->json([
            'token' => $token,
            'user' => Auth::user(),
        ],200);

        
    }
    

    public function login() {

    }

    public function getMyProfile() {
    
    }

    public function logout() {

    }

    public function refreshToken() {

    }
}
