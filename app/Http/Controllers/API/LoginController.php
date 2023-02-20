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

            return $this->item($user, new AuthTransformer());
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
