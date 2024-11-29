<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class CheckinOutController extends Controller
{
    public function captureUserData(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Fetch user data
        $user = Users::find($request->user_id);

        // Capture data (this example simply returns it)
        return response()->json([
            'user_id' => $user->id,
            'username' => $user->username,
        ], 200);
    }

    public function index()
    {
        // Optionally, retrieve all captured check-in/out data
        // Here, assuming we just return sample data or user data.
        
        $users = Users::select('id', 'username')->get();

        return response()->json($users, 200);
    }
}

