<?php

namespace App\Http\Controllers\api\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()){
            return $validator->errors();
        }

        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($login)){
            return response(['success'=>false,'failed'=>true,'message'=>'invalid login credentials.']);
        }else{
            $token = $request->user()->createToken('standard');
            return ['success'=>true,'failed'=>false,'message'=>'logged in','token'=>$token->plainTextToken];
        }
    }
}
