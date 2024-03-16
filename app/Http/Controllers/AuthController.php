<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

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

            $oldToken = PersonalAccessToken::where('tokenable_id', $user->id)->first()?->token;

            if (!$user->email_verified_at) {
                $x = $user->update([
                    'email_verified_at' => Carbon::now()
                ]);
                $user->save();
            }
            $user['token'] = $oldToken ?? $user->createToken('api_token', $abilities)->plainTextToken;
            $user->tokens()->update(['expires_at' => Carbon::now()->addMinutes(100)]);

            return response()->json([
                'user' => $user,
                'token' => $user->token
            ]);
        }
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}
