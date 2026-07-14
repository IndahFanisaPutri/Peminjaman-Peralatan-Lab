<x-app-layout>

    <div class="min-h-screen bg-gray-100">

        @include('layouts.user-navbar')

        <main class="max-w-4xl mx-auto px-6 py-10">

            <div class="bg-white rounded-2xl shadow-lg p-8">

                <div class="text-center">

                    <div class="w-24 h-24 rounded-full bg-indigo-100 mx-auto flex items-center justify-center text-5xl">
                        👤
                    </div>

                    <h1 class="text-3xl font-bold text-indigo-600 mt-5">
                        Profil Saya
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Kelola informasi akun Anda.
                    </p>

                </div>

                <form method="POST"
                    action="{{ route('profile.update') }}"
                    class="mt-10">

                    @csrf
                    @method('PATCH')

                    <div class="space-y-6">

                        <div>
                            <label class="font-semibold">
                                Nama
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="font-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="font-semibold">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="font-semibold">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Konfirmasi password baru"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                    </div>

                    <div class="mt-8 text-center">

                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-semibold">

                            💾 Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

</x-app-layout>