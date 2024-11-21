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
use App\Models\Documentation;

class DocumentationController extends Controller
{


//Admin 
    public function adminDocumentation()
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

        // Fetch users and their documentation count, excluding the admin and where email_status is 'yes'
        $usersDocumentation = DB::table('users')
        ->leftJoin('documentation', 'users.uid', '=', 'documentation.d_user_id')
        ->leftJoin('user_roles', 'users.uid', '=', 'user_roles.user_id')
        ->select('users.uid', 'users.first_name', 'users.last_name', 'users.email', DB::raw('COUNT(documentation.d_id) as documentation_count'))
        ->where('user_roles.u_role_id', '!=', 1)  // Exclude admin role
        ->where('users.email_status', '=', 'yes') // Only include users with email_status = 'yes'
        ->groupBy('users.uid', 'users.first_name', 'users.last_name', 'users.email')
        ->get();

        // Fetch admin and their publication count, excluding the user
        $adminDocumentation = DB::table('documentation')
        ->where('d_user_id', '=', 1)
        ->orderBy('d_id', 'desc') // Order by p_id in descending order
        ->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.documentation', compact('user', 'usersDocumentation', 'adminDocumentation'));
    }
    


//User Add functions
    public function usersDocumentation()
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

        // Fetch the user's documentation from the database, ordered by d_id descending
        $usersDocumentation = DB::table('documentation')
        ->where('d_user_id', $userId)
        ->orderBy('d_id', 'desc') // Order by d_id in descending order
        ->get();

        // Pass the user_id to the user dashboard view
        return view('users.documentation', compact('user', 'usersDocumentation'));
    }

    public function addDocumentation(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,docx,jpeg,jpg,png,xlsx,xls|max:2048', // Allow PDF, DOCX, JPEG, JPG, PNG, Excel files
            'link' => 'nullable|url',
        ]);
    
        // Check if at least one of the fields is provided
        if (!$request->hasFile('file_path') && !$request->filled('link')) {
            return redirect()->back()->with('error', 'Please provide either a file or a link.')->withInput();
        }
    
        $documentation = new Documentation();
        $documentation->title = $request->title;
        $documentation->description = $request->description;
    
        // Retrieve user ID from the session and save it in d_user_id
        if (session()->has('user_id')) {
            $userId = session()->get('user_id');
            $documentation->d_user_id = $userId;
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
            $documentation->d_file_path = 'files/' . $uniqueFileName; 
        }
    
        // Handle link input
        if ($request->filled('link')) {
            $documentation->d_link = $request->link;
        }
    
        $documentation->save();
    
        return redirect()->back()->with('success', 'Document added successfully!');
    }
    

// Update Documentation functions
public function updateDocumentation(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file_path' => 'nullable|file|mimes:pdf,docx,jpeg,jpg,png,xlsx,xls|max:2048', // Allow PDF, DOCX, JPEG, JPG, PNG, Excel files
        'link' => 'nullable|url',
    ]);

    // Find the documentation by ID
    $documentation = Documentation::findOrFail($id);
    $documentation->title = $request->title;
    $documentation->description = $request->description;

    // Handle file upload
    if ($request->hasFile('file_path')) {
        // Delete the old file if it exists
        if ($documentation->d_file_path && file_exists(public_path($documentation->d_file_path))) {
            unlink(public_path($documentation->d_file_path)); // Delete old file
        }

        $file = $request->file('file_path');
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $uniqueFileName = $originalFileName . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files'), $uniqueFileName);
        $documentation->d_file_path = 'files/' . $uniqueFileName; // Save the relative path to the database
    }

    // Handle link input
    if ($request->filled('link')) {
        $documentation->d_link = $request->link;
    } else {
        // If the link field is empty, set it to null
        $documentation->d_link = null;
    }

    $documentation->save();

    return redirect()->back()->with('success', 'Documentation updated successfully!');
}


}
