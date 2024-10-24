<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{


//Admin 
    public function adminTeam()
    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Optionally, check if the user is an admin
        if (session('role_id') != 1) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        // Retrieve the user_id from the session
        $userId = session()->get('user_id');

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch all users from the database, ordered by 'uid' in descending order
        $users_data = DB::table('users')->orderBy('uid', 'desc')->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.team', compact('users_data','user'));
    }
    

 //Verify email users   
    public function editUser($uid)
{
    // Check if the user is an admin
    if (session('role_id') != 1) {
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    // Find the user by their UID
    $user = DB::table('users')->where('uid', $uid)->first();

    if (!$user) {
        return redirect()->route('admin.team')->with('error', 'User not found.');
    }

    // Update email_status to 'yes' and set token to null
    DB::table('users')
        ->where('uid', $uid)
        ->update([
            'email_status' => 'yes',
            'token' => null,
        ]);

    // Return JSON response with a success message
    return response()->json(['message' => 'User Email Address was successfully verified.']);
}


//User
    public function usersTeam()
    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Optionally, check if the user is not an admin
        if (session('role_id') != 2) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        // Retrieve the user_id from the session
        $userId = session()->get('user_id');

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch all users from the database, ordered by 'uid' in descending order
        $users_data = DB::table('users')->where('email_status', '=', 'yes')->where('uid', '!=', 1)->orderBy('created_at', 'desc')->get();
        
        // Pass the user_id to the user dashboard view
        return view('users.team', compact('user', 'users_data'));
    }
}
