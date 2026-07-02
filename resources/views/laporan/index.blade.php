<x-app-layout>


<div class="min-h-screen bg-gray-100 flex">



    <!-- SIDEBAR -->

    <aside class="w-64 bg-white shadow-lg hidden md:block">


        <div class="h-20 flex items-center px-8">

            <div class="text-3xl text-indigo-500 font-bold">
                S
            </div>


            <h1 class="ml-3 text-xl font-bold text-gray-700">
                SilaLab
            </h1>

        </div>





        <nav class="px-5 space-y-2">


            <a href="{{route('dashboard')}}"
            class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                🏠 Dashboard

            </a>





            <a href="{{route('alat.index')}}"
            class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                ⚙️ Peralatan

            </a>





            <a href="{{route('peminjaman.index')}}"
            class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                📦 Peminjaman

            </a>





            <a href="{{route('servis.index')}}"
            class="flex gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                🔧 Servis

            </a>






            <a href="{{route('laporan.index')}}"
            class="flex gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">

                📊 Laporan

            </a>







            <form method="POST" action="{{route('logout')}}">

                @csrf

                <button class="w-full text-left px-4 py-3 text-red-500">

                    🚪 Logout

                </button>


            </form>



        </nav>


    </aside>









    <!-- CONTENT -->


    <main class="flex-1 p-8">





        <!-- HEADER -->


        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 flex justify-between items-center">


            <div>


                <h1 class="text-2xl font-bold text-gray-700">

                    Laporan Laboratorium

                </h1>


                <p class="text-gray-400 mt-2">

                    Rekap data peminjaman dan penggunaan alat

                </p>


            </div>





            <button

            onclick="window.print()"

            class="bg-indigo-500 text-white px-5 py-3 rounded-lg hover:bg-indigo-600">


                🖨 Cetak Laporan


            </button>



        </div>









        <!-- STATISTIK -->



        <div class="grid md:grid-cols-4 gap-5 mb-6">





            <div class="bg-white rounded-xl shadow p-5">


                <p class="text-gray-400">

                    Total Peminjaman

                </p>


                <h2 class="text-4xl font-bold text-indigo-600">

                    {{$totalPeminjaman ?? 0}}

                </h2>


            </div>







            <div class="bg-white rounded-xl shadow p-5">


                <p class="text-gray-400">

                    Disetujui

                </p>


                <h2 class="text-4xl font-bold text-green-500">

                    {{$disetujui ?? 0}}

                </h2>


            </div>







            <div class="bg-white rounded-xl shadow p-5">


                <p class="text-gray-400">

                    Dikembalikan

                </p>


                <h2 class="text-4xl font-bold text-blue-500">

                    {{$dikembalikan ?? 0}}

                </h2>


            </div>








            <div class="bg-white rounded-xl shadow p-5">


                <p class="text-gray-400">

                    Denda

                </p>


                <h2 class="text-2xl font-bold text-red-500">


                    Rp {{number_format($totalDenda ?? 0)}}


                </h2>


            </div>





        </div>











        <!-- TABLE -->


        <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">





        <table class="w-full text-left">



            <thead>


            <tr class="border-b text-gray-500">


                <th class="p-3">
                    Nama
                </th>


                <th class="p-3">
                    Alat
                </th>


                <th class="p-3">
                    Tanggal
                </th>


                <th class="p-3">
                    Jumlah
                </th>


                <th class="p-3">
                    Status
                </th>



            </tr>


            </thead>







            <tbody>



            @foreach($laporan ?? [] as $item)



            <tr class="border-b hover:bg-gray-50">





                <td class="p-3">

                    {{$item->nama_peminjam}}

                </td>





                <td class="p-3 font-semibold">

                    {{$item->alat->nama_alat}}

                </td>





                <td class="p-3">

                    {{$item->tanggal_pinjam}}

                </td>





                <td class="p-3">

                    {{$item->jumlah_pinjam}}

                </td>







                <td class="p-3">



                @if($item->status=='disetujui')


                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

                    Disetujui

                </span>




                @elseif($item->status=='menunggu')


                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">

                    Menunggu

                </span>




                @elseif($item->status=='ditolak')


                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">

                    Ditolak

                </span>




                @else


                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full">

                    Selesai

                </span>


                @endif



                </td>






            </tr>




            @endforeach






            </tbody>




        </table>




        </div>





    </main>






</div>



</x-app-layout>