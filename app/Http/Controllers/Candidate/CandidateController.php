<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Vacancy $vacancy )
    {
        return view('candidates/index', [
            'vacancy' => $vacancy
        ]);
    }

    
}
