<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-700 to-purple-700 py-10">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-center text-white p-8">

            
            <h1 class="text-3xl font-bold">
                SILAB
            </h1>

            <p class="mt-2">
                Sistem Informasi Peminjaman Peralatan Laboratorium
            </p>

        </div>

        <!-- Form -->
        <div class="p-8">

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <!-- Nama -->
                <div class="mb-4">

                    <label class="font-semibold">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        class="w-full border rounded-xl p-3 mt-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required
                        autofocus>

                    @error('name')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Email -->
                <div class="mb-4">

                    <label class="font-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        class="w-full border rounded-xl p-3 mt-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>

                    @error('email')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Role -->
                <div class="mb-4">

                    <label class="font-semibold">
                        Daftar Sebagai
                    </label>

                    <select
                        name="role"
                        class="w-full border rounded-xl p-3 mt-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>

                        <option value="">-- Pilih --</option>

                        <option value="user"
                            {{ old('role') == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                        <option value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                    </select>

                    @error('role')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Password -->
                <div class="mb-4">

                    <label class="font-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full border rounded-xl p-3 mt-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>

                    @error('password')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-6">

                    <label class="font-semibold">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        class="w-full border rounded-xl p-3 mt-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>

                </div>

                <!-- Tombol -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 duration-200 text-white font-bold rounded-xl py-3">

                    Daftar

                </button>

                <!-- Login -->
                <div class="text-center mt-6">

                    Sudah punya akun?

                    <a
                        href="{{ route('login') }}"
                        class="text-indigo-600 hover:text-indigo-800 font-bold">

                        Login

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-guest-layout>