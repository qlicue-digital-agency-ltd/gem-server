<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    public function getStories()
    {
        // Get stories
        $stories = Story::all();

        foreach ($stories as $story) {
            $story->paragraphs;
        }

        // Return collection of stories as a resource
        return response()->json(['stories' => $stories]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStory(Request $request)
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
            $this->path = $request->file('file')->store('public/uploads/stories');
        } else {
            $this->path = null;
        }

        $story = new Story;

        $story->title = $request->input('title');
        $story->subtitle = $request->input('subtitle');
        $story->slug = $request->input('slug');
        $story->image = $this->path != null ? 'http://localhost:8000' . Storage::url($this->path) : null;
        $story->save();

        return response()->json(['story' => $story]);;
    }

    public function putStory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $story = Story::findOrFail($request->project_id);

        $story->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ]);
        return response()->json(['story' => $story]);;
    }

    public function deleteStory($id)
    {
        // Get story
        $story = Story::findOrFail($id);
        if (!$story) {
            return response()->json(['message' => 'story not found', 'status' => false], 404);
        }
        if ($story->delete()) {
            return response()->json(['message' => 'Story deleted successfully']);;
        }
    }
}
