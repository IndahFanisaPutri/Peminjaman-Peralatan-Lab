<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl text-gray-800">
Dashboard Sistem Peminjaman Laboratorium
</h2>

</x-slot>


<div class="py-10">

<div class="max-w-7xl mx-auto">


<!-- CARD STATISTIK -->

<div class="grid grid-cols-1 md:grid-cols-4 gap-5">


<div class="bg-white shadow rounded-lg p-6">

<h3>
Total Jenis Alat
</h3>

<h1 class="text-4xl font-bold">
{{ $jumlahAlat }}
</h1>

</div>



<div class="bg-white shadow rounded-lg p-6">

<h3>
Total Stok
</h3>

<h1 class="text-4xl font-bold">
{{ $totalStok }}
</h1>

</div>



<div class="bg-white shadow rounded-lg p-6">

<h3>
Alat Tersedia
</h3>

<h1 class="text-4xl font-bold">
{{ $alatTersedia }}
</h1>

</div>



<div class="bg-white shadow rounded-lg p-6">

<h3>
Peminjaman
</h3>

<h1 class="text-4xl font-bold">
{{ $jumlahPeminjaman }}
</h1>

</div>


</div>



<br>



<!-- INFORMASI -->

<div class="bg-white shadow rounded-lg p-6">


<h2 class="text-xl font-bold">
Informasi Utilitas Alat
</h2>


<hr>


@if($alatTerpopuler)


<p class="mt-3">

Alat yang paling sering dipinjam:

<b>
{{ $alatTerpopuler->alat->nama_alat }}
</b>

</p>


<p>

Total peminjaman:

<b>
{{ $alatTerpopuler->jumlah_pinjam }}
kali
</b>

</p>


@else


<p>
Belum ada data peminjaman alat
</p>


@endif


</div>



<br>



<!-- MENU CEPAT -->


<div class="bg-white shadow rounded-lg p-6">


<h2 class="font-bold text-xl">
Menu Cepat
</h2>


<div class="mt-3">


<a href="{{ route('alat.index') }}"
class="px-4 py-2 bg-blue-500 text-white rounded">

Data Alat

</a>



<a href="{{ route('peminjaman.index') }}"
class="px-4 py-2 bg-green-500 text-white rounded">

Peminjaman

</a>


</div>


</div>



</div>


</div>


</x-app-layout>