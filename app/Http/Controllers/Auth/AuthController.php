<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($user)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email Salah',
                'password' => 'Password salah',
            ])
            ->onlyInput('email');
    }

    public function register(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|string|max:128',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $basicRole = Role::where('code', 'A')->firstOrFail();
        $user->roles()->attach($basicRole->id);

        Auth::login($user);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Selamat, anda berhasil mendaftar');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
