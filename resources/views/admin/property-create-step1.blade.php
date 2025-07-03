<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Properti - Step 1') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('admin.properties.storeStep1') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_aset" class="block font-medium">Kode Aset *</label>
                        <input type="text" name="kode_aset" id="kode_aset" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block font-medium">Nama Properti *</label>
                        <input type="text" name="nama" id="nama" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block font-medium">Alamat *</label>
                        <textarea name="alamat" id="alamat" class="w-full border rounded p-2" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="luas_tanah" class="block font-medium">Luas Tanah (m²) *</label>
                        <input type="number" name="luas_tanah" id="luas_tanah" class="w-full border rounded p-2" required min="0" step="0.01">
                    </div>
                    <div class="mb-4">
                        <label for="luas_bangunan" class="block font-medium">Luas Bangunan (m²)</label>
                        <input type="number" name="luas_bangunan" id="luas_bangunan" class="w-full border rounded p-2" min="0" step="0.01">
                    </div>
                    <div class="mb-4">
                        <label for="kamar_tidur" class="block font-medium">Jumlah Kamar Tidur</label>
                        <input type="number" name="kamar_tidur" id="kamar_tidur" class="w-full border rounded p-2" min="0">
                    </div>
                    <div class="mb-4">
                        <label for="kamar_mandi" class="block font-medium">Jumlah Kamar Mandi</label>
                        <input type="number" name="kamar_mandi" id="kamar_mandi" class="w-full border rounded p-2" min="0">
                    </div>
                    <div class="mb-4">
                        <label for="listrik" class="block font-medium">Daya Listrik</label>
                        <input type="text" name="listrik" id="listrik" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label for="air" class="block font-medium">Sumber Air</label>
                        <input type="text" name="air" id="air" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Kondisi Properti *</label>
                        <div class="flex flex-wrap gap-4">
                            <label><input type="checkbox" name="kondisi[]" value="L"> L</label>
                            <label><input type="checkbox" name="kondisi[]" value="K"> K</label>
                            <label><input type="checkbox" name="kondisi[]" value="AP"> AP</label>
                            <label><input type="checkbox" name="kondisi[]" value="SH"> SH</label>
                            <label><input type="checkbox" name="kondisi[]" value="AJB"> AJB</label>
                            <label><input type="checkbox" name="kondisi[]" value="TK"> TK</label>
                            <label><input type="checkbox" name="kondisi[]" value="TP"> TP</label>
                            <label><input type="checkbox" name="kondisi[]" value="BR"> BR</label>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Lanjut ke Step 2</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
