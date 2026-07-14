<nav class="bg-white shadow-md">

    <div class="max-w-7xl mx-auto px-8">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl">
                    S
                </div>

                <h1 class="text-2xl font-bold text-indigo-600">
                    SILAB
                </h1>

            </div>

            <!-- Menu -->
            <div class="flex items-center space-x-8">

                <a href="{{ route('user.dashboard') }}"
                    class="text-gray-600 hover:text-indigo-600 font-semibold transition duration-200">
                    Dashboard
                </a>

                <a href="{{ route('peminjaman.index') }}"
                    class="text-gray-600 hover:text-indigo-600 font-semibold transition duration-200">
                    Peminjaman
                </a>

                <a href="{{ route('pengembalian.index') }}"
                    class="text-gray-600 hover:text-indigo-600 font-semibold transition duration-200">
                    Pengembalian
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="text-gray-600 hover:text-indigo-600 font-medium">
                    Profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 transition text-white px-5 py-2 rounded-xl font-semibold shadow">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>