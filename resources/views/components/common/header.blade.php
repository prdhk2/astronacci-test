

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Halo, {{ auth()->user()->name ?? 'User' }} 👋
        </h1>
        <p class="text-sm text-slate-500">
            Selamat datang di dashboard membership
        </p>
    </div>

    <div class="flex items-center gap-4">
        <!-- Membership Badge -->
        <span class="px-4 py-1 rounded-full text-sm font-medium
                bg-indigo-100 text-indigo-700">
            {{ auth()->user()->role()?->name ?? 'Basic' }}
        </span>


        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-medium transition">
                Logout
            </button>
        </form>
    </div>
</div>