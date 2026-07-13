<x-app-layout>

@include('layouts.user-navbar')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-3xl font-bold text-indigo-600 mb-2">

                Form Pengembalian Alat

            </h2>

            <p class="text-gray-500 mb-8">

                Silakan isi data pengembalian alat laboratorium.

            </p>

            @if ($errors->any())

                <div class="mb-6 bg-red-100 border border-red-300 rounded-lg p-4">

                    <ul class="list-disc ml-5 text-red-700">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('pengembalian.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Pilih Barang

                    </label>

                    <select
                        name="peminjaman_id"
                        id="peminjaman_id"
                        class="w-full rounded-lg border-gray-300">

                        @foreach($peminjaman as $item)

                            <option
                                value="{{ $item->id }}"
                                data-nama="{{ $item->alat->nama_alat }}"
                                data-jumlah="{{ $item->jumlah_pinjam }}">

                                {{ $item->alat->nama_alat }}
                                -
                                {{ $item->tanggal_pinjam }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Nama Barang

                    </label>

                    <input
                        type="text"
                        id="nama_barang"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Jumlah Dikembalikan

                    </label>

                    <input
                        type="number"
                        name="jumlah_dikembalikan"
                        id="jumlah"
                        class="w-full rounded-lg border-gray-300"
                        readonly>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Tanggal Pengembalian

                    </label>

                    <input
                        type="date"
                        name="tanggal_pengembalian"
                        value="{{ date('Y-m-d') }}"
                        readonly
                        class="w-full rounded-lg border-gray-300 bg-gray-100">

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Kondisi Barang

                    </label>

                    <select
                        name="kondisi_kembali"
                        class="w-full rounded-lg border-gray-300">

                        <option value="baik">

                            Baik

                        </option>

                        <option value="cukup">

                            Rusak Ringan

                        </option>

                        <option value="rusak">

                            Rusak Berat

                        </option>

                    </select>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Catatan

                    </label>

                    <textarea
                        name="catatan"
                        rows="4"
                        class="w-full rounded-lg border-gray-300"
                        placeholder="Tambahkan catatan bila diperlukan"></textarea>

                </div>

                <div class="mb-8">

                    <label class="block font-semibold mb-2">

                        Upload Foto Barang

                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="w-full border rounded-lg p-2">

                </div>

                <div class="flex gap-3">

                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">

                        Kirim Pengembalian

                    </button>

                    <a
                        href="{{ route('pengembalian.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

const select = document.getElementById('peminjaman_id');

const nama = document.getElementById('nama_barang');

const jumlah = document.getElementById('jumlah');

function tampilkanData(){

    let option = select.options[select.selectedIndex];

    nama.value = option.dataset.nama;

    jumlah.value = option.dataset.jumlah;

}

select.addEventListener('change', tampilkanData);

tampilkanData();

</script>

</x-app-layout>