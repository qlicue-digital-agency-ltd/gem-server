<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualificationController extends Controller
{
    public function getQualifications()
    {
        // Get qualifications
        $qualifications = Qualification::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of qualifications as a resource
        return response()->json(['qualifications' => $qualifications]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $qualification = new Qualification;

        $qualification->job_id = $request->input('job_id');
        $qualification->desc = $request->input('desc');

        $qualification->save();

        return response()->json(['qualification' => $qualification]);
    }

    public function putQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $qualification = Qualification::findOrFail($request->project_id);

        $qualification->update([
            'desc' => $request->input('desc'),
        ]);
        return response()->json(['qualification' => $qualification]);
    }

    public function deleteQualification($id)
    {
        // Get qualification
        $qualification = Qualification::findOrFail($id);
        if (!$qualification) {
            return response()->json(['message' => 'qualification not found', 'status' => false], 404);
        }

        if ($qualification->delete()) {
            return response()->json(['message' => 'qualification deleted successfully']);;
        }
    }
}
