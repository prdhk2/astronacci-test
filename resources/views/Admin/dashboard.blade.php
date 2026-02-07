@extends('Layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen bg-slate-100 flex">

        <!-- Sidebar -->
        <x-common.sidebar />

        <!-- Main -->
        <main class="flex-1 p-8">

            <!-- Header -->
            <x-common.header />


            <!-- Membership Info -->
            <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-xl p-5 shadow">
                    <h3 class="font-semibold text-slate-700 mb-1">Paket</h3>
                    <p class="text-indigo-600 font-bold">{{ $role->name }}</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow">
                    <h3 class="font-semibold text-slate-700 mb-1">Akses Konten</h3>

                    @if ($role)
                        <p class="text-slate-600">
                            {{ $role->article_limit ?? '∞' }} Artikel /
                            {{ $role->video_limit ?? '∞' }} Video
                        </p>
                    @else
                        <p class="text-slate-600 text-sm">Tidak ada role</p>
                    @endif
                </div>


                <div class="bg-white rounded-xl p-5 shadow">
                    <h3 class="font-semibold text-slate-700 mb-1">Status</h3>
                    <p class="text-green-600 font-medium">Aktif</p>
                </div>
            </div>

            <!-- Konten -->
            <h2 class="text-lg font-semibold text-slate-800 mb-4">
                Konten Terbaru
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                <!-- Konten AKTIF -->
                <div class="bg-white rounded-xl shadow p-4">
                    <span class="text-xs text-indigo-600 font-semibold">ARTIKEL</span>
                    <h3 class="font-semibold mt-2">
                        Belajar Laravel dari Nol
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        Panduan lengkap untuk pemula
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow p-4">
                    <span class="text-xs text-rose-600 font-semibold">VIDEO</span>
                    <h3 class="font-semibold mt-2">
                        Membuat Login System
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        Tutorial step by step
                    </p>
                </div>

                <!-- Konten TERKUNCI -->
                <div class="relative bg-white rounded-xl shadow p-4 overflow-hidden">
                    <div class="absolute inset-0 bg-white/80 backdrop-blur flex items-center justify-center">
                        <span class="text-sm font-medium text-slate-600">
                            🔒 Premium Content
                        </span>
                    </div>

                    <span class="text-xs text-indigo-600 font-semibold">ARTIKEL</span>
                    <h3 class="font-semibold mt-2">
                        Optimasi Laravel untuk Production
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        Tips & best practice
                    </p>
                </div>

            </div>

            <!-- Upgrade CTA -->
            <div
                class="mt-10 bg-indigo-600 rounded-xl p-6 text-white flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold">Upgrade ke Premium 🚀</h3>
                    <p class="text-sm text-indigo-100">
                        Akses semua artikel & video tanpa batas
                    </p>
                </div>
                <button class="mt-4 md:mt-0 bg-white text-indigo-600 px-6 py-2 rounded-lg font-medium hover:bg-indigo-50">
                    Upgrade Sekarang
                </button>
            </div>

        </main>
    </div>
@endsection