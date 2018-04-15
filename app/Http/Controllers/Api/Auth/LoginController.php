<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users via REST API
    |
    */

    public function authenticate(LoginRequest $request)
    {
        $username = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        if (Auth::attempt([$username => $request->login, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('Default')->accessToken;
            return response()->json(["token" => $token, "user" => $user]);
        }
        return response()->json(["error" => "Invalid Login"], 400);
    }
}
