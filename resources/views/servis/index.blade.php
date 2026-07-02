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
            class="flex gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">


                🔧 Servis Alat


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

                    Jadwal Service Alat

                </h1>


                <p class="text-gray-400 mt-2">

                    Kelola perawatan dan kondisi alat laboratorium

                </p>


            </div>





            <a href="{{route('servis.create')}}"

            class="bg-indigo-500 text-white px-5 py-3 rounded-lg hover:bg-indigo-600">


                + Tambah Service


            </a>



        </div>









        @if(session('success'))


        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">


            {{session('success')}}


        </div>


        @endif










        <!-- TABLE CARD -->

        <div class="bg-white shadow-sm rounded-xl p-6 overflow-x-auto">





        <table class="w-full text-left">



            <thead>


                <tr class="border-b text-gray-500">



                    <th class="p-3">
                        Alat
                    </th>


                    <th class="p-3">
                        Tanggal Service
                    </th>


                    <th class="p-3">
                        Teknisi
                    </th>


                    <th class="p-3">
                        Kerusakan
                    </th>


                    <th class="p-3">
                        Status
                    </th>


                    <th class="p-3">
                        Aksi
                    </th>


                </tr>


            </thead>







            <tbody>




            @foreach($servis as $item)



            <tr class="border-b hover:bg-gray-50">





                <td class="p-3 font-semibold">


                    {{$item->alat->nama_alat}}


                </td>







                <td class="p-3">


                    {{\Carbon\Carbon::parse($item->tanggal_service)
                    ->format('d-m-Y')}}


                </td>







                <td class="p-3">


                    {{$item->teknisi}}


                </td>







                <td class="p-3">


                    {{$item->kerusakan}}


                </td>








                <td class="p-3">





                @if($item->status=='selesai')


                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

                    Selesai

                </span>




                @elseif($item->status=='proses')



                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full">

                    Proses

                </span>





                @else


                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">

                    Pending

                </span>




                @endif





                </td>









                <td class="p-3">





                    <a href="{{route('servis.edit',$item->id)}}"

                    class="text-yellow-500">

                        Edit

                    </a>





                    <form
                    action="{{route('servis.destroy',$item->id)}}"
                    method="POST"
                    class="inline">


                    @csrf

                    @method('DELETE')


                    <button class="text-red-500 ml-2">

                        Hapus

                    </button>


                    </form>



                </td>






            </tr>





            @endforeach






            </tbody>






        </table>




        </div>





    </main>




</div>




</x-app-layout>