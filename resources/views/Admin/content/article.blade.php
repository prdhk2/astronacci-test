@extends('Layout.app')

@section('title', 'Artikel')

@section('content')
<div class="min-h-screen bg-slate-100 flex">

    <!-- Sidebar -->
    <x-common.sidebar />

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <x-common.header />

        <!-- Artikel List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($articles as $a)    
                <!-- Artikel Aktif -->
                <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <span class="text-xs text-indigo-600 font-semibold">{{ $a->title }}</span>
                    <h3 class="font-semibold text-slate-800 mt-2">
                        {{ $a->content }}
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        {{ $a->excerpt }}
                    </p>
                    <button class="mt-4 text-indigo-600 font-medium text-sm hover:underline">
                        Baca Artikel
                    </button>
                </div>
            @endforeach

            <!-- Artikel Terkunci -->
            <div class="relative bg-white rounded-xl shadow-sm p-5 overflow-hidden">
                <div class="absolute inset-0 bg-white/80 backdrop-blur-sm
                            flex items-center justify-center">
                    <span class="text-sm font-medium text-slate-600">
                        🔒 Premium Article
                    </span>
                </div>

                <span class="text-xs text-indigo-600 font-semibold">ARTIKEL</span>
                <h3 class="font-semibold text-slate-800 mt-2">
                    Optimasi Laravel untuk Production
                </h3>
                <p class="text-sm text-slate-500 mt-1">
                    Scaling & performance tuning
                </p>
            </div>

        </div>

        <!-- Upgrade CTA -->
        <div class="mt-12 bg-indigo-600 rounded-xl p-6
                    flex flex-col md:flex-row
                    md:justify-between md:items-center gap-4 text-white">
            <div>
                <h3 class="text-lg font-semibold">Upgrade ke Premium 🚀</h3>
                <p class="text-sm text-indigo-100">
                    Akses semua artikel & video tanpa batas
                </p>
            </div>
            <button
                class="bg-white text-indigo-600 px-6 py-2 rounded-lg font-medium hover:bg-indigo-50">
                Upgrade
            </button>
        </div>

    </main>
</div>
@endsection
