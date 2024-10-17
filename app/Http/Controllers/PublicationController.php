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

class PublicationController extends Controller
{


//Admin 
    public function adminPublication()
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

        // Pass the user_id to the admin dashboard view
        return view('admin.publication', compact('userId'));
    }
    


//User
    public function usersPublication()
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

        // Pass the user_id to the user dashboard view
        return view('users.publication', compact('userId'));
    }

}
