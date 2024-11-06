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

class AuthController extends Controller
{

    public function showCenters()
    {
        // Fetch all centers
        $centers = DB::table('center')->select('cid', 'c_name')->get();
    
        // Pass the centers data to the view
        return view('register', compact('centers'));
    }
    
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|regex:/@g.msuiit.edu.ph$/|unique:users,email|max:100',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'This email address is already registered. Please use another My.IIT email.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Hash the password
        $hashedPassword = Hash::make($request->password);
    
        // Generate a token for email verification
        $token = Str::random(60);
    
        // Insert user data into the database
        DB::table('users')->insert([
            'centerlab' => $request->centerlab,  // Save `cid` here
            'email' => $request->email,
            'password' => $hashedPassword,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'token' => $token,  // Store the token for email verification
            'email_status' => 'no',  // Set default email_status to 'no'
            'created_at' => now(),
        ]);
    
        // Send the verification email
        Mail::to($request->email)->send(new VerifyEmail($token));
    
        // Return with a success message
        return redirect()->route('login')->with('status', 'Registration successful! Please check your email to verify your account. If you do not see it in your inbox, please check your spam folder. You can also contact the admin for manual verification.');
    }

    public function verifyEmail($token)
    {
        // Find the user by token
        $user = DB::table('users')->where('token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid verification token.');
        }

        // Update email status to 'yes'
        DB::table('users')
            ->where('uid', $user->uid)
            ->update(['email_status' => 'yes', 'token' => null]); // Remove the token

        return redirect()->route('login')->with('status', 'Email verified! You can now log in.');
    }

        public function login(Request $request)
    {
        // Validate the login input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the user by email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'Email address is not registered');
        }

        // Check if the email is verified
        if ($user->email_status === 'no') {
            return redirect()->back()->with('error', 'Please verify your email address before logging in.');
        }

        // Check if the password matches
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid password.');
        }

        // Retrieve the role from the user_roles table
        $user_role = DB::table('user_roles')->where('user_id', $user->uid)->first();

        // Check if the role exists
        if (!$user_role) {
            return redirect()->back()->with('error', 'User role not found.');
        }

        // Set session data
        session(['user_id' => $user->uid, 'role_id' => $user_role->u_role_id]);

        // Redirect based on the user role
        if ($user_role->u_role_id == 1) {  // Admin role
            return redirect()->route('admin.dashboard')->with('status', 'Login successful! Welcome Admin.');
        } else if ($user_role->u_role_id == 2) {  // User role
            return redirect()->route('users.dashboard')->with('status', 'Login successful! Welcome User.');
        }

        // Default case (just in case)
        return redirect()->route('login')->with('error', 'Unable to determine user role.');
    }
    

        public function logout(Request $request)
    {
        // Remove user session data
        $request->session()->flush(); // This clears all session data

        // Optionally, you can use session()->forget() if you want to clear specific session variables:
        // $request->session()->forget('user_id');
        // $request->session()->forget('role_id');

        // Redirect to login page
        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }

}
