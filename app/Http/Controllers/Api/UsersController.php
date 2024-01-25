<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class UsersController extends Controller {

    //



    public function logout(Request $request) {
         //   Auth::logout();
        return response()->json(["message"=> "logout out successfully"]);
    }

    function login(Request $request) {
         $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:1'
        ]);

          if ($validator->fails()) {
         
             return response()->json(['error' => $this->failedValidation($validator)], 401);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::user();
            $user->token = $user->createToken('authToken')->accessToken;
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Data is not correct.'], 401);
        }
    }

    function signup(Request $request) {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:1'
        ]);

          if ($validator->fails()) {
         
             return response()->json(['error' => $this->failedValidation($validator)], 401);
        }
        
        $u = new User();
        $u->name = request('name');
        $u->email = request('email');
        $u->password = bcrypt(request('password'));
        $u->save();

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::user();
            $user->token = $user->createToken('authToken')->accessToken;
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Data is not correct.'], 401);
        }
    }

}
