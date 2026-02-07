<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::updateOrCreate(
            ['facebook_id' => $facebookUser->id],
            [
                'name'     => $facebookUser->name ?? 'Facebook User',
                'email'    => $facebookUser->email,
                'password' => bcrypt(Str::random(32)),
            ]
        );

        // check role
        if ($user->wasRecentlyCreated) {
            $basicRole = Role::where('code', 'A')->first();

            if ($basicRole) {
                $user->roles()->sync([$basicRole->id]);
            }
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
