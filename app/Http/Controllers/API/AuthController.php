<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['username'] = $user->username;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Login Sucessfully'
            ];

            return response()->json($response, 200); 
        }else{
            $response = [
                'success' => false,
                'message' => 'User failed to login'
            ];

            return response()->json($response, 200); 
        }
    }

    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();
        
        return response()->json(['success' => 'logged out'], 200);
    }
}
