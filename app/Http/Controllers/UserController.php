<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        $user = $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
            
        return $this->sendSuccess('User created successfully',$user,200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->sendSuccess('invalid_email_or_password',[],422);
            }
        } catch (JWTException $e) {
            return $this->sendSuccess('failed_to_create_token',[],500);
        }
        return $this->sendSuccess('Token is created',compact('token'),200);
    }

    public function getUserInfo(Request $request)
    {
        $user = JWTAuth::toUser($request->token);
        return $this->sendSuccess('Information',$user,200);
    }

    function logout()
    {
        JWTAuth::logout();

        return $this->sendSuccess('Successfully logged out');
    }
}
