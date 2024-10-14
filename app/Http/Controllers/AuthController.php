<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyEmail; 
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|regex:/@g.msuiit.edu.ph$/|unique:users,email|max:100',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'This email address is already registered. Please use another My.IIT email.', // Custom message
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
            'email' => $request->email,
            'password' => $hashedPassword,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'token' => $token, // Store the token for email verification
            'email_status' => 'no', // Set default email_status to 'no'
            'created_at' => now(),
        ]);
    
        // Send the verification email
        Mail::to($request->email)->send(new VerifyEmail($token));
    
        // Return with a success message
        return redirect()->route('login')->with('status', 'Registration successful! Please check your email to verify your account. If you do not see it in your inbox, please check your spam folder.');
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


}