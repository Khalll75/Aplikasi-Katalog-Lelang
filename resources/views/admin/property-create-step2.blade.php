<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Properti - Step 2: Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-4">{{ $property->nama }}</h3>
                <form action="{{ route('admin.properties.storeStep2', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Upload Gambar -->
                    <div class="mb-6">
                        <label class="block font-medium mb-2">Gambar Properti</label>
                        <div id="image-list" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <input type="file" name="images[]" accept="image/*" class="flex-1 border rounded p-2">
                                <div class="flex items-center gap-2">
                                    <input type="radio" name="main_image" value="0" id="main_0" checked>
                                    <label for="main_0" class="text-sm">Utama</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addImageInput()" class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">+ Tambah Gambar</button>
                        <p class="text-sm text-gray-500 mt-1">Pilih salah satu gambar sebagai gambar utama</p>
                    </div>
                    <!-- Jadwal Lelang -->
                    <div class="mb-6">
                        <label class="block font-medium mb-2">Jadwal Lelang (Opsional)</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="tanggal_lelang" class="block text-sm">Tanggal Lelang</label>
                                <input type="date" name="tanggal_lelang" id="tanggal_lelang" class="w-full border rounded p-2">
                            </div>
                            <div>
                                <label for="lokasi_lelang" class="block text-sm">Lokasi Lelang</label>
                                <input type="text" name="lokasi_lelang" id="lokasi_lelang" class="w-full border rounded p-2">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="harga_limit" class="block text-sm">Harga Limit</label>
                            <input type="number" name="harga_limit" id="harga_limit" class="w-full border rounded p-2" min="0" step="1">
                        </div>
                    </div>
                    <!-- Point of Interest -->
                    <div class="mb-6">
                        <label class="block font-medium mb-2">Point of Interest (Opsional)</label>
                        <div id="poi-list" class="space-y-3">
                            <input type="text" name="points_of_interest[]" class="w-full border rounded p-2" placeholder="Contoh: Dekat dengan mall, sekolah, rumah sakit">
                        </div>
                        <button type="button" onclick="addPOI()" class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">+ Tambah Point of Interest</button>
                    </div>
                    <!-- Contact Person -->
                    <div class="mb-6">
                        <label class="block font-medium mb-2">Contact Person (Opsional)</label>
                        <div id="cp-list" class="space-y-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="contact_persons[0][nama]" class="border rounded p-2" placeholder="Nama">
                                <input type="text" name="contact_persons[0][no_hp]" class="border rounded p-2" placeholder="No HP">
                            </div>
                        </div>
                        <button type="button" onclick="addCP()" class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">+ Tambah Contact Person</button>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Semua Detail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Dynamic add Image Input
        let imageIndex = 1;
        function addImageInput() {
            const container = document.getElementById('image-list');
            const div = document.createElement('div');
            div.className = 'flex items-center gap-3 mt-2';
            div.innerHTML = `
                <input type="file" name="images[]" accept="image/*" class="flex-1 border rounded p-2">
                <div class="flex items-center gap-2">
                    <input type="radio" name="main_image" value="${imageIndex}" id="main_${imageIndex}">
                    <label for="main_${imageIndex}" class="text-sm">Utama</label>
                </div>
                <button type="button" onclick="removeImageInput(this)" class="px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">×</button>
            `;
            container.appendChild(div);
            imageIndex++;
        }
        function removeImageInput(btn) {
            btn.parentElement.remove();
        }
        // Dynamic add Point of Interest
        function addPOI() {
            const container = document.getElementById('poi-list');
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-3 mt-2';
            wrapper.innerHTML = `
                <input type="text" name="points_of_interest[]" class="flex-1 border rounded p-2" placeholder="Contoh: Dekat dengan mall, sekolah, rumah sakit">
                <button type="button" onclick="removePOI(this)" class="px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">×</button>
            `;
            container.appendChild(wrapper);
        }
        function removePOI(btn) {
            btn.parentElement.remove();
        }
        // Dynamic add Contact Person
        let cpIndex = 1;
        function addCP() {
            const container = document.getElementById('cp-list');
            const div = document.createElement('div');
            div.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mt-2';
            div.innerHTML = `
                <input type="text" name="contact_persons[${cpIndex}][nama]" class="border rounded p-2" placeholder="Nama">
                <input type="text" name="contact_persons[${cpIndex}][no_hp]" class="border rounded p-2" placeholder="No HP">
                <button type="button" onclick="removeCP(this)" class="px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">×</button>
            `;
            container.appendChild(div);
            cpIndex++;
        }
        function removeCP(btn) {
            btn.parentElement.parentElement.remove();
        }
    </script>
</x-app-layout>
