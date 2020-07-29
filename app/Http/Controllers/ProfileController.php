<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getProfile($userId)
    {

        $user = User::find($userId);
        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        return response()->json([
            'profile' => $user->profile
        ], 200,[], JSON_NUMERIC_CHECK);
    }

    public function postProfile(Request $request, $userId)
    {

        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }



        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('stories');
        }

        $profile = new Profile;

        $profile->avatar = $this->path;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->sex = $request->input('sex');
        $profile->birthday = $request->input('birthday');
        $profile->marital_status = $request->input('marital_status');
        $profile->nationality = $request->input('nationality');
        $profile->dominion = $request->input('dominion');
        $profile->education = $request->input('education');
        $profile->profession = $request->input('profession');
        $profile->pronvice = $request->input('pronvice');
        $profile->height = $request->input('height');
        $profile->skin_color = $request->input('skin_color');
        $profile->education_id = $request->input('education_id');
        $profile->profession_id = $request->input('profession_id');
        $profile->bio = $request->input('bio');


        $user->profile()->save($profile);

        return response()->json([
            'profile' => $profile
        ], 200,[], JSON_NUMERIC_CHECK);
    }


    public function putProfile(Request $request, $profileId)
    {

        $profile = Profile::find($profileId);

        $profile->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'birthday' => $request->input('birthday'),
            'marital_status' => $request->input('marital_status'),
            'nationality' => $request->input('nationality'),
            'education_id' => $request->input('education_id'),
            'profession_id' => $request->input('profession_id'),
            'bio' => $request->input('bio'),
        ]);
        return response()->json(
            [
                'profile' => $profile
            ], 200,[], JSON_NUMERIC_CHECK
        );
    }

    public function viewProfie($profileId)
    {
        $profile = Profile::find($profileId);
        if (!$profile) {
            return response()->json(['message' => 'profile not found', 'status' => false], 404);
        }

        $pathToFile = storage_path('/app/' . $profile->avatar);



        return response()->download($pathToFile);
    }

    public function deleteProfile($profileId)
    {

        // Get Profile
        $profile = Profile::findOrFail($profileId);
        if (!$profile) {
            return response()->json(['message' => 'profile not found', 'status' => false], 404);
        }

        if ($profile->delete()) {
            return  response()->json([
                'message' => 'Profile deleted successfully'
            ]);
        }
    }
}
