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
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        $loginUrl = session('googleLoginUrl') ?? '/';
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = $this->updateOrCreateAccount($googleUser, 'google');
            $user->update([
                'last_login_at' => now()
            ]);
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            // throw $th;
            return Redirect::to($loginUrl);
        }
    }

    public function updateOrCreateAccount($data, $provider = null)
    {
        $profile = [
            'avatar_link' => $data->getAvatar() ?? '',
        ];

        $user = User::updateOrCreate([
            'email' => $data->getEmail()
        ], [
            'provider_id' => $data->getId(),
            'provider' => $provider,
            'name' => $data->getName(),
            'password' => Hash::make('12345678'),
            'role' => 2,
            'profile' => $profile
        ]);

        return $user;
    }
}
