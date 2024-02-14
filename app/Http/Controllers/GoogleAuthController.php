<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;


use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // dd($google_user->id);

            $user = User::where('google_id', $google_user->getId())->first();

          

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->id,
                ]);

                Auth::login($new_user);
                return redirect()->intended('home');
            } else {
                Auth::login($user);
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            dd('SOMETHING WENT WRONG!!'. $th->getMessage());
        }
    }
}
