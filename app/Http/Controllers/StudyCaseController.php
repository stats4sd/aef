<?php

namespace App\Http\Controllers;

use App\Models\StudyCase;
use Illuminate\Http\Request;

class StudyCaseController extends Controller
{
    public function getData(StudyCase $studycase) {

        return view('case.case', ['studycase' => $studycase]);
    }
}
