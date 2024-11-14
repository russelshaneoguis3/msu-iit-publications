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
use App\Models\Presentation;

class PresentationController extends Controller
{


//Admin view -------------------------------------------------------------------------------------------------------------------------------------------
    public function adminPresentation()
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

        // Fetch users and their presentation count, excluding the admin and where email_status is 'yes'
        $usersPresentation = DB::table('users')
        ->leftJoin('presentation', 'users.uid', '=', 'presentation.pr_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->select('users.uid', 'users.first_name', 'users.last_name', 'users.email', DB::raw('COUNT(presentation.pr_id) as presentation_count'))
        ->where('user_roles.u_role_id', '!=', 1)  // Exclude admin role
        ->where('users.email_status', '=', 'yes') // Only include users with email_status = 'yes'
        ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email')
        ->get();

        // Fetch admin and their presentation count, excluding the user
        $adminPresentation = DB::table('presentation')
        ->where('pr_user_id', '=', 1)
        ->orderBy('pr_id', 'desc') // Order by pr_id in descending order
        ->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.presentation', compact('user', 'usersPresentation', 'adminPresentation'));
    }

    public function viewUserPresentation($id)

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
    
        // Fetch all publications of the selected user
        $presentations = Presentation::where('pr_user_id', $id)->get();
    
        // Return view with user and publications data
        return view('admin.viewPresentation', compact('user', 'userinfo', 'presentations'));
    }
    
    
//-----------------------------------------------------------------------------------------------------------------------------------


//User -------------------------------------------------------------------------------------------------------------------------------
    public function usersPresentation()
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

       
        // Fetch the user's presentation from the database, ordered by pr_id descending
        $usersPresentation = DB::table('presentation')
        ->where('pr_user_id', $userId)
        ->orderBy('pr_id', 'desc') // Order by pr_id in descending order
        ->get();

        // Pass the user_id to the user dashboard view
        return view('users.presentation',  compact('user', 'usersPresentation'));
    }

    
// Functions ----------------------------------------------------------------------------------------------------------------------------
public function addPresentation(Request $request)
{
    $request->validate([
        'research_title' => 'required|string',
        'research_project_title' => 'nullable|string',
        'fund' => 'nullable|string',
        'research_type' => 'nullable|string',
        'so_no' => 'nullable|string',
        'researcher_name' => 'nullable|string',
        'presenter_name' => 'nullable|string',
        'date_duration' => 'nullable|string',
        'date_started' => 'nullable|date',
        'date_completed' => 'nullable|date',
        'cost' => 'nullable|string',
        'funding_source' => 'nullable|string',
        'presentation_type' => 'nullable|string',
        'conference_type' => 'nullable|string',
        'conference_title' => 'nullable|string',
        'venue' => 'nullable|string',
        'conference_date' => 'nullable|string',
        'organizer' => 'nullable|string',
        'article_title' => 'nullable|string',
        'publication_date' => 'nullable|string',
        'journal_title' => 'nullable|string',
        'editor' => 'nullable|string',
        'publisher' => 'nullable|string',
        'vol_issue_no' => 'nullable|string',
        'page_no' => 'nullable|string',
        'publication_type' => 'nullable|string',
        'indexing' => 'nullable|string',
        'file_path' => 'nullable|file|mimes:pdf|max:2048', // Allow only PDF files
        'link' => 'nullable|url',
    ]);

    // Check if at least one of the fields is provided
    if (!$request->hasFile('file_path') && !$request->filled('link')) {
        return redirect()->back()->with('error', 'Please provide either a PDF file or a link.')->withInput();
    }

    $presentation = new Presentation();
    $presentation->research_title = $request->research_title;
    $presentation->research_project_title = $request->research_project_title;

    $presentation->fund = $request->fund;
    $presentation->research_type = $request->research_type;
    $presentation->so_no = $request->so_no;
    $presentation->researcher_name = $request->researcher_name;
    $presentation->presenter_name = $request->presenter_name;
    $presentation->date_duration = $request->date_duration;
    $presentation->date_started = $request->date_started;
    $presentation->date_completed = $request->date_completed;
    $presentation->cost = $request->cost;
    $presentation->funding_source = $request->funding_source;
    $presentation->presentation_type = $request->presentation_type;
    $presentation->conference_type = $request->conference_type;
    $presentation->conference_title = $request->conference_title;
    $presentation->venue = $request->venue;
    $presentation->conference_date = $request->conference_date;
    $presentation->organizer = $request->organizer;
    $presentation->article_title = $request->article_title;
    $presentation->publication_date = $request->publication_date;
    $presentation->journal_title = $request->journal_title;
    $presentation->editor = $request->editor;
    $presentation->publisher = $request->publisher;
    $presentation->vol_issue_no = $request->vol_issue_no;
    $presentation->page_no = $request->page_no;
    $presentation->publication_type = $request->publication_type;
    $presentation->indexing = $request->indexing;

    // Retrieve user ID from the session and save it in pr_user_id
    if (session()->has('user_id')) {
        $userId = session()->get('user_id');
        $presentation->pr_user_id = $userId;
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
        $presentation->pr_file_path = 'files/' . $uniqueFileName; 
    }

    // Handle link input
    if ($request->filled('link')) {
        $presentation->pr_link = $request->link;
    }

    $presentation->save();

    return redirect()->back()->with('success', 'Presentation added successfully!');
}


//update presentation functions
public function updatePresentation(Request $request, $id)
{
    $request->validate([
        'research_title' => 'required|string',
        'research_project_title' => 'nullable|string',
        'fund' => 'nullable|string',
        'research_type' => 'nullable|string',
        'so_no' => 'nullable|string',
        'researcher_name' => 'nullable|string',
        'presenter_name' => 'nullable|string',
        'date_duration' => 'nullable|string',
        'date_started' => 'nullable|date',
        'date_completed' => 'nullable|date',
        'cost' => 'nullable|string',
        'funding_source' => 'nullable|string',
        'presentation_type' => 'nullable|string',
        'conference_type' => 'nullable|string',
        'conference_title' => 'nullable|string',
        'venue' => 'nullable|string',
        'conference_date' => 'nullable|string',
        'organizer' => 'nullable|string',
        'article_title' => 'nullable|string',
        'publication_date' => 'nullable|string',
        'journal_title' => 'nullable|string',
        'editor' => 'nullable|string',
        'publisher' => 'nullable|string',
        'vol_issue_no' => 'nullable|string',
        'page_no' => 'nullable|string',
        'publication_type' => 'nullable|string',
        'indexing' => 'nullable|string',
        'file_path' => 'nullable|file|mimes:pdf|max:2048', // Allow only PDF files
        'link' => 'nullable|url',
    ]);

    // Find the research by ID
    $presentation = Presentation::findOrFail($id);
    $presentation->research_title = $request->research_title;
    $presentation->research_project_title = $request->research_project_title;

    $presentation->fund = $request->fund;
    $presentation->research_type = $request->research_type;
    $presentation->so_no = $request->so_no;
    $presentation->researcher_name = $request->researcher_name;
    $presentation->presenter_name = $request->presenter_name;
    $presentation->date_duration = $request->date_duration;
    $presentation->date_started = $request->date_started;
    $presentation->date_completed = $request->date_completed;
    $presentation->cost = $request->cost;
    $presentation->funding_source = $request->funding_source;
    $presentation->presentation_type = $request->presentation_type;
    $presentation->conference_type = $request->conference_type;
    $presentation->conference_title = $request->conference_title;
    $presentation->venue = $request->venue;
    $presentation->conference_date = $request->conference_date;
    $presentation->organizer = $request->organizer;
    $presentation->article_title = $request->article_title;
    $presentation->publication_date = $request->publication_date;
    $presentation->journal_title = $request->journal_title;
    $presentation->editor = $request->editor;
    $presentation->publisher = $request->publisher;
    $presentation->vol_issue_no = $request->vol_issue_no;
    $presentation->page_no = $request->page_no;
    $presentation->publication_type = $request->publication_type;
    $presentation->indexing = $request->indexing;

    // Handle file upload
    if ($request->hasFile('file_path')) {
        // Delete the old file if it exists
        if ($presentation->pr_file_path && file_exists(public_path($presentation->pr_file_path))) {
            unlink(public_path($presentation->pr_file_path)); // Delete old file
        }

        $file = $request->file('file_path');
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $uniqueFileName = $originalFileName . '' .Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files'), $uniqueFileName);
        $presentation->pr_file_path = 'files/' . $uniqueFileName; // Save the relative path to the database
    }

    // Handle link input
    if ($request->filled('link')) {
        $presentation->pr_link = $request->link;
    } else {
        // If the link field is empty, set it to null
        $presentation->pr_link = null;
    }

    $presentation->save();

    return redirect()->back()->with('success', 'Presentation updated successfully!');
}

}
