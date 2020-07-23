<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    public function getAdverts()
    {
        // Get adverts
        $adverts = Advert::all();

        // Return collection of adverts as a resource
        return response()->json(['adverts' => $adverts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdvert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('public/uploads/adverts');
        } else {
            $this->path = null;
        }

        $advert = new Advert;

        $advert->title = $request->input('title');
        $advert->link = $request->input('link');
        $advert->desc = $request->input('desc');
        $advert->image = $this->path != null ? 'http://localhost:8000' . Storage::url($this->path) : null;

        $advert->save();

        return response()->json(['advert' => $advert]);;
    }

    public function putAdvert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'required',
            'title' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $advert = Advert::findOrFail($request->project_id);

        $advert->update([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'link' => $request->input('link')
        ]);
        return response()->json(['advert' => $advert]);;
    }

    public function deleteAdvert($id)
    {
        // Get advert
        $advert = Advert::findOrFail($id);
        if (!$advert) {
            return response()->json(['message' => 'advert not found', 'status' => false], 404);
        }

        if ($advert->delete()) {
            return response()->json(['message' => 'Advert deleted successfully']);;
        }
    }
}
