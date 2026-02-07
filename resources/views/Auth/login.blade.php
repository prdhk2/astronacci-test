@extends('Layout.app')
@section('title', 'Login Form')

@section('content')

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-800">
        <div class="w-full max-w-sm bg-white rounded-2xl shadow-xl p-8">

            <h1 class="text-2xl font-bold text-center text-gray-800 mb-1">
                Login
            </h1>
            <p class="text-center text-gray-500 mb-6 text-sm">
                Masuk ke akun kamu
            </p>

            <!-- Email & Password -->
            <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
                @csrf

                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <input type="email" name="email" required
                        class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>

                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-xl font-medium transition">
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center gap-3 my-6">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400">atau</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <!-- Google -->
            <a href="{{ route('auth.google.redirect') }}"
                class="flex items-center justify-center gap-3 w-full border border-gray-300 rounded-xl py-2.5 mb-3
                  hover:bg-gray-50 transition">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">
                <span class="text-sm font-medium text-gray-700">
                    Masuk dengan Google
                </span>
            </a>

            <!-- Facebook -->
            <a href="{{ route('auth.facebook.redirect') }}"
                class="flex items-center justify-center gap-3 w-full rounded-xl py-2.5
                  bg-[#1877F2] hover:bg-[#166FE5] transition text-white">
                <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                    <path
                        d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.128V8.309c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.716-1.796 1.765v2.316h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z" />
                </svg>
                <span class="text-sm font-medium">
                    Masuk dengan Facebook
                </span>
            </a>

            <div class="flex justify-between text-sm text-gray-500 mt-5">
                <a href="#" class="hover:underline">
                    Lupa password?
                </a>
                <a href="{{ route('register') }}" class="hover:underline">
                    Daftar
                </a>
            </div>
        </div>
    </div>
@endsection
