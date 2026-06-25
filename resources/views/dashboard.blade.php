<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Sistem Peminjaman Laboratorium
        </h2>

    </x-slot>



    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="grid grid-cols-4 gap-4">


                <div class="bg-white p-6 shadow rounded">

                    <h3>
                        Jumlah Jenis Alat
                    </h3>

                    <h1 class="text-3xl">
                        {{ $jumlahAlat }}
                    </h1>

                </div>




                <div class="bg-white p-6 shadow rounded">

                    <h3>
                        Total Stok
                    </h3>

                    <h1 class="text-3xl">
                        {{ $totalStok }}
                    </h1>

                </div>




                <div class="bg-white p-6 shadow rounded">

                    <h3>
                        Alat Tersedia
                    </h3>

                    <h1 class="text-3xl">
                        {{ $alatTersedia }}
                    </h1>

                </div>




                <div class="bg-white p-6 shadow rounded">

                    <h3>
                        Peminjaman
                    </h3>

                    <h1 class="text-3xl">
                        {{ $jumlahPeminjaman }}
                    </h1>

                </div>


            </div>



            <br>



            <div class="bg-white p-6 shadow rounded">


                <h2 class="text-xl">

                    Alat Paling Banyak Dipinjam

                </h2>



                @if($alatTerpopuler)


                    <p>

                    Nama :
                    {{ $alatTerpopuler->alat->nama_alat }}

                    </p>


                    <p>

                    Jumlah Pinjam :
                    {{ $alatTerpopuler->jumlah_pinjam }}

                    kali

                    </p>


                @else

                    <p>
                        Belum ada data peminjaman
                    </p>

                @endif



            </div>



        </div>

    </div>


</x-app-layout>