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

class GoogleController extends Controller
{
    // public function loginCallback(Request $request)
    // {
    //     try {
    //         $state = $request->input('state');
    //         parse_str($state, $result);

    //         $googleUser = Socialite::driver('google')->stateless()->user();
    //         dd($googleUser);

    //         $user = User::where('email', $googleUser->email)->first();
    //         if ($user) {
    //             Auth::login($user);
    //             return redirect('/home');
    //         } else {

    //             $profile = [
    //                 'avatar' => $googleUser->avatar ?? 'user1-128x128.jpg',
    //                 'gender' => null,
    //                 'dob' => null,
    //                 'city' => null,
    //                 'district' => null,
    //                 'ward' => null
    //             ];

    //             $user = User::create(
    //                 [
    //                     'email' => $googleUser->email,
    //                     'name' => $googleUser->name,
    //                     'google_id' => $googleUser->id,
    //                     'password' => Hash::make('12345678'),
    //                     'role' => 2,
    //                     'profile' => $profile
    //                 ]
    //             );
    //             return response()->json([
    //                 'status' => __('google sign in successful'),
    //                 'data' => $user,
    //             ], Response::HTTP_CREATED);
    //         }
    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'status' => __('google sign in failed'),
    //             'error' => $exception,
    //             'message' => $exception->getMessage()
    //         ], Response::HTTP_BAD_REQUEST);
    //     }
    // }

    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function loginWithGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

                $profile = [
                    'avatar' => $googleUser->picture ?? 'user1-128x128.jpg',
                    'gender' => '',
                    'dob' => '1996-02-14',
                    'city' => '',
                    'district' => '',
                    'ward' => ''
                ];

                $user = User::updateOrCreate([
                    'email' => $googleUser->email
                ], [
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'password' => Hash::make('12345678'),
                    'role' => 2,
                    'profile' => $profile
                ]);

                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
