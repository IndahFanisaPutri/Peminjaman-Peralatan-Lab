<aside
    class="fixed top-0 left-0 w-64 h-screen bg-white shadow-lg border-r z-50">

    <div class="h-20 flex items-center px-6 border-b">

        <div
            class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">

            S

        </div>

        <div class="ml-3">

            <h2 class="font-bold text-xl">

                SILAB

            </h2>

            <p class="text-gray-500 text-sm">

                Administrator

            </p>

        </div>

    </div>

    <nav class="mt-6 px-4">

        <a
            href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Dashboard

        </a>

        <a
            href="{{ route('alat.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Data Peralatan

        </a>

        <a
            href="{{ route('peminjaman.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Data Peminjaman

        </a>

        <a
            href="{{ route('admin.pengembalian.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Pengembalian

        </a>

        <a
            href="{{ route('servis.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Servis Peralatan

        </a>

        <a
            href="{{ route('laporan.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-indigo-100 mb-2">

            Laporan

        </a>

        <hr class="my-6">

        <form method="POST"
            action="{{ route('logout') }}">

            @csrf


        </form>

    </nav>

</aside>