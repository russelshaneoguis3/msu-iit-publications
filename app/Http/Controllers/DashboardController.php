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
use Carbon\Carbon;
use App\Models\Publication;
use App\Models\Research;
use App\Models\Presentation;
use App\Models\Announcement;


class DashboardController extends Controller
{


//Admin 
    public function adminDashboard()
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

        // Count all publications in the system
        $totalPublicationCount = Publication::count();

        // Count all publications where p_user_id = 1
        $adminPublicationCount = Publication::where('p_user_id', 1)->count();

        // Count all research in the system
        $totalResearchCount = Research::count();

        // Count all publications where r_user_id = 1
        $adminResearchCount = Research::where('r_user_id', 1)->count();

        // Count all publications in the system
        $totalPresentationCount = Presentation::count();

        // Count all publications where pr_user_id = 1
        $adminPresentationCount = Presentation::where('pr_user_id', 1)->count();

        // Fetch the latest activity logs from the doc_logs table
        $activityLogs = DB::table('doc_logs')
            ->join('users', 'doc_logs.l_user_id', '=', 'users.uid') // Join with users to get user data
            ->select('doc_logs.*', 'users.first_name', 'users.last_name') // Select relevant columns
            ->orderBy('log_id', 'desc') // Sort by log_time
            ->get()
            ->map(function ($activityLog) {
                $activityLog->log_time_calc = Carbon::parse($activityLog->log_time)->diffForHumans();
                return $activityLog;
            });

            // Fetch all records from the announcements table ordered by a_id in descending order
            $announcements = Announcement::orderBy('a_id', 'desc')->get();

        // Pass the user_id to the admin dashboard view
        return view('admin.dashboard', compact('user', 'totalPublicationCount', 'adminPublicationCount', 'totalResearchCount', 'adminResearchCount', 'totalPresentationCount', 'adminPresentationCount', 'activityLogs', 'announcements'));
    }

public function addAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',

        ]);
    
        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->description = $request->description;
    
        $announcement->save();
    
        return redirect()->back()->with('success', 'Announcement added successfully!');
    }


// Update Announcement functions
public function updateAnnouncement(Request $request, $id)
{
    $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Find the documentation by ID
    $announcement = Announcement::findOrFail($id);
    $announcement->title = $request->title;
    $announcement->description = $request->description;
    $announcement->save();

    return redirect()->back()->with('success', 'Announcement updated successfully!');
}
    

//--------------------------------------------------------------------------------------------------------------------------------------

//User
    public function usersDashboard()
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

        // Fetch the latest 3 announcements
        $announcements = DB::table('announcements')
        ->orderBy('a_id', 'desc')
        ->take(3)
        ->get()
        ->map(function ($announcement) {
            $announcement->relative_time = Carbon::parse($announcement->created_at)->diffForHumans();
            $announcement->short_description = substr($announcement->description, 0, 40) . '...'; // Limit description to 10 characters
            return $announcement;
        });


        // Fetch the latest activity logs from the doc_logs table
        $activityLogs = DB::table('doc_logs')
        ->join('users', 'doc_logs.l_user_id', '=', 'users.uid') // Optional: join with users to get user data
        ->select('doc_logs.*', 'users.first_name', 'users.last_name') // Select relevant columns
        ->orderBy('log_time', 'desc') // Optional: sort by log_time
        ->where('doc_logs.l_user_id', '=', $userId)
        ->take(5) // Optional: limit the results
        ->get()
        ->map(function ($activityLog) {
            $activityLog->log_time_calc = Carbon::parse($activityLog->log_time)->diffForHumans();
            return $activityLog;
        });

        // Pass the user and announcements to the view
        return view('users.dashboard', compact('user', 'announcements', 'activityLogs'));
    }

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
    
public function getYearlyReportData()
{
    // Define the last 5 years
    $lastFiveYears = range(date('Y') - 4, date('Y'));

    // Query to get counts for publications, research, and presentations by year
    $publicationsData = DB::table('publications')
        ->select(DB::raw('YEAR(publication_date) as year'), DB::raw('COUNT(*) as count'))
        ->whereIn(DB::raw('YEAR(publication_date)'), $lastFiveYears)
        ->groupBy('year')
        ->pluck('count', 'year');

    $researchData = DB::table('research')
        ->select(DB::raw('YEAR(date_started) as year'), DB::raw('COUNT(*) as count'))
        ->whereIn(DB::raw('YEAR(date_started)'), $lastFiveYears)
        ->groupBy('year')
        ->pluck('count', 'year');

    $presentationsData = DB::table('presentation')
        ->select(DB::raw('YEAR(conference_date) as year'), DB::raw('COUNT(*) as count'))
        ->whereIn(DB::raw('YEAR(conference_date)'), $lastFiveYears)
        ->groupBy('year')
        ->pluck('count', 'year');

    // Prepare data in a format suitable for the chart
    $yearlyData = [];
    foreach ($lastFiveYears as $year) {
        $yearlyData[] = [
            'year' => $year,
            'publications' => $publicationsData[$year] ?? 0,
            'research' => $researchData[$year] ?? 0,
            'presentations' => $presentationsData[$year] ?? 0,
        ];
    }

    return response()->json($yearlyData);
}


}

