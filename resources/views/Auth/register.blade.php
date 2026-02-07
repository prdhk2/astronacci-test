@extends('Layout.app')
@section('title', 'Register Form')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-800 px-4">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8">

        <h1 class="text-2xl font-bold text-center text-gray-800 mb-1">
            Daftar Akun
        </h1>
        <p class="text-center text-gray-500 mb-8 text-sm">
            Buat akun baru untuk mulai
        </p>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register.store') }}"
              class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <!-- Nama -->
            <div>
                <label class="text-sm text-gray-600">Nama</label>
                <input type="text" name="name" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi -->
            <div>
                <label class="text-sm text-gray-600">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="md:col-span-2 pt-2">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700
                           text-white py-2.5 rounded-xl font-medium transition">
                    Daftar
                </button>
            </div>
        </form>

        <!-- Divider -->
        <div class="flex items-center gap-3 my-6">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="text-xs text-gray-400">atau</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <!-- Google -->
        <a href="{{ route('auth.google.redirect') }}"
           class="flex items-center justify-center gap-3 w-full border border-gray-300
                  rounded-xl py-2.5 mb-3 hover:bg-gray-50 transition">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">
            <span class="text-sm font-medium text-gray-700">
                Daftar dengan Google
            </span>
        </a>

        <!-- Facebook -->
        <a href={{ route('auth.facebook.redirect') }}"
           class="flex items-center justify-center gap-3 w-full rounded-xl py-2.5
                  bg-[#1877F2] hover:bg-[#166FE5] transition text-white">
            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.128V8.309c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.716-1.796 1.765v2.316h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z"/>
            </svg>
            <span class="text-sm font-medium">
                Daftar dengan Facebook
            </span>
        </a>

        <p class="text-sm text-center text-gray-500 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">
                Login
            </a>
        </p>
    </div>
</div>
@endsection
