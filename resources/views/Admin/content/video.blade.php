@extends('Layout.app')

@section('title', 'Video')

@section('content')
<div class="min-h-screen bg-slate-100 flex">

    <!-- Sidebar -->
    <x-common.sidebar />

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <x-common.header />

        <!-- Video Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Video Aktif -->
            @foreach ($video as $a)    
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <div class="h-40 bg-slate-200 flex items-center justify-center">
                    <span class="text-slate-500 text-sm">{{ $a->video_url }}</span>
                </div>
                <div class="p-5">
                    <span class="text-xs text-indigo-600 font-semibold">VIDEO</span>
                    <h3 class="font-semibold text-slate-800 mt-2">
                        {{ $a->description }}
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        {{ $a->published_at }}
                    </p>
                    <button class="mt-4 text-indigo-600 font-medium text-sm hover:underline">
                        Tonton Video
                    </button>
                </div>
            </div>
            @endforeach

            <!-- Video Terkunci -->
            <div class="relative bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="absolute inset-0 bg-white/80 backdrop-blur-sm
                            flex items-center justify-center z-10">
                    <span class="text-sm font-medium text-slate-600">
                        🔒 Premium Video
                    </span>
                </div>

                <div class="h-40 bg-slate-200 flex items-center justify-center">
                    <span class="text-slate-500 text-sm">🎬 Thumbnail</span>
                </div>
                <div class="p-5">
                    <span class="text-xs text-indigo-600 font-semibold">VIDEO</span>
                    <h3 class="font-semibold text-slate-800 mt-2">
                        Laravel Scaling & Optimization
                    </h3>
                    <p class="text-sm text-slate-500 mt-1">
                        Performance & best practice
                    </p>
                </div>
            </div>

        </div>

        <!-- Upgrade CTA -->
        <div class="mt-12 bg-indigo-600 rounded-xl p-6
                    flex flex-col md:flex-row
                    md:justify-between md:items-center gap-4 text-white">
            <div>
                <h3 class="text-lg font-semibold">Upgrade ke Premium 🚀</h3>
                <p class="text-sm text-indigo-100">
                    Akses semua video tanpa batas
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
