<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find user by username
        $user = Users::where('username', $request->username)->first();

        // Check if user exists and verify password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Create a token for the user if authentication is successful
        $token = $user->createToken('User Token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}