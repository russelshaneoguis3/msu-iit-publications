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
        $users_data_no = DB::table('users')->where('email_status', 'no')->orderBy('uid', 'desc')->get();

        // Fetch all users from the database, ordered by 'uid' in descending order
        $users_data_yes = DB::table('users')->where('email_status', 'yes')->orderBy('uid', 'desc')->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.team', compact('users_data_no','users_data_yes','user'));
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

//-------------------------------------------------------------------------------------------------------------------------------


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


        $users_data = DB::table('users')
        ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
        ->leftJoin('research', 'users.uid', '=', 'research.r_user_id')
        ->leftJoin('presentation', 'users.uid', '=', 'presentation.pr_user_id')
        ->leftJoin('documentation', 'users.uid', '=', 'documentation.d_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->select(
            'users.uid',
            'users.first_name',
            'users.last_name',
            'users.email',
            DB::raw('COUNT(DISTINCT publications.p_id) as publication_count'),
            DB::raw('COUNT(DISTINCT research.r_id) as research_count'),
            DB::raw('COUNT(DISTINCT presentation.pr_id) as presentation_count'),
            DB::raw('COUNT(DISTINCT documentation.d_id) as documentation_count')
        )
        ->where('user_roles.u_role_id', '!=', 1)  // Exclude admin role
        ->where('users.email_status', '=', 'yes') // Only include users with email_status = 'yes'
        ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email')
        ->get();
    

        
        // Pass the user_id to the user dashboard view
        return view('users.team', compact('user', 'users_data'));
    }
}
