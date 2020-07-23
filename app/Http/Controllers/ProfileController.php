<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getProfiles()
    {
        $profiles = Profile::all();
        foreach ($profiles as $profile) {
            //$profile->guards;
        }
        return response()->json(['profiles' => $profiles]);
    }

    public function getProfile($profileId)
    {
        $profile = Profile::find($profileId);

        if (!$profile) return response()->json(['error' => 'Profile Not Found'], 404);

        return response()->json(['profile' => $profile], 200);
    }

    public function postProfile(Request $request, $branchId)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'user_id' => 'required|unique:profile'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 300);
        }

        $user = User::find($request->user_id);

        if (!$user) return response()->json(['error' => 'User Not Found'], 404);


        $profile = new Profile();
        $profile->fullname = $request->fullname;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->location = $request->location;


        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('file');
            $profile->avatar = env("APP_URL", "local") . ":8000/api/" . $path;
        } else {
            $profile->avatar = 'default.png';
        }

        $user->profiles()->save($profile);

        return response()->json(['profile' => $profile], 201);
    }

    public function putProfile(Request $request, $profileId)
    {
        $avatar = 'default.png';
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 300);
        }

        $profile = Profile::find($profileId);

        if (!$profile) return response()->json(['error' => 'Profile Not Found'], 404);

        $user = User::find($profile->user_id);

        if (!$user) return response()->json(['error' => 'User Not Found'], 404);

        $destinationPath = storage_path('/app/public/uploads/img');
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.png';
            $image->move($destinationPath, $name);
            $avatar  = 'http://localhost:8000' . Storage::url('uploads/img/' . $name);
        }

        $profile->update([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'location' => $request->location,
            'gender' => $request->gender,
            'avatar' => $avatar
        ]);


        $user->profile;

        return response()->json(['user' => $user], 201);
    }

    public function deleteProfile($profileId)
    {
        $profile = Profile::find($profileId);

        if (!$profile) return response()->json(['error' => 'Profile Not Found'], 404);
        $profile->delete();

        return response()->json(['profile' => 'Profile deleted successfully'], 201);
    }


    public function viewProfileImage($profileId)
    {
        $profile = Profile::withTrashed()->find($profileId);
        if (!$profile) {
            return response()->json(['message' => 'profile not found', 'status' => false], 404);
        }

        $pathToFile = storage_path('/app/' . $profile->avatar);

        return response()->download($pathToFile);
    }
}
