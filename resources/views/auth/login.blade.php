<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center 
bg-gradient-to-br from-indigo-900 via-purple-700 to-indigo-600">


        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden">


            <!-- HEADER -->

            <div class="bg-gradient-to-br from-purple-600 to-indigo-500 p-10 text-center text-white">


                <div class="mx-auto w-24 h-24 rounded-2xl bg-white/20 flex items-center justify-center">

                    <span class="text-5xl font-bold">
                        S
                    </span>

                </div>


                <h1 class="mt-5 text-3xl font-bold">
                    SILAB
                </h1>


                <p class="mt-2">
                    Sistem Informasi Peminjaman Barang Laboratorium
                </p>


            </div>





            <!-- FORM -->

            <div class="p-8">








                <form method="POST" action="{{route('login')}}">

                    @csrf


                    <input type="hidden"
                        name="role"
                        x-model="role">



                    <!-- EMAIL -->


                    <div>

                        <label class="font-semibold">
                            Email
                        </label>


                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="Masukkan email"
                            class="mt-2 w-full rounded-xl border-gray-300">


                    </div>





                    <!-- PASSWORD -->


                    <div class="mt-5">


                        <label class="font-semibold">
                            Password
                        </label>


                        <input

                            type="password"

                            name="password"

                            required

                            placeholder="Masukkan password"

                            class="mt-2 w-full rounded-xl border-gray-300">


                    </div>






                    <div class="mt-4">


                        <label class="flex gap-2">


                            <input type="checkbox"
                                name="remember">


                            <span>
                                Ingat saya
                            </span>


                        </label>


                    </div>






                    <button
                        class="mt-6 w-full py-3 rounded-xl
bg-gradient-to-r from-indigo-600 to-purple-600
text-white font-bold text-lg">

                        ➜ Masuk

                    </button>

                </form>

                <div class="text-center mt-4 text-sm">

                    Belum punya akun?

                    <a href="{{ route('register') }}"
                        class="text-indigo-600 font-bold hover:underline">

                        Daftar sekarang

                    </a>

                </div>

            </div>
        </div>


    </div>


</x-guest-layout>