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

        // Pass the user_id to the admin dashboard view
        return view('admin.dashboard', compact('user'));
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

    
public function getYearlyReportData()
{
    // Define the last 10 years
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

