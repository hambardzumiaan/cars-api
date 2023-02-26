<?php

namespace App\Http\Controllers\API;

use App\Http\Transformers\AuthTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $user->token = $user->createToken('Cars')->plainTextToken;

            return response()->json([
                'message'=>'Authorized Successfully!',
                'token' => $user->token,
            ]);
        } else {
            return response()->json([
                'Unauthorised'=>'Unauthorised!',
            ], 401);
        }
    }
}
