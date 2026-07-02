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
            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                🏠 Dashboard

            </a>


            <a href="{{route('alat.index')}}"
            class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl">

                ⚙️ Peralatan

            </a>



            <a href="{{route('peminjaman.index')}}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">

                📦 Peminjaman

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

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">


            <h1 class="text-2xl font-bold text-gray-700">

                Ajukan Peminjaman Alat

            </h1>


            <p class="text-gray-400 mt-2">

                Isi data peminjaman laboratorium dengan lengkap

            </p>


        </div>






        <!-- FORM -->

        <div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl">


            @if(session('success'))

            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-5">

                {{session('success')}}

            </div>

            @endif



            <form action="{{route('peminjaman.store')}}" method="POST">

            @csrf



            <div class="grid md:grid-cols-2 gap-5">



                <!-- ALAT -->

                <div>

                    <label class="font-semibold">
                        Pilih Alat
                    </label>

                    <select name="alat_id"
                    class="w-full mt-2 border rounded-lg p-3">


                    <option value="">
                        -- pilih alat --
                    </option>


                    @foreach($alat as $item)

                    <option value="{{$item->id}}">

                        {{$item->nama_alat}}
                        (stok {{$item->jumlah_tersedia}})

                    </option>

                    @endforeach


                    </select>

                </div>





                <!-- NAMA -->

                <div>

                    <label class="font-semibold">
                        Nama Peminjam
                    </label>


                    <input 
                    type="text"
                    name="nama_peminjam"
                    class="w-full mt-2 border rounded-lg p-3">


                </div>






                <!-- NIM -->

                <div>

                    <label class="font-semibold">
                        NIM
                    </label>


                    <input 
                    type="text"
                    name="nim_peminjam"
                    class="w-full mt-2 border rounded-lg p-3">


                </div>






                <!-- JUMLAH -->

                <div>

                    <label class="font-semibold">
                        Jumlah Pinjam
                    </label>


                    <input 
                    type="number"
                    name="jumlah_pinjam"
                    class="w-full mt-2 border rounded-lg p-3">


                </div>







                <!-- TANGGAL -->

                <div>


                    <label class="font-semibold">
                        Tanggal Pinjam
                    </label>


                    <input
                    type="date"
                    name="tanggal_pinjam"
                    class="w-full mt-2 border rounded-lg p-3">


                </div>





                <div>


                    <label class="font-semibold">
                        Rencana Kembali
                    </label>


                    <input
                    type="date"
                    name="tanggal_rencana_kembali"
                    class="w-full mt-2 border rounded-lg p-3">


                </div>



            </div>





            <!-- KEPERLUAN -->


            <div class="mt-5">


                <label class="font-semibold">

                    Keperluan

                </label>


                <textarea
                name="keperluan"
                rows="4"
                class="w-full mt-2 border rounded-lg p-3"></textarea>


            </div>






            <!-- BUTTON -->


            <div class="mt-6 flex gap-3">


                <button
                class="px-6 py-3 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">

                    Simpan Peminjaman

                </button>



                <a href="{{route('peminjaman.index')}}"
                class="px-6 py-3 bg-gray-200 rounded-lg">

                    Kembali

                </a>



            </div>





            </form>


        </div>




    </main>



</div>


</x-app-layout>