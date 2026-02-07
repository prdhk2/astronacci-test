<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name'              => $googleUser->name,
                'email'             => $googleUser->email,
                'password'          => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
            ]
        );

        if ($user->wasRecentlyCreated) {
            $basicRole = Role::where('code', 'A')->first();

            if ($basicRole) {
                $user->roles()->sync([$basicRole->id]);
            }
        }

        
        Auth::login($user);

        return redirect('/dashboard');
        // dd(Socialite::driver('google')->user());
        // $data->token
        // dd($data);
    }
}
