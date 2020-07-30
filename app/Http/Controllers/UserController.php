<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json([
                'errors' => $validator->errors(),
                'message' => $validator->errors()->first(),
                'status' => false
            ]);
        }


        $user = User::create([
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);
        
          //create user profile......
          event(new UserRegisteredEvent($user));

 
        $token = auth()->login($user);

        auth()->user()->profile;
        auth()->user()->followers;
        auth()->user()->followings;

        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    public function login()
    {
        $credentials = request(['phone', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        auth()->user()->profile;
        auth()->user()->followers;
        auth()->user()->followings;

        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }


    //follow users......

    public function followUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'following_id' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }

        $following_account = User::find($request->input('following_id'));
        if (!$following_account) {
            return response()->json(['error', 'User does not exist.'], 404);
        }

        $following_account->followers()->attach($request->input('user_id'));
        return response()->json(['success', 'Successfully followed the user.'], 200);
    }

    //unfollow users....
    public function unFollowUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'unfollowing_id' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }

        $unfollowing_account = User::find($request->input('unfollowing_id'));
        if (!$unfollowing_account) {

            return response()->json([
                'error' => 'User does not exist'
            ], 404);
        }
        $unfollowing_account->followers()->detach($request->input('user_id'));
        return  response()->json(['success', 'Successfully unfollowed the user.'], 200);
    }

    //get All users

    public function getAllUsers()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->profile;
            $user->followers;
            $user->followings;
        }
        return response()->json(['users' => $users]);
    }
}
