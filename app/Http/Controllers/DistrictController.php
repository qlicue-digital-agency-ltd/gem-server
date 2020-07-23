<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getAllDistricts()
    {
        return response()->json(
            ['districts' => District::all()],
            200
        );
    }
}
