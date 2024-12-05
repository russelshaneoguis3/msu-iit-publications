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

        // Count all publications in the system with a valid publication_date
        $totalPublicationCount = DB::table('publications')
            ->whereNotNull('publication_date')
            ->count();

        // Count all publications where p_user_id = 1 with a valid publication_date
        $adminPublicationCount = DB::table('publications')
            ->where('p_user_id', 1)
            ->whereNotNull('publication_date')
            ->count();

        // Count all research in the system with a valid date_started
        $totalResearchCount = DB::table('research')
            ->whereNotNull('date_started')
            ->count();

        // Count all research where r_user_id = 1 with a valid date_started
        $adminResearchCount = DB::table('research')
            ->where('r_user_id', 1)
            ->whereNotNull('date_started')
            ->count();

        // Count all presentations in the system with a valid conference_date
        $totalPresentationCount = DB::table('presentation')
            ->whereNotNull('conference_date')
            ->count();

        // Count all presentations where pr_user_id = 1 with a valid conference_date
        $adminPresentationCount = DB::table('presentation')
            ->where('pr_user_id', 1)
            ->whereNotNull('conference_date')
            ->count();

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

public function getCenters()
{
    $centers = DB::table('center')->select('cid', 'c_name')
    ->orderBy('center.c_name')
    ->get();
    return response()->json($centers);
}
    
public function getYearlyReportData(Request $request)
{
    try {
        $lastFiveYears = range(date('Y') - 4, date('Y'));
        $center = $request->query('center', 'all');

        \Log::info("Filtering data for center: " . $center);

        // Base queries for publications, research, and presentations
        $publicationsQuery = DB::table('publications')
            ->select(DB::raw('YEAR(publication_date) as year'), DB::raw('COUNT(*) as count'))
            ->whereIn(DB::raw('YEAR(publication_date)'), $lastFiveYears);

        $researchQuery = DB::table('research')
            ->select(DB::raw('YEAR(date_started) as year'), DB::raw('COUNT(*) as count'))
            ->whereIn(DB::raw('YEAR(date_started)'), $lastFiveYears);

        $presentationsQuery = DB::table('presentation')
            ->select(DB::raw('YEAR(conference_date) as year'), DB::raw('COUNT(*) as count'))
            ->whereIn(DB::raw('YEAR(conference_date)'), $lastFiveYears);

        if ($center !== 'all') {
            // Get all users belonging to the selected center
            $userIds = DB::table('users')->where('centerlab', $center)->pluck('uid');
            
            // Filter the queries by the selected center's users
            $publicationsQuery->whereIn('p_user_id', $userIds);
            $researchQuery->whereIn('r_user_id', $userIds);
            $presentationsQuery->whereIn('pr_user_id', $userIds);
        }

        // Execute the queries and group by year
        $publicationsData = $publicationsQuery->groupBy('year')->pluck('count', 'year');
        $researchData = $researchQuery->groupBy('year')->pluck('count', 'year');
        $presentationsData = $presentationsQuery->groupBy('year')->pluck('count', 'year');

        // Prepare the final data to return
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

    } catch (\Exception $e) {
        \Log::error('Error fetching yearly report data: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while fetching data.'], 500);
    }
}

public function getFilteredReportData(Request $request)
{
    try {
        // Get filter values
        $year = $request->query('year', 'all'); // Default to 'all'
        $center = $request->query('center', 'all');
        $quarter = $request->query('quarter', 'all');

        \Log::info("Filtering data for center: $center, year: $year, quarter: $quarter");

        // Define quarters
        $quarters = [
            1 => [1, 2, 3], // Q1: Jan, Feb, Mar
            2 => [4, 5, 6], // Q2: Apr, May, Jun
            3 => [7, 8, 9], // Q3: Jul, Aug, Sep
            4 => [10, 11, 12], // Q4: Oct, Nov, Dec
        ];

        // Base queries for publications, research, and presentations
        $publicationsQuery = DB::table('publications')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereNotNull('publication_date');

        $researchQuery = DB::table('research')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereNotNull('date_started');

        $presentationsQuery = DB::table('presentation')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereNotNull('conference_date');

        // Apply year filter only if it's not 'all'
        if ($year !== 'all') {
            $publicationsQuery->whereYear('publication_date', $year);
            $researchQuery->whereYear('date_started', $year);
            $presentationsQuery->whereYear('conference_date', $year);
        }

        // Apply quarter filter if not 'all'
        if ($quarter !== 'all' && array_key_exists($quarter, $quarters)) {
            $months = $quarters[$quarter];
            $publicationsQuery->whereIn(DB::raw('MONTH(publication_date)'), $months);
            $researchQuery->whereIn(DB::raw('MONTH(date_started)'), $months);
            $presentationsQuery->whereIn(DB::raw('MONTH(conference_date)'), $months);
        }

        // Apply center filter if not 'all'
        if ($center !== 'all') {
            $userIds = DB::table('users')->where('centerlab', $center)->pluck('uid');
            $publicationsQuery->whereIn('p_user_id', $userIds);
            $researchQuery->whereIn('r_user_id', $userIds);
            $presentationsQuery->whereIn('pr_user_id', $userIds);
        }

        // Get the counts
        $publications = $publicationsQuery->value('count') ?? 0;
        $research = $researchQuery->value('count') ?? 0;
        $presentations = $presentationsQuery->value('count') ?? 0;

        return response()->json([
            'publications' => $publications,
            'research' => $research,
            'presentations' => $presentations,
        ]);

    } catch (\Exception $e) {
        \Log::error('Error fetching report data: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while fetching data.'], 500);
    }
}


}

