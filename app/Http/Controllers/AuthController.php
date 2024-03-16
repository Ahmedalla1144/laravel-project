<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $auth = Auth::attempt($credentials);

        if ($auth) {
            $auth_user = Auth::user();

            $user = User::find($auth_user->id);

            $abilities = explode('|', $user->roles);

            $user->token ??

            $token = $user->createToken('api_token', $abilities)->plainTextToken;

            if (!$user->email_verified_at) {
                $x = $user->update([
                    'email_verified_at' => Carbon::now()
                ]);
                $user->save();
                dd($x);
            }

            $user['token'] = $token;
            dd($user);
        }
    }
}
