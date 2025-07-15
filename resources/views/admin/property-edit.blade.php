<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Properti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .form-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 24px;
            margin-bottom: 24px;
        }
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .required::after {
            content: "*";
            color: #ef4444;
            margin-left: 4px;
        }
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 12px;
            margin-top: 8px;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
        }
        .checkbox-item:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }
        .checkbox-item input[type="checkbox"] {
            margin-right: 8px;
            width: 16px;
            height: 16px;
            accent-color: #3b82f6;
        }
        .checkbox-item input[type="checkbox"]:checked + label {
            color: #3b82f6;
            font-weight: 600;
        }
        .checkbox-item:has(input[type="checkbox"]:checked) {
            border-color: #3b82f6;
            background: #eff6ff;
        }
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
        }
        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .help-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 16px;
            height: 16px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
            margin-left: 8px;
            cursor: help;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="border-b border-gray-100 sticky top-0 z-10" style="background: linear-gradient(to right, #3BA798, #ffffff);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-12 w-auto mr-4" style="max-height:48px;">
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-green-600 text-green-700 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                Admin Dashboard
                            </a>
                            <a href="{{ route('admin.lelang.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">
                                Kelola Lelang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-2xl mx-auto mt-20 relative z-10">
        <h1 class="text-2xl font-bold mb-4">Edit Properti</h1>
        <a href="{{ url()->previous() }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded mb-6">Kembali</a>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Informasi Dasar -->
            <div class="form-section">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Informasi Dasar</h2>
                <div class="mb-4">
                    <label for="kode_aset" class="form-label required">Kode Aset</label>
                    <input type="text" name="kode_aset" id="kode_aset" class="form-input" value="{{ old('kode_aset', $property->kode_aset) }}" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label required">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-input" rows="3" required>{{ old('alamat', $property->alamat) }}</textarea>
                </div>
            </div>
            <!-- Spesifikasi Properti -->
            <div class="form-section">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Spesifikasi Properti</h2>
                <div class="grid-2">
                    <div class="mb-4">
                        <label for="luas_tanah" class="form-label required">Luas Tanah (M²)</label>
                        <input type="number" name="luas_tanah" id="luas_tanah" class="form-input" value="{{ old('luas_tanah', $property->luas_tanah) }}" min="0" step="0.01" required>
                    </div>
                    <div class="mb-4">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan (M²)</label>
                        <input type="number" name="luas_bangunan" id="luas_bangunan" class="form-input" value="{{ old('luas_bangunan', $property->luas_bangunan) }}" min="0" step="0.01">
                    </div>
                </div>
                <div class="grid-2">
                    <div class="mb-4">
                        <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
                        <select name="kamar_tidur" id="kamar_tidur" class="form-input">
                            <option value="">Pilih...</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('kamar_tidur', $property->kamar_tidur) == $i ? 'selected' : '' }}>{{ $i == 5 ? '5+' : $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="kamar_mandi" class="form-label">Jumlah Kamar Mandi</label>
                        <select name="kamar_mandi" id="kamar_mandi" class="form-input">
                            <option value="">Pilih...</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('kamar_mandi', $property->kamar_mandi) == $i ? 'selected' : '' }}>{{ $i == 5 ? '5+' : $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="grid-2">
                    <div class="mb-4">
                        <label for="listrik" class="form-label">Daya Listrik</label>
                        <select name="listrik" id="listrik" class="form-input">
                            <option value="">Pilih...</option>
                            @foreach (["450 VA","900 VA","1300 VA","2200 VA","3500 VA","4400 VA","5500 VA"] as $listrik)
                                <option value="{{ $listrik }}" {{ old('listrik', $property->listrik) == $listrik ? 'selected' : '' }}>{{ $listrik }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="air" class="form-label">Sumber Air</label>
                        <select name="air" id="air" class="form-input">
                            <option value="">Pilih...</option>
                            @foreach (["PDAM","Sumur Bor","Sumur Gali","Air Tanah"] as $air)
                                <option value="{{ $air }}" {{ old('air', $property->air) == $air ? 'selected' : '' }}>{{ $air }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Kondisi Properti -->
            <div class="form-section">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">
                    Kondisi Properti
                    <span class="help-icon" title="L: Layak, K: Kosong, AP: Ada Penghuni, SH: Sertifikat Hak, AJB: Akta Jual Beli, TK: Tidak Kosong, TP: Tidak Pasti, BR: Bermasalah">?</span>
                </h2>
                <p class="text-sm text-gray-600 mb-6">Pilih kondisi yang sesuai dengan properti (dapat memilih lebih dari satu)</p>
                <div class="checkbox-group">
                    @php
                        $kondisiArr = old('kondisi', explode('/', $property->kondisi));
                        $kondisiOptions = [
                            'L' => 'L',
                            'K' => 'K',
                            'AP' => 'AP',
                            'SH' => 'SH',
                            'AJB' => 'AJB',
                            'TK' => 'TK',
                            'TP' => 'TP',
                            'BR' => 'BR',
                        ];
                    @endphp
                    @foreach ($kondisiOptions as $val => $label)
                        <div class="checkbox-item">
                            <input type="checkbox" name="kondisi[]" value="{{ $val }}" id="kondisi_{{ $val }}" {{ in_array($val, $kondisiArr) ? 'checked' : '' }}>
                            <label for="kondisi_{{ $val }}">{{ $label }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Kategori Lot -->
            <div class="form-section">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Kategori Lot</h2>
                <div class="mb-4">
                    <label for="kategori_lot" class="form-label required">Kategori Lot</label>
                    <select name="kategori_lot" id="kategori_lot" class="form-input" required>
                        <option value="">Pilih Kategori</option>
                        <option value="gudang" {{ old('kategori_lot', $property->kategori_lot) == 'gudang' ? 'selected' : '' }}>Gudang</option>
                        <option value="ruko" {{ old('kategori_lot', $property->kategori_lot) == 'ruko' ? 'selected' : '' }}>Ruko</option>
                        <option value="rumah_tinggal" {{ old('kategori_lot', $property->kategori_lot) == 'rumah_tinggal' ? 'selected' : '' }}>Rumah Tinggal</option>
                        <option value="tanah_kebun" {{ old('kategori_lot', $property->kategori_lot) == 'tanah_kebun' ? 'selected' : '' }}>Tanah Kebun</option>
                        <option value="tanah_kosong" {{ old('kategori_lot', $property->kategori_lot) == 'tanah_kosong' ? 'selected' : '' }}>Tanah Kosong</option>
                    </select>
                    @error('kategori_lot')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Gambar Properti -->
            <div class="form-section">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Gambar Properti</h3>
                <div id="image-list" class="space-y-3">
                    @foreach($property->images as $i => $img)
                        <div class="image-input-group">
                            <img src="{{ asset('storage/'.$img->media_url) }}" width="120" class="rounded shadow">
                            <label class="radio-group ml-4">
                                <input type="radio" name="main_image" value="{{ $i }}" {{ $img->is_main ? 'checked' : '' }}>
                                <span>Gambar Utama</span>
                            </label>
                            <label class="ml-4">
                                <input type="checkbox" name="delete_images[]" value="{{ $img->id }}"> Hapus
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="image-input-group mt-3">
                    <input type="file" name="images[]" accept="image/*" class="flex-1">
                    <div class="radio-group">
                        <input type="radio" name="main_image" value="new">
                        <label>Gambar Utama Baru</label>
                    </div>
                </div>
                <button type="button" onclick="addImageInput()" class="btn-secondary mt-2">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Gambar
                </button>
                <p class="upload-hint">Pilih salah satu gambar sebagai gambar utama yang akan ditampilkan</p>
            </div>
            <!-- Jadwal Lelang -->
            <div class="form-section">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Jadwal Lelang</h3>
                <div class="grid-2 mb-4">
                    <div>
                        <label for="tanggal_lelang" class="form-label">Tanggal Lelang</label>
                        <input type="date" name="tanggal_lelang" id="tanggal_lelang" class="form-input" value="{{ old('tanggal_lelang', optional($property->lelangSchedule)->tanggal) }}">
                    </div>
                    <div>
                        <label for="lokasi_lelang" class="form-label">Lokasi Lelang</label>
                        <input type="text" name="lokasi_lelang" id="lokasi_lelang" class="form-input" value="{{ old('lokasi_lelang', optional($property->lelangSchedule)->lokasi) }}" placeholder="Contoh: Kantor Lelang Jakarta">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="limit_lelang" class="form-label">Limit Lelang</label>
                    <input type="number" name="limit_lelang" id="limit_lelang" class="form-input" min="0" step="1" value="{{ old('limit_lelang', optional($property->lelangSchedule)->limit_lelang) }}" oninput="formatRupiahPreview2()">
                    <p class="upload-hint">Masukkan limit lelang (harga final lelang)</p>
                    <div id="limit_lelang_preview" class="text-yellow-600 font-bold mt-1" style="font-size:1.3em;"></div>
                </div>
            </div>
            <!-- Point of Interest -->
            <div class="form-section">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Point of Interest</h3>
                <div id="poi-list" class="space-y-3">
                    @foreach($property->pointsOfInterest as $poi)
                        <div class="dynamic-item flex items-center gap-3">
                            <input type="text" name="points_of_interest[]" class="form-input flex-1" value="{{ $poi->poin }}">
                            <input type="checkbox" name="delete_points[]" value="{{ $poi->id }}"> Hapus
                        </div>
                    @endforeach
                    <div class="dynamic-item">
                        <input type="text" name="points_of_interest[]" class="form-input" placeholder="Tambah POI baru">
                    </div>
                </div>
                <button type="button" onclick="addPOI()" class="btn-secondary mt-2">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Point of Interest
                </button>
            </div>
            <!-- Contact Person -->
            <div class="form-section">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Contact Person</h3>
                <div id="cp-list" class="space-y-3">
                    @foreach($property->contactPersons as $i => $cp)
                        <div class="dynamic-item contact-grid">
                            <div>
                                <label class="form-label">Nama</label>
                                <input type="text" name="contact_persons[{{ $cp->id }}][nama]" class="form-input" value="{{ $cp->nama }}">
                            </div>
                            <div>
                                <label class="form-label">No HP</label>
                                <input type="text" name="contact_persons[{{ $cp->id }}][no_hp]" class="form-input" value="{{ $cp->no_hp }}">
                            </div>
                            <input type="checkbox" name="delete_contacts[]" value="{{ $cp->id }}"> Hapus
                        </div>
                    @endforeach
                    <div class="dynamic-item contact-grid">
                        <div>
                            <label class="form-label">Nama</label>
                            <input type="text" name="contact_persons[new][nama]" class="form-input" placeholder="Nama baru">
                        </div>
                        <div>
                            <label class="form-label">No HP</label>
                            <input type="text" name="contact_persons[new][no_hp]" class="form-input" placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                </div>
                <button type="button" onclick="addCP()" class="btn-secondary mt-2">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Contact Person
                </button>
            </div>
            <!-- Action Buttons -->
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    <script>
        // Dynamic add Image Input
        let imageIndex = {{ count($property->images) }};
        function addImageInput() {
            const container = document.getElementById('image-list');
            const div = document.createElement('div');
            div.className = 'image-input-group';
            div.innerHTML = `
                <input type="file" name="images[]" accept="image/*" class="flex-1">
                <div class="radio-group">
                    <input type="radio" name="main_image" value="new${imageIndex}" id="main_new${imageIndex}">
                    <label for="main_new${imageIndex}">Gambar Utama Baru</label>
                </div>
                <button type="button" onclick="removeImageInput(this)" class="btn-danger">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
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
            wrapper.className = 'dynamic-item flex items-center gap-3';
            wrapper.innerHTML = `
                <input type="text" name="points_of_interest[]" class="form-input flex-1" placeholder="Tambah POI baru">
                <button type="button" onclick="removePOI(this)" class="btn-danger">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            container.appendChild(wrapper);
        }
        function removePOI(btn) {
            btn.parentElement.parentElement.remove();
        }
        // Dynamic add Contact Person
        let cpIndex = 1;
        function addCP() {
            const container = document.getElementById('cp-list');
            const div = document.createElement('div');
            div.className = 'dynamic-item contact-grid';
            div.innerHTML = `
                <div>
                    <label class="form-label">Nama</label>
                    <input type="text" name="contact_persons[new${cpIndex}][nama]" class="form-input" placeholder="Nama baru">
                </div>
                <div>
                    <label class="form-label">No HP</label>
                    <input type="text" name="contact_persons[new${cpIndex}][no_hp]" class="form-input" placeholder="08xxxxxxxxxx">
                </div>
                <button type="button" onclick="removeCP(this)" class="btn-danger">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            container.appendChild(div);
            cpIndex++;
        }
        function removeCP(btn) {
            btn.parentElement.parentElement.remove();
        }
        // Format currency input (preview only)
        function formatRupiahPreview2() {
            const limit = document.getElementById('limit_lelang');
            const limitPreview = document.getElementById('limit_lelang_preview');
            let vLimit = limit.value;
            limitPreview.textContent = vLimit ? 'Rp ' + Number(vLimit.replace(/[^\d]/g, '')).toLocaleString('id-ID')+',-' : '';
        }
        window.addEventListener('DOMContentLoaded', formatRupiahPreview2);
    </script>
</body>
</html>
