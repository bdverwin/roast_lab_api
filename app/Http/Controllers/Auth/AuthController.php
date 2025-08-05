<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthServices\AuthManager;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected AuthManager $authManager;

    public function __construct(AuthManager $authManager){
        $this->authManager = $authManager;
    }

    public function login(AuthRequest $request){
        $user = $this->authManager->login($request->validated());

        return response()->json(['data' => $user]);
    }

    public function register(AuthRequest $request){
        $user = $this->authManager->register($request->validated());

        return response()->json(['data' => $user]);
    }

    public function logout(Request $request){
        $user = $this->authManager->logout($request->user());

        return response()->json(['data' => $user]);
    }

    public function getUserDetails(Request $request){
        $dataResponse = [
            "user" => $request->user()
        ];

        $dataResponse['user'] = $request->user()->fresh('userInfo');
        
        return $dataResponse;
    }
}