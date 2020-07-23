<?php

namespace App\Http\Controllers;

use App\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Tip as TipResource;

class TipController extends Controller
{

    public function getTips()
    {
        // Get tips
        $tips = Tip::all();

        foreach ($tips as $tip) {
            $tip->paragraphs;
        }

        // Return collection of tips as a resource
        return response()->json(['tips' => $tips]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTip(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('tips');
        } else {
            return response()->json(['message' => 'Please add an Image',  'status' => false], 404);
        }

        $tip = new Tip;

        $tip->title = $request->input('title');
        $tip->subtitle = $request->input('subtitle');
        $tip->slug = $request->input('slug');
        $tip->image = $this->path;
        $tip->save();

        return response()->json(['tip' => $tip]);;
    }

    public function putTip(Request $request, $tipId)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $tip = Tip::find($tipId);
        if (!$tip) {
            return response()->json(['message' => 'tip not found', 'status' => false], 404);
        }

        $tip->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'slug' => $request->input('slug'),
        ]);
        return response()->json(['tip' => $tip]);;
    }

    public function deleteTip($id)
    {
        // Get tip
        $tip = Tip::find($id);
        if (!$tip) {
            return response()->json(['message' => 'tip not found', 'status' => false], 404);
        }
        if ($tip->delete()) {
            return  response()->json(['message' => 'Tip deleted successfully']);
        }
    }
}
