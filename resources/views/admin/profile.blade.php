<x-app-layout>

<div class="min-h-screen bg-gray-100">

    @include('layouts.admin-sidebar')

    <main class="ml-64 p-8">

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-2xl font-bold text-gray-700">

                Profil Administrator

            </h1>

            <p class="text-gray-500 mt-2">

                Kelola informasi akun administrator.

            </p>

        </div>

        @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">

            {{ session('success') }}

        </div>

        @endif

        <div class="bg-white rounded-xl shadow p-8">

            <form action="{{ route('admin.profile.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-5">

                    <label class="block font-semibold mb-2">

                        Nama

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ auth()->user()->name }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block font-semibold mb-2">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ auth()->user()->email }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div class="mb-5">

                    <label class="block font-semibold mb-2">

                        Password Baru

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Konfirmasi Password

                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">

                    Simpan Perubahan

                </button>

            </form>

        </div>

    </main>

</div>

</x-app-layout>