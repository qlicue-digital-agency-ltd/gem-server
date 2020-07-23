<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
{
    public function getJobs()
    {
        // Get jobs
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of jobs as a resource
        return response()->json(['jobs' => $jobs]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'desc' => 'required',
            'title' => 'required',
            'code' => 'required',
            'deadline' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $job = new Job;

        $job->company_id = $request->input('company_id');
        $job->title = $request->input('title');
        $job->code = $request->input('code');
        $job->desc = $request->input('desc');
        $job->deadline = $request->input('deadline');

        $job->save();

        return response()->json(['job' => $job]);;
    }

    public function putJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'desc' => 'required',
            'title' => 'required',
            'code' => 'required',
            'deadline' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $job = Job::findOrFail($request->project_id);

        $job->update([
            'name' => $request->input('company_id'),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'desc' => $request->input('desc'),
            'deadline' => $request->input('deadline')
        ]);
        return response()->json(['job' => $job]);;
    }

    public function deleteJob($id)
    {
        // Get job
        $job = Job::findOrFail($id);
        if (!$job) {
            return response()->json(['message' => 'job not found', 'status' => false], 404);
        }
        if ($job->delete()) {
            return response()->json(['message' => 'Job deleted successfully']);;
        }
    }
}
