<aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg hidden md:block z-50">

    <div class="h-20 flex items-center px-8">
        <div class="text-3xl text-indigo-500 font-bold">
            S
        </div>

        <h1 class="ml-3 text-xl font-bold text-gray-700">
            SilaLab
        </h1>
    </div>

    <nav class="px-5 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">
            🏠 Dashboard
        </a>

        <a href="{{ route('alat.index') }}"
           class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">
            ⚙️ Peralatan
        </a>

        <a href="{{ route('peminjaman.index') }}"
           class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">
            📦 Peminjaman
        </a>

        <a href="{{ route('servis.index') }}"
           class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">
            🛠 Servis
        </a>

        <a href="{{ route('laporan.index') }}"
           class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">
            📊 Laporan
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left px-4 py-3 text-red-500">
                🚪 Logout
            </button>
        </form>

    </nav>

</aside>