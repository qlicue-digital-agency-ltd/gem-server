<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function  getAllEducation()
    {
        return response()->json([
            'education' => Education::all(), 200
        ]);
    }
}
