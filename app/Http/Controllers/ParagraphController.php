<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paragraph;
use App\Tip;
use App\Story;
use Illuminate\Support\Facades\Validator;


class ParagraphController extends Controller
{

    public function getParagraphs()
    {
        // Get paragraphs
        $paragraphs = Paragraph::all();

        // Return collection of tips as a resource
        return response()->json(['paragraphs' => $paragraphs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTipParagraph(Request $request, $tipId)
    {
        $tip = Tip::find($tipId);
        if (!$tip) {
            return response()->json(['message' => 'tip not found', 'status' => false], 404);
        }

        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'advert_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $paragraph = new Paragraph;

        $paragraph->body = $request->input('body');
        $paragraph->advert_id = $request->input('advert_id');
        $tip->paragraphs()->save($paragraph);

        return response()->json(['paragraph' => $paragraph]);
    }

    public function postStoryParagraph(Request $request, $storyId)
    {
        $story = Story::find($storyId);
        if (!$story) {
            return response()->json(['message' => 'tip not found', 'status' => false], 404);
        }

        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'advert_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $paragraph = new Paragraph;

        $paragraph->body = $request->input('body');
        $paragraph->advert_id = $request->input('advert_id');
        $story->paragraphs()->save($paragraph);

        return response()->json(['paragraph' => $paragraph]);;
    }

    public function putParagraph(Request $request, $paragraphId)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'advert_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $paragraph = Paragraph::find($paragraphId);
         if (!$paragraph) {
             return response()->json(['message' => 'Paragraph not found', 'status' => false], 404);
         }

        $paragraph->update([
            'body' => $request->input('body'),
            'advert_id' => $request->input('advert_id'),
        ]);
        return response()->json(['paragraph' => $paragraph]);
    }

    public function deleteParagraph($id)
    {
        // Get paragrah
        $paragraph = Paragraph::find($id);
        if (!$paragraph) {
            return response()->json(['message' => 'Paragraph not found', 'status' => false], 404);
        }
        if ($paragraph->delete()) {
            return  response()->json(['message' => 'paragrap deleted successfully']);
        }
    }
}
