<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        session()->flash('googleLoginUrl', url()->previous());
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function loginWithGoogle()
    {
        $loginUrl = session('googleLoginUrl') ?? '/';
        try {
            $googleUser = Socialite::driver('google')->user();

            $profile = [
                'avatar_link' => $googleUser->getAvatar() ?? ''
            ];

            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail()
            ], [
                'google_id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'password' => Hash::make('12345678'),
                'role' => 2,
                'profile' => $profile
            ]);

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            // throw $th;
            return Redirect::to($loginUrl);
        }
    }
}
