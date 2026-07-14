<x-app-layout>

    <div class="min-h-screen bg-gray-100">

        @include('layouts.admin-sidebar')

        <main class="ml-64 p-8">

            <div class="bg-white rounded-xl shadow p-6">

                <h1 class="text-2xl font-bold text-indigo-600 mb-6">
                    Detail Pengembalian
                </h1>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <label class="font-semibold">Nama Peminjam</label>
                        <p>{{ $pengembalian->nama_peminjam }}</p>
                    </div>

                    <div>
                        <label class="font-semibold">NIM</label>
                        <p>{{ $pengembalian->nim_peminjam }}</p>
                    </div>

                    <div>
                        <label class="font-semibold">Barang</label>
                        <p>{{ $pengembalian->alat->nama_alat }}</p>
                    </div>

                    <div>
                        <label class="font-semibold">Jumlah</label>
                        <p>{{ $pengembalian->jumlah_dikembalikan }}</p>
                    </div>

                    <div>
                        <label class="font-semibold">Tanggal Pengembalian</label>
                        <p>{{ $pengembalian->tanggal_pengembalian }}</p>
                    </div>

                    <div>
                        <label class="font-semibold">Kondisi Barang</label>
                        <p>{{ ucfirst($pengembalian->kondisi_kembali) }}</p>
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">Catatan User</label>
                        <p>
                            {{ $pengembalian->catatan ?? '-' }}
                        </p>
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">Foto Barang</label>

                        @if($pengembalian->alat && $pengembalian->alat->foto)

                        <img
                            src="{{ asset('storage/' . $pengembalian->alat->foto) }}"
                            class="w-64 rounded-lg mt-2">

                        @else

                        <p>Tidak ada foto.</p>

                        @endif

                    </div>

                </div>

                <hr class="my-8">

                <form
                    action="{{ route('admin.pengembalian.update',$pengembalian->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <div class="mb-4">

                            <label class="font-semibold">
                                Kondisi Barang
                            </label>

                            <select
                                name="kondisi_kembali"
                                class="w-full border rounded-lg mt-2">

                                <option value="baik">Baik</option>
                                <option value="cukup">Cukup</option>
                                <option value="rusak">Rusak</option>

                            </select>

                        </div>
                        <label class="font-semibold">
                            Keputusan Admin
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded-lg mt-2">

                            <option value="disetujui">
                                Setujui
                            </option>

                            <option value="ditolak">
                                Tolak
                            </option>

                        </select>

                    </div>

                    <div class="mb-6">

                        <label class="font-semibold">
                            Keterangan Admin
                        </label>

                        <textarea
                            name="keterangan_admin"
                            rows="4"
                            class="w-full border rounded-lg mt-2"></textarea>

                    </div>

                    <button
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg">

                        Simpan Keputusan

                    </button>

                </form>

            </div>

        </main>

    </div>

</x-app-layout>