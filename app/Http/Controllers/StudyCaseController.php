<?php

namespace App\Http\Controllers;

use App\Models\StudyCase;
use App\Enums\StudyCaseStatus;

class StudyCaseController extends Controller
{
    public function getData(StudyCase $studycase) {
        // StudyCasePolicy.view() will not be called if there is no logged in user
        if (auth()->user()?->cannot('view', $studycase)) {
            abort(404);
        }

        // add handling if there is no logged in user (public access)
        // Question: is there any way to call StudyCasePolicy.view() so that all access control business logic can be centralised there?
        if (auth()->user() == null && $studycase->status != StudyCaseStatus::Reviewed) {
            abort(404);
        }

        return view('cases.index', ['studycase' => $studycase]);
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
