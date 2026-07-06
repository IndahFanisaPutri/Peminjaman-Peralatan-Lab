<x-app-layout>

<div class="min-h-screen bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">

        <div class="h-20 flex items-center px-8">
            <div class="text-3xl font-bold text-indigo-600">
                S
            </div>

            <h1 class="ml-3 text-xl font-bold text-gray-700">
                SilaLab
            </h1>
        </div>

        <nav class="px-5 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                🏠 Dashboard
            </a>

            <a href="{{ route('alat.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-100 text-indigo-600 font-semibold">
                ⚙️ Data Alat
            </a>

            <a href="{{ route('peminjaman.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                📦 Peminjaman
            </a>

            @if(auth()->user()->role=='admin')
            <a href="{{ route('laporan.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-100">
                📊 Laporan
            </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl">
                    🚪 Logout
                </button>
            </form>

        </nav>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">

            <h1 class="text-3xl font-bold text-gray-700">
                ✏ Edit Alat Laboratorium
            </h1>

            <p class="text-gray-500 mt-2">
                Perbarui informasi alat laboratorium.
            </p>

        </div>

        <!-- FORM -->
        <div class="bg-white rounded-xl shadow-sm p-8">

            @if ($errors->any())

                <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-6">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('alat.update',$alat->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="font-semibold">Kode Alat</label>

                        <input
                            type="text"
                            name="kode_alat"
                            value="{{ old('kode_alat',$alat->kode_alat) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="font-semibold">Nama Alat</label>

                        <input
                            type="text"
                            name="nama_alat"
                            value="{{ old('nama_alat',$alat->nama_alat) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="font-semibold">Kategori</label>

                        <input
                            type="text"
                            name="kategori"
                            value="{{ old('kategori',$alat->kategori) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="font-semibold">Merk</label>

                        <input
                            type="text"
                            name="merk"
                            value="{{ old('merk',$alat->merk) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="font-semibold">Model</label>

                        <input
                            type="text"
                            name="model"
                            value="{{ old('model',$alat->model) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>

                        <label class="font-semibold">
                            Kondisi
                        </label>

                        <select
                            name="kondisi"
                            class="w-full mt-2 border rounded-lg p-3">

                            <option value="baik"
                                {{ old('kondisi',$alat->kondisi)=='baik' ? 'selected':'' }}>
                                Baik
                            </option>

                            <option value="cukup"
                                {{ old('kondisi',$alat->kondisi)=='cukup' ? 'selected':'' }}>
                                Cukup
                            </option>

                            <option value="rusak"
                                {{ old('kondisi',$alat->kondisi)=='rusak' ? 'selected':'' }}>
                                Rusak
                            </option>

                        </select>

                    </div>

                    <div>
                        <label class="font-semibold">Jumlah</label>

                        <input
                            type="number"
                            name="jumlah"
                            value="{{ old('jumlah',$alat->jumlah) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="font-semibold">Lokasi</label>

                        <input
                            type="text"
                            name="lokasi"
                            value="{{ old('lokasi',$alat->lokasi) }}"
                            class="w-full mt-2 border rounded-lg p-3">
                    </div>

                    <div class="md:col-span-2">

                        <label class="font-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            rows="4"
                            name="deskripsi"
                            class="w-full mt-2 border rounded-lg p-3">{{ old('deskripsi',$alat->deskripsi) }}</textarea>

                    </div>

                    <div class="md:col-span-2">

                        <label class="font-semibold">
                            Foto Saat Ini
                        </label>

                        <br><br>

                        @if($alat->foto)

                            <img
                                src="{{ asset('storage/'.$alat->foto) }}"
                                class="w-48 rounded-lg border shadow">

                        @else

                            <p class="text-gray-500">
                                Belum ada foto
                            </p>

                        @endif

                    </div>

                    <div class="md:col-span-2">

                        <label class="font-semibold">
                            Ganti Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            accept="image/*"
                            class="w-full mt-2 border rounded-lg p-3">

                        <img
                            id="preview"
                            class="hidden mt-4 w-48 rounded-lg border shadow">

                    </div>

                </div>

                <div class="mt-8 flex gap-4">

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold">

                        💾 Update Data

                    </button>

                    <a href="{{ route('alat.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 px-8 py-3 rounded-lg font-semibold">

                        ← Kembali

                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

<script>

document.querySelector('input[name="foto"]').onchange = function(e){

    if(e.target.files.length){

        let reader = new FileReader();

        reader.onload = function(){

            let img = document.getElementById('preview');

            img.src = reader.result;

            img.classList.remove('hidden');

        }

        reader.readAsDataURL(e.target.files[0]);

    }

}

</script>

</x-app-layout>