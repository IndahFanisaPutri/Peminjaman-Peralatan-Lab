<x-app-layout>

<div class="min-h-screen bg-gray-100">

@include('layouts.admin-sidebar')

    <!-- SIDEBAR -->
     @if(auth()->user()->role == 'admin')
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


            <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">

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



            @if(auth()->user()->role=='admin')

            <a href="{{ route('laporan.index') }}"
            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                📊 Laporan

            </a>


            @endif





            <form method="POST" action="{{route('logout')}}">

                @csrf

                <button class="w-full text-left px-4 py-3 text-red-500">

                    🚪 Logout

                </button>


            </form>



        </nav>



    </aside>

    @endif





    <!-- CONTENT -->

    <main class="flex-1 p-6 {{ auth()->user()->role == 'admin' ? 'ml-64' : '' }}">



        <!-- TOPBAR -->

        <div class="bg-white rounded-xl shadow-sm px-6 py-4 flex justify-between items-center mb-6">



            <div class="text-gray-400">

                🔍 Search

            </div>



            <div class="flex gap-5 items-center">


                🔔


                <div class="w-10 h-10 rounded-full bg-indigo-200 flex items-center justify-center">

                    👤

                </div>


            </div>



        </div>







        <!-- WELCOME -->


        <div class="grid lg:grid-cols-3 gap-6">



            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-8">



                <h2 class="text-2xl font-bold text-indigo-600">

                    Congratulations {{auth()->user()->name}} 🎉

                </h2>



                <p class="text-gray-500 mt-3">

                    Sistem peminjaman laboratorium berjalan dengan baik.
                    Kelola alat dan peminjaman dengan mudah.

                </p>



                <a href="{{route('peminjaman.index')}}"
                class="inline-block mt-5 px-5 py-2 bg-indigo-500 text-white rounded-lg">


                    Mulai Peminjaman


                </a>



            </div>





            <div class="bg-indigo-100 rounded-xl flex items-center justify-center text-7xl">


                👨‍💻


            </div>



        </div>









        <!-- STATISTIC -->


        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-6">



            <div class="bg-white p-5 rounded-xl shadow-sm">


                <p class="text-gray-400">
                    Jumlah Alat
                </p>


                <h2 class="text-3xl font-bold">

                    {{$jumlahAlat}}

                </h2>


            </div>







            <div class="bg-white p-5 rounded-xl shadow-sm">


                <p class="text-gray-400">
                    Total Stok
                </p>


                <h2 class="text-3xl font-bold">

                    {{$totalStok}}

                </h2>


            </div>







            <div class="bg-white p-5 rounded-xl shadow-sm">


                <p class="text-gray-400">
                    Alat Tersedia
                </p>


                <h2 class="text-3xl font-bold text-green-500">

                    {{$alatTersedia}}

                </h2>


            </div>







            <div class="bg-white p-5 rounded-xl shadow-sm">


                <p class="text-gray-400">
                    Peminjaman
                </p>


                <h2 class="text-3xl font-bold">

                    {{$jumlahPeminjaman}}

                </h2>


            </div>




        </div>








        <!-- BOTTOM -->


        <div class="grid lg:grid-cols-3 gap-6 mt-6">



            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">



                <h2 class="text-xl font-bold mb-5">

                    Statistik Peminjaman

                </h2>




                <div class="h-60 flex items-end gap-6">


                    @for($i=1;$i<=7;$i++)


                    <div class="bg-indigo-400 w-8 rounded-t"
                    style="height: {{rand(30,90)}}%">

                    </div>


                    @endfor


                </div>




            </div>








            <div class="bg-white rounded-xl shadow-sm p-6">



                <h2 class="font-bold">

                    Statistik

                </h2>




                <div class="mt-8 text-center">


                    <div class="text-5xl text-indigo-500">

                        78%

                    </div>


                    <p class="text-gray-400">

                        Growth

                    </p>


                </div>



            </div>



        </div>






    </main>



</div>


</x-app-layout>