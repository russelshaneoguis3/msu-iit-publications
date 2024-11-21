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
use App\Models\Research;
use Carbon\Carbon;

class ResearchController extends Controller
{


//Admin 
    public function adminResearch()
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

        
        // Fetch users and their publication count, excluding the admin and where email_status is 'yes'
        $usersResearch = DB::table('users')
            ->leftJoin('research', 'users.uid', '=', 'research.r_user_id')
            ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
            ->leftJoin('center', 'users.centerlab', '=', 'center.cid')
            ->select(
                'users.uid', 
                'users.first_name', 
                'users.last_name', 
                'users.email',
                'center.c_name as center_name',
                DB::raw('COUNT(research.date_started) as research_count'),
                DB::raw('MAX(CASE WHEN research.date_started IS NOT NULL THEN research.created_at ELSE NULL END) as last_upload')
            )
            ->where('user_roles.u_role_id', '!=', 1)  // Exclude admin role
            ->where('users.email_status', '=', 'yes') // Only include users with email_status = 'yes'
            ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email', 'center_name')
            ->get();

        // Process 'last_upload' to display the time difference
        $usersResearch = $usersResearch->map(function ($user) {
            if ($user->last_upload) {
                $user->last_upload_diff = Carbon::parse($user->last_upload)->diffForHumans();
            } else {
                $user->last_upload_diff = 'No uploads';
            }
            return $user;
        });

        // Fetch admin and their publication count, excluding the user
        $adminResearch = DB::table('research')
        ->where('r_user_id', '=', 1)
        ->orderBy('r_id', 'desc') // Order by p_id in descending order
        ->get();


        // Pass the user_id to the admin dashboard view
        return view('admin.research', compact('user', 'usersResearch', 'adminResearch'));
    }
    

    public function viewUserResearch($id)

    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    
        
        // Retrieve the user_id from the session
        $userId = session()->get('user_id');

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch the selected user's information
        $userinfo = DB::table('users')->where('uid', $id)->first();
    
        // Fetch all research of the selected user
        $researches = Research::where('r_user_id', $id)
        ->whereNotNull('research.date_started')
        ->get();
    
        // Return view with user and research data
        return view('admin.viewResearch', compact('user', 'userinfo', 'researches'));
    }
    
    public function viewCenterResearch($id)

    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    
        
        // Retrieve the user_id from the session
        $userId = session()->get('user_id');

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch the selected user's information
        $userinfo = DB::table('users')->where('uid', $id)->first();
    
        // Fetch all research of the selected user
        $researches = Research::where('r_user_id', $id)
        ->whereNotNull('research.date_started')
        ->get();
    
        // Return view with user and research data
        return view('admin.viewCenterResearch', compact('user', 'userinfo', 'researches'));
    }

//----------------------------------------------------------------------------------------------------------

// Users View -----------------------------------------------------------------------------------------------
    public function usersResearch()
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

       
        // Fetch the user's research from the database, ordered by r_id descending
        $usersResearch = DB::table('research')
        ->where('r_user_id', $userId)
        ->orderBy('r_id', 'desc') // Order by r_id in descending order
        ->get();

        // Pass the user_id to the user dashboard view
        return view('users.research', compact('user', 'usersResearch'));
    }

//----------------------------------------------------------------------------------------------------------


// Function ------------------------------------------------------------------------------------------------

public function addResearch(Request $request)
{
    $request->validate([
        'research_title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'leaders' => 'nullable|string',
        'members' => 'nullable|string',
        'research_type' => 'nullable|string',
        'so_no' => 'nullable|string|max:50',
        'so_link' => 'nullable|url',
        'date_duration' => 'nullable|string|max:50',
        'date_started' => 'nullable|date',
        'date_completed' => 'nullable|date',
        'cost' => 'nullable|string|max:255',
        'funding_source' => 'nullable|string|max:100',
        'file_path' => 'nullable|file|mimes:pdf|max:2048',
        'link' => 'nullable|url',
    ]);

    // Check if at least one of the fields is provided
    if (!$request->hasFile('file_path') && !$request->filled('link')) {
        return redirect()->back()->with('error', 'Please provide either a PDF file or a link.')->withInput();
    }

    $research = new Research();
    $research->research_title = $request->research_title;
    $research->description = $request->description;

    $research->leaders = $request->leaders;
    $research->members = $request->members;
    $research->research_type  = $request->research_type;
    $research->so_no = $request->so_no;

    // Handle link input
    if ($request->filled('so_link')) {
            $research->so_link = $request->so_link;
    }

    $research->date_duration = $request->date_duration;
    $research->date_started = $request->date_started;
    $research->date_completed = $request->date_completed;
    $research->cost = $request->cost;
    $research->funding_source = $request->funding_source;

    // Retrieve user ID from the session and save it in r_user_id
    if (session()->has('user_id')) {
        $userId = session()->get('user_id');
        $research->r_user_id = $userId;
    } else {
        return redirect()->back()->with('error', 'User not found in session.')->withInput();
    }

    // Handle file upload
    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        
        // Get the original file name without the extension
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        // Generate a unique name using original file name and a UUID
        $uniqueFileName = $originalFileName . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        
        // Save the file to the public/files directory
        $filePath = $file->move(public_path('files'), $uniqueFileName);
        
        // Save the relative path to the database
        $research->r_file_path = 'files/' . $uniqueFileName; 
    }

    // Handle link input
    if ($request->filled('link')) {
        $research->r_link = $request->link;
    }

    $research->save();

    return redirect()->back()->with('success', 'Research added successfully!');
}


//update Research functions
public function updateResearch(Request $request, $id)
{
    $request->validate([
        'research_title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'leaders' => 'nullable|string',
        'members' => 'nullable|string',
        'research_type' => 'nullable|string',
        'so_no' => 'nullable|string|max:50',
        'so_link' => 'nullable|url',
        'date_duration' => 'nullable|string|max:50',
        'date_started' => 'nullable|date',
        'date_completed' => 'nullable|date',
        'cost' => 'nullable|string|max:255',
        'funding_source' => 'nullable|string|max:100',
        'file_path' => 'nullable|file|mimes:pdf|max:2048',
        'link' => 'nullable|url',
    ]);

    // Find the research by ID
    $research = Research::findOrFail($id);
    $research->research_title = $request->research_title;
    $research->description = $request->description;

    $research->leaders = $request->leaders;
    $research->members = $request->members;
    $research->research_type  = $request->research_type;
    $research->so_no = $request->so_no;
    $research->date_duration = $request->date_duration;
    $research->date_started = $request->date_started;
    $research->date_completed = $request->date_completed;
    $research->cost = $request->cost;
    $research->funding_source = $request->funding_source;

    // Handle file upload
    if ($request->hasFile('file_path')) {
        // Delete the old file if it exists
        if ($research->r_file_path && file_exists(public_path($research->r_file_path))) {
            unlink(public_path($research->r_file_path)); // Delete old file
        }

        $file = $request->file('file_path');
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $uniqueFileName = $originalFileName . '' .Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files'), $uniqueFileName);
        $research->r_file_path = 'files/' . $uniqueFileName; // Save the relative path to the database
    }

    // Handle link input
    if ($request->filled('link')) {
        $research->r_link = $request->link;
    } else {
        // If the link field is empty, set it to null
        $research->r_link = null;
    }

    $research->save();

    return redirect()->back()->with('success', 'Research updated successfully!');
}

}
