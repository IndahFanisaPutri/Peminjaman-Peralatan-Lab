<aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg hidden md:block z-50">

    <div class="h-20 flex items-center px-8">

        <div class="text-4xl font-bold text-indigo-600">
            S
        </div>

        <h1 class="ml-3 text-2xl font-bold text-gray-700">
            SILAB
        </h1>

    </div>

    <nav class="px-5 space-y-2">

        <a href="{{ route('user.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-100">

            🏠 Dashboard

        </a>

        <a href="{{ route('peminjaman.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-100">

            📦 Mulai Peminjaman

        </a>

        <a href="{{ route('peminjaman.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-100">

            📜 Riwayat Peminjaman

        </a>

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-100">

            👤 Profil

        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl">

                🚪 Logout

            </button>

        </form>

    </nav>

</aside>