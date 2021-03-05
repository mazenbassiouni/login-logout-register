<?php

namespace App\Http\Controllers\api\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    protected function logout(Request $request){
    //delete token used for current request.

    Auth::user()->currentAccessToken()->delete();

    return ['message'=>'You have been logged out.'];
    }
}
