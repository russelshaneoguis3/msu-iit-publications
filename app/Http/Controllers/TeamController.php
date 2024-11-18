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
use App\Models\Team;

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

        // Fetch all users with 'email_status' = 'no' and their assigned center, ordered by 'uid' in descending order
        $users_data_no = DB::table('users')
            ->leftjoin('center', 'users.centerlab', '=', 'center.cid')  // Perform join with the center table
            ->where('users.email_status', 'no')
            ->orderBy('users.uid', 'desc')
            ->select('users.*', 'center.c_name as center_name')  // Select user columns and the center name
            ->get();

        // Fetch all users with 'email_status' = 'yes' and their assigned center, ordered by 'uid' in descending order
        $users_data_yes = DB::table('users')
            ->leftjoin('center', 'users.centerlab', '=', 'center.cid')  // Perform join with the center table
            ->where('users.email_status', 'yes')
            ->orderBy('users.uid', 'desc')
            ->select('users.*', 'center.c_name as center_name')  // Select user columns and the center name
            ->get();

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

    // Fetch the user information from the database, including the center name
    $user = DB::table('users')
        ->leftJoin('center', 'users.centerlab', '=', 'center.cid')
        ->select('users.*', 'center.c_name as center_name', 'users.centerlab') // Make sure centerlab is selected
        ->where('users.uid', $userId)
        ->first();

    // Fetch all centers
    $centers = DB::table('center')->select('cid', 'c_name')->get();

    // Fetch team data with joined center name
    $users_data = DB::table('users')
        ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
        ->leftJoin('research', 'users.uid', '=', 'research.r_user_id')
        ->leftJoin('presentation', 'users.uid', '=', 'presentation.pr_user_id')
        ->leftJoin('documentation', 'users.uid', '=', 'documentation.d_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->leftJoin('center', 'users.centerlab', '=', 'center.cid')
        ->select(
            'users.uid',
            'center.c_name as center_name', // Fetch center name here
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
        ->where('users.uid', '!=', $userId)
        ->groupBy(
            'users.uid',
            'center.c_name',
            'users.first_name',
            'users.last_name',
            'users.email'
        )
        ->orderBy('center.c_name', 'ASC')    // Order by center name
        ->orderBy('users.uid', 'DESC')       // Then by user ID
        ->get();

    // Return the view with the user data, team data, and centers
    return view('users.team', compact('user', 'users_data', 'centers'));
}


public function updatePersonal(Request $request, $uid)
{
    // Validate the incoming request
    $request->validate([
        'email' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'centerlab' => 'required|exists:center,cid',
    ]);

    // Find the user by UID
    $user = Team::findOrFail($uid);

    // Update the user details
    $user->email = $request->input('email');
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->centerlab = $request->input('centerlab');

    // Save the changes
    $user->save();

    // Redirect back with a success message
    return redirect()->route('users.team')->with('success', 'Personal details updated successfully.');
}

}
