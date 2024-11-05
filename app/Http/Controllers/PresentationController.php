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


//Admin 
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

        // Pass the user_id to the admin dashboard view
        return view('admin.presentation', compact('user'));
    }
    
//------------------------------------------------------------------------------------------------------------


//User
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

    
//Users Add Function
public function addPresentation(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'file_path' => 'nullable|file|mimes:pdf|max:2048', // Allow only PDF files
        'link' => 'nullable|url',
    ]);

    // Check if at least one of the fields is provided
    if (!$request->hasFile('file_path') && !$request->filled('link')) {
        return redirect()->back()->with('error', 'Please provide either a PDF file or a link.')->withInput();
    }

    $presentation = new Presentation();
    $presentation->title = $request->title;
    $presentation->description = $request->description;

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
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'file_path' => 'nullable|file|mimes:pdf|max:2048',
        'link' => 'nullable|url',
    ]);

    // Find the research by ID
    $presentation = Presentation::findOrFail($id);
    $presentation->title = $request->title;
    $presentation->description = $request->description;

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
