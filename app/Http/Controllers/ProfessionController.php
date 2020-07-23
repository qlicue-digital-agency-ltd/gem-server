<?php

namespace App\Http\Controllers;

use App\Imports\ProfessionsImport;
use App\Profession;
use Maatwebsite\Excel\Facades\Excel;

class ProfessionController extends Controller
{

    //Get all professions....
    public function getAllProfessions()
    {
        return response()->json([
            'professions' => Profession::all()
        ]);
    }


    //import xlsx files..
    public function import()
    {
        Excel::import(new ProfessionsImport, storage_path('data/users.xlsx'));
        return redirect('/')->with('success', 'All good!');
    }
}
