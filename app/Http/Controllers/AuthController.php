<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function me()
    {
        return response()->json($this->guard()->user());
    }
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }
    public function guard()
    {
        return Auth::guard('api');
    }
    public function register(Request $request)
    {
      	$rules = [
              'email' => 'required|string|email|unique:users,email',
              'name' => 'required|min:3|max:50',
              'password' => 'required|min:8'
  	    ];
  	    $validator = Validator::make($request->all(), $rules);
  	    if ($validator->fails()) {
  	      return response()->json([
  	                'message' => $validator->messages(),
  	                'result'  => []
  	            ], 400);
  	    }
        $user = new User([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        if($user){
          return response()->json([
              'message' => 'You have registered Successfully'
          ], 201);
        } else {
          return response()->json([
              'message' => 'Something went wrong, please try after sometime'
          ], 201);
        }


    }
}
