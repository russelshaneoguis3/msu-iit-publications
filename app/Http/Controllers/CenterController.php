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
use App\Models\Center;

class CenterController extends Controller
{

//Admin

public function adminCenter()
{
    if (!session()->has('user_id')) {
        return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
    }

    if (session('role_id') != 1) {
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    $userId = session()->get('user_id');
    $user = DB::table('users')->where('uid', $userId)->first();

        // Retrieve centers and their associated researchers, including users with both 'yes' and 'no' email statuses
        $centers = DB::table('center')
            ->leftJoin('users', 'center.cid', '=', 'users.centerlab')
            ->select('center.cid', 'center.c_name', 'users.uid', 'users.first_name', 'users.last_name', 'users.email_status')
            ->orderBy('center.c_name')
            ->get()
            ->groupBy('cid');

        // Retrieve individual user stats for publications, research, and presentations, filtered by email_status = 'yes'
        $userStats = DB::table('users')
            ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
            ->leftJoin('research', 'users.uid', '=', 'research.r_user_id')
            ->leftJoin('presentation', 'users.uid', '=', 'presentation.pr_user_id')
            ->select(
                'users.uid',
                DB::raw('COUNT(DISTINCT CASE WHEN publications.publication_date IS NOT NULL THEN publications.p_id ELSE NULL END) as publications_count'),
                DB::raw('MAX(CASE WHEN publications.publication_date IS NOT NULL THEN publications.created_at ELSE NULL END) as last_publication_upload'),
                DB::raw('COUNT(DISTINCT CASE WHEN research.date_started IS NOT NULL THEN research.r_id ELSE NULL END) as research_count'),
                DB::raw('MAX(CASE WHEN research.date_started IS NOT NULL THEN research.created_at ELSE NULL END) as last_research_upload'),
                DB::raw('COUNT(DISTINCT CASE WHEN presentation.conference_date IS NOT NULL THEN presentation.pr_id ELSE NULL END) as presentation_count'),
                DB::raw('MAX(CASE WHEN presentation.conference_date IS NOT NULL THEN presentation.created_at ELSE NULL END) as last_presentation_upload')
            )
            ->groupBy('users.uid')
            ->get()
            ->keyBy('uid'); // Key the results by user ID for easy access


        // Retrieve latest upload times per center, filtered by users with email_status = 'yes'
        $latestUploads = DB::table('center')
            ->leftJoin('users', 'center.cid', '=', 'users.centerlab')
            ->leftJoin('publications', 'users.uid', '=', 'publications.p_user_id')
            ->leftJoin('research', 'users.uid', '=', 'research.r_user_id')
            ->leftJoin('presentation', 'users.uid', '=', 'presentation.pr_user_id')
            ->select(
                'center.cid',
                DB::raw('
                    CASE 
                        WHEN GREATEST(
                            IFNULL(MAX(CASE WHEN publications.publication_date IS NOT NULL THEN publications.created_at ELSE NULL END), "0000-00-00 00:00:00"),
                            IFNULL(MAX(CASE WHEN research.date_started IS NOT NULL THEN research.created_at ELSE NULL END), "0000-00-00 00:00:00"),
                            IFNULL(MAX(CASE WHEN presentation.conference_date IS NOT NULL THEN presentation.created_at ELSE NULL END), "0000-00-00 00:00:00")
                        ) = "0000-00-00 00:00:00" THEN NULL
                        ELSE GREATEST(
                            IFNULL(MAX(CASE WHEN publications.publication_date IS NOT NULL THEN publications.created_at ELSE NULL END), "0000-00-00 00:00:00"),
                            IFNULL(MAX(CASE WHEN research.date_started IS NOT NULL THEN research.created_at ELSE NULL END), "0000-00-00 00:00:00"),
                            IFNULL(MAX(CASE WHEN presentation.conference_date IS NOT NULL THEN presentation.created_at ELSE NULL END), "0000-00-00 00:00:00")
                        )
                    END as latest_upload
                '),
                DB::raw('COUNT(CASE WHEN publications.publication_date IS NOT NULL THEN publications.p_id ELSE NULL END) as publication_count'),
                DB::raw('COUNT(CASE WHEN research.date_started IS NOT NULL THEN research.r_id ELSE NULL END) as research_count'),
                DB::raw('COUNT(CASE WHEN presentation.conference_date IS NOT NULL THEN presentation.pr_id ELSE NULL END) as presentation_count')
            )
            ->groupBy('center.cid')
            ->get()
            ->keyBy('cid');


    return view('admin.center', compact('user', 'centers', 'userStats', 'latestUploads'));
}

    


    public function addCenter(Request $request)
    {
        $request->validate([
            'c_name' => 'required|string|max:255',
        ]);
    
        $center = new Center();
        $center->c_name = $request->c_name;
    
        $center->save();
    
        return redirect()->back()->with('success', 'Center added successfully!');
    }

}
