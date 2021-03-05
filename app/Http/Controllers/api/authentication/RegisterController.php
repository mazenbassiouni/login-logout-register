<?php

namespace App\Http\Controllers\api\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if ($validator->fails()){
            return ['isregister'=>false,'errors'=>$validator->errors()];
        }
        
        User::create([
            'name' => $request ['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        return ['isRegister'=>true,'message'=>'successful registration.'];
    }
}
