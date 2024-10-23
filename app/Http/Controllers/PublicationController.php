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
use App\Models\Publication;


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

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch users and their publication count, excluding the admin
        $usersPublications = DB::table('users')
        ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->select('users.uid', 'users.first_name', 'users.last_name', 'users.email', DB::raw('COUNT(publications.p_id) as publication_count'))
        ->where('user_roles.u_role_id', '!=', 1)  // Exclude admin role
        ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email')
        ->get();

        // Fetch admin and their publication count, excluding the user
        $adminPublications = DB::table('users')
        ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->select('users.uid', 'users.first_name', 'users.last_name', 'users.email', DB::raw('COUNT(publications.p_id) as publication_count'))
        ->where('user_roles.u_role_id', '!=', 2)  // Exclude users role
        ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email')
        ->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.publication', compact('user', 'usersPublications', 'adminPublications'));
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

        // Fetch the user information from the database
        $user = DB::table('users')->where('uid', $userId)->first();

        // Fetch the user's publications from the database
        $usersPublications = DB::table('publications')
        ->where('p_user_id', $userId)
        ->get();

        // Pass the user_id to the user dashboard view
        return view('users.publication', compact('user', 'usersPublications'));
    }


// Users add publications
public function addPublication(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'file_path' => 'nullable|file|mimes:pdf|max:2048', // Allow only PDF files
        'link' => 'nullable|url',
    ]);

    $publication = new Publication();
    $publication->title = $request->title;
    $publication->description = $request->description;

    // Retrieve user ID from the session and save it in p_user_id
    if (session()->has('user_id')) {
        $userId = session()->get('user_id');
        $publication->p_user_id = $userId;
    } else {
        return redirect()->back()->with('error', 'User not found in session.');
    }

    // Handle file upload
    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        
        // Get the original file name without the extension
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
        // Generate a unique name using original file name and a UUID
        $uniqueFileName = $originalFileName . '' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        // Save the file to the public/files directory
        $filePath = $file->move(public_path('files'), $uniqueFileName); // Adjust path to public/files
        
        // Save the relative path to the database
        $publication->p_file_path = 'files/' . $uniqueFileName; 
    }

    // Handle link input
    if ($request->filled('link')) {
        $publication->p_link = $request->link;
    }

    $publication->save();

    return redirect()->back()->with('success', 'Publication added successfully!');
}


}