<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Successfully logged in',
                'user' => Auth::user(),
            ]);
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
