<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            
            return response()->json(['message' => 'Login successful','token' => auth()->user()->createToken('api-token')->plainTextToken, 'user' => auth()->user()], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

   
}
