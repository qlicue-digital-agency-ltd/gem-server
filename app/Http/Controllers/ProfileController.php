<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public  $path = null;
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
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    public function putProfile(Request $request, $profileId)
    {



        $profile = Profile::find($profileId);


        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found'
            ], 404);
        }



        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('public/uploads/profiles');
        }

        $profile->update([
            'avatar' => 'http://localhost:8000' . Storage::url($this->path),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'birthday' => $request->input('birthday'),
            'marital_status' => $request->input('marital_status'),
            'nationality' => $request->input('nationality'),
            'dominion' => $request->input('dominion'),
            'education' => $request->input('education'),
            'profession' => $request->input('profession'),
            'pronvice' => $request->input('pronvice'),
            'height' => $request->input('height'),
            'skin_color' => $request->input('skin_color'),
            'education_id' => $request->input('education_id'),
            'profession_id' => $request->input('profession_id'),
            'bio' => $request->input('bio'),
        ]);


        $user = User::find($profile->user_id);

        $user->profile;
        $user->followers;
        $user->followings;

        return response()->json([
            'user' => $user
        ], 201, [], JSON_NUMERIC_CHECK);
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
