<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DescriptionController extends Controller
{
    public function getDescriptions()
    {
        // Get descriptions
        $descriptions = Description::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of descriptions as a resource
        return response()->json(['descriptions' => $descriptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDescription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $description = new Description;

        $description->job_id = $request->input('job_id');
        $description->desc = $request->input('desc');

        $description->save();

        return response()->json(['description' => $description]);;
    }

    public function putDescription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $description = Description::findOrFail($request->project_id);

        $description->update([
            'desc' => $request->input('desc'),
        ]);
        return response()->json(['description' => $description]);;
    }

    public function deleteDescription($id)
    {
        // Get description
        $description = Description::findOrFail($id);
        if (!$description) {
            return response()->json(['message' => 'description not found', 'status' => false], 404);
        }

        if ($description->delete()) {
            return response()->json(['message' => 'description deleted successfully']);;
        }
    }
}
