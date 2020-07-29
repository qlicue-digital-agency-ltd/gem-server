<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|unique:users',
                'password' => 'required'
            ]
        );

        if ($validator->fails())
            return response()->json(['error', $validator->errors()]);


        $user = User::create([
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

       // $user->roles()->attach(Role::where('name', $request->role)->first());

        //create user profile......
        //event(new UserRegisteredEvent($request->role, $user));

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required',
                'password' => 'required'
            ]
        );

        if ($validator->fails())
            return response()->json(['error', $validator->errors()]);


        if (!$token = auth()->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        $user = Auth::user();
      //  $user->roles;
        $user->profile;

        return response()->json([
            'access_token' => $token,
            'refresh_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => Auth::factory()->getTTL(),
            'user' => $user,
        ]);
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return  $this->respondWithToken(Auth::refresh());
    }
}
