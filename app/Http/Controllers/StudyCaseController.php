<?php

namespace App\Http\Controllers;

use App\Models\StudyCase;
use Illuminate\Http\Request;
use App\Enums\StudyCaseStatus;

class StudyCaseController extends Controller
{
    public function getData(StudyCase $studycase) {
        // add access control:
        // 1. Public can only access study case with status Reviewed
        // 2. Admin can access study case with all status
        // 3. All teammates of study case creator can access study case with all status

        // initialse study case cannot be preview by default
        $canPreview = false;

        // there is no logged in user, assumes it is accessed by public
        if (auth()->user() == null) {
            // ray('there is no logged in user');
            // ray('study case status: ' . $studycase->status->value);

            // only study case with status Reviewed can be accessed by public
            if ($studycase->status == StudyCaseStatus::Reviewed) {
                $canPreview = true;
            }
        }
        // there is a logged in user
        else 
        {
            // the logged in user is admin user
            if (auth()->user()->isAdmin()) {
                // ray('logged in user is admin user');
                // admin user can view all study cases with any status
                $canPreview = true;
            } 
            // the logged in user is normal user
            else 
            {
                // ray('logged in user is normal user');

                // ray($studycase->team);
                // ray(auth()->user()->latestTeam);

                // if the study case is created by a user who belongs to user's team, user can view it with any status
                if ($studycase->team == auth()->user()->latestTeam) {
                    $canPreview = true;
                }
            }
        }

        if (!$canPreview) {
            abort(404);
        } else {
            return view('cases.index', ['studycase' => $studycase]);
        }
       
    }

    public function index()
    {
        // Retrieve 3 most recent cases
        $recentCases = StudyCase::where('reviewed', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home.index', ['recentCases' => $recentCases]);
    }
}
