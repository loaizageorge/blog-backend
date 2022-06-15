<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $authenticated = Auth::attempt($credentials);

        // this token should be stored on the front end and passed along in the header: 'Authorization' => Bearer.$token
        if ($authenticated) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(['token' => $token]);
        }
        return response(['errors' => 'Login failed. Please check your credentials and try again.'], 401);

    }

    public function logout()
    {
        Auth::logout();
    }


    public function getCurrentUser()
    {
        return auth()->user();
    }
}
