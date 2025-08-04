<?php

namespace App\Services\AuthServices;

use App\Services\AuthServices\AuthManager;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthService implements AuthManager {

    public function login(array $data){
        $user = User::where('email', $data['email'])->first();

        $hasCorrectCredentials = $user && Hash::check($data['password'], $user->password);
        if(! $hasCorrectCredentials){
            return [
                'message' => 'Invalid credentials'
            ];

        }

        $token = $user->createToken('api-token')->plainTextToken;
        $dataResponse = [
            'token' => $token,
            'user' => $user
        ];

        // $dataResponse['user'] = $user->fresh('UserInfo');
        return $dataResponse;
    }
    
    public function register(array $data){
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // $user->userInfo()->create($data);

        $token = $user->createToken('api-token')->plainTextToken;
        $dataResponse = [
            'token' => $token,
            'user' => $user
        ];

        // $dataResponse['user'] = $user->fresh('userInfo');

        return $dataResponse;
    }

    public function logout($user){
        $user->currentAccessToken()->delete();

        return [
            'message' => 'logged out.',
        ];
    }

}