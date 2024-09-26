<?php

namespace App\Http\Controllers;

use App\Models\StudyCase;
use Illuminate\Http\Request;

class StudyCaseController extends Controller
{
    public function getData(StudyCase $studycase) {

        return view('case.case', ['studycase' => $studycase]);
    }

    public function index()
    {
        // Retrieve 3 most recent cases
        $recentCases = StudyCase::orderBy('created_at', 'desc')->take(3)->get();

        return view('home.home', ['recentCases' => $recentCases]);
    }
}
