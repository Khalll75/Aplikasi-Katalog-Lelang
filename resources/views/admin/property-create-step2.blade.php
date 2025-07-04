<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Properti - Step 2</title>
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
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            border: 1px solid #d1d5db;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 13px;
        }
        .btn-secondary:hover {
            background: #e5e7eb;
            border-color: #9ca3af;
        }
        .btn-danger {
            background: #fef2f2;
            color: #dc2626;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 500;
            border: 1px solid #fecaca;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 13px;
        }
        .btn-danger:hover {
            background: #fee2e2;
            border-color: #f87171;
        }
        .image-input-group {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            margin-bottom: 12px;
            transition: all 0.2s ease;
        }
        .image-input-group:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }
        .image-input-group input[type="file"] {
            flex: 1;
            border: none;
            padding: 0;
            background: none;
        }
        .radio-group {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .radio-group:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }
        .radio-group:has(input[type="radio"]:checked) {
            border-color: #3b82f6;
            background: #eff6ff;
        }
        .radio-group input[type="radio"] {
            margin: 0;
            accent-color: #3b82f6;
        }
        .radio-group label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 12px;
            align-items: end;
        }
        @media (max-width: 768px) {
            .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
        .property-title {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            margin-bottom: 24px;
        }
        .upload-hint {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }
        .dynamic-item {
            background: #f9fafb;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            margin-bottom: 12px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;"></div>
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-10" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <svg class="block h-9 w-auto text-green-700" fill="none" viewBox="0 0 24 24"><path d="M3 12L12 3L21 12" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 10V21H19V10" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">
                            Admin Dashboard
                        </a>
                    </div>
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen"
                                @keydown.escape="dropdownOpen = false"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150"
                                type="button">
                            <div>{{ Auth::user()->name ?? 'Admin User' }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                     :class="{ 'rotate-180': dropdownOpen }"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <div x-show="dropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click.away="dropdownOpen = false"
                             class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50"
                             style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </a>
                            <hr class="my-1 border-gray-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150 ease-in-out">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div id="mobile-menu" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">Admin Dashboard</a>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen py-8" style="position:relative;z-index:1;">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('admin.properties.storeStep2', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Upload Gambar -->
                <div class="form-section">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Gambar Properti</h3>

                    <div id="image-list" class="space-y-3">
                        <div class="image-input-group">
                            <input type="file" name="images[]" accept="image/*" class="flex-1">
                            <div class="radio-group">
                                <input type="radio" name="main_image" value="0" id="main_0" checked>
                                <label for="main_0">Gambar Utama</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="addImageInput()" class="btn-secondary">
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
                    <p class="text-sm text-gray-600 mb-6">Informasi lelang bersifat opsional</p>

                    <div class="grid-2 mb-4">
                        <div>
                            <label for="tanggal_lelang" class="form-label">Tanggal Lelang</label>
                            <input type="date" name="tanggal_lelang" id="tanggal_lelang" class="form-input">
                        </div>
                        <div>
                            <label for="lokasi_lelang" class="form-label">Lokasi Lelang</label>
                            <input type="text" name="lokasi_lelang" id="lokasi_lelang" class="form-input" placeholder="Contoh: Kantor Lelang Jakarta">
                        </div>
                    </div>

                    <div class="grid-2 mb-4">
                        <div>
                            <label for="harga_limit_awal" class="form-label">Harga Limit Sebelum</label>
                            <input type="number" name="harga_limit_awal" id="harga_limit_awal" class="form-input" min="0" step="1" placeholder="Contoh: 900000000" oninput="formatRupiahPreview2()">
                            <p class="upload-hint">Masukkan harga limit sebelum (akan dicoret)</p>
                            <div id="harga_limit_awal_preview" class="text-gray-500 font-semibold mt-1 line-through"></div>
                        </div>
                    <div>
                            <label for="harga_limit_akhir" class="form-label">Harga Limit Setelah</label>
                            <input type="number" name="harga_limit_akhir" id="harga_limit_akhir" class="form-input" min="0" step="1" placeholder="Contoh: 700000000" oninput="formatRupiahPreview2()">
                            <p class="upload-hint">Masukkan harga limit setelah (harga final lelang)</p>
                            <div id="harga_limit_akhir_preview" class="text-yellow-600 font-bold mt-1" style="font-size:1.3em;"></div>
                        </div>
                    </div>
                </div>

                <!-- Point of Interest -->
                <div class="form-section">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Point of Interest</h3>
                    <p class="text-sm text-gray-600 mb-6">Tambahkan lokasi menarik di sekitar properti</p>

                    <div id="poi-list" class="space-y-3">
                        <div class="dynamic-item">
                            <input type="text" name="points_of_interest[]" class="form-input" placeholder="Contoh: Dekat dengan mall, sekolah, rumah sakit">
                        </div>
                    </div>

                    <button type="button" onclick="addPOI()" class="btn-secondary">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Point of Interest
                    </button>
                </div>

                <!-- Contact Person -->
                <div class="form-section">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Contact Person</h3>
                    <p class="text-sm text-gray-600 mb-6">Tambahkan kontak yang dapat dihubungi</p>

                    <div id="cp-list" class="space-y-3">
                        <div class="dynamic-item">
                            <div class="contact-grid">
                                <div>
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="contact_persons[0][nama]" class="form-input" placeholder="Nama lengkap">
                                </div>
                                <div>
                                    <label class="form-label">No HP</label>
                                    <input type="text" name="contact_persons[0][no_hp]" class="form-input" placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="addCP()" class="btn-secondary">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Contact Person
                    </button>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Semua Detail
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Dynamic add Image Input
        let imageIndex = 1;
        function addImageInput() {
            const container = document.getElementById('image-list');
            const div = document.createElement('div');
            div.className = 'image-input-group';
            div.innerHTML = `
                <input type="file" name="images[]" accept="image/*" class="flex-1">
                <div class="radio-group">
                    <input type="radio" name="main_image" value="${imageIndex}" id="main_${imageIndex}">
                    <label for="main_${imageIndex}">Gambar Utama</label>
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
            wrapper.className = 'dynamic-item';
            wrapper.innerHTML = `
                <div class="flex items-center gap-3">
                    <input type="text" name="points_of_interest[]" class="form-input flex-1" placeholder="Contoh: Dekat dengan mall, sekolah, rumah sakit">
                    <button type="button" onclick="removePOI(this)" class="btn-danger">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
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
            div.className = 'dynamic-item';
            div.innerHTML = `
                <div class="contact-grid">
                    <div>
                        <label class="form-label">Nama</label>
                        <input type="text" name="contact_persons[${cpIndex}][nama]" class="form-input" placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label class="form-label">No HP</label>
                        <input type="text" name="contact_persons[${cpIndex}][no_hp]" class="form-input" placeholder="08xxxxxxxxxx">
                    </div>
                    <button type="button" onclick="removeCP(this)" class="btn-danger">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;
            container.appendChild(div);
            cpIndex++;
        }

        function removeCP(btn) {
            btn.parentElement.parentElement.remove();
        }

        // Format currency input (preview only)
        function formatRupiahPreview2() {
            const awal = document.getElementById('harga_limit_awal');
            const akhir = document.getElementById('harga_limit_akhir');
            const awalPreview = document.getElementById('harga_limit_awal_preview');
            const akhirPreview = document.getElementById('harga_limit_akhir_preview');
            let vAwal = awal.value;
            let vAkhir = akhir.value;
            awalPreview.textContent = vAwal ? 'Rp ' + Number(vAwal.replace(/[^\d]/g, '')).toLocaleString('id-ID') : '';
            akhirPreview.textContent = vAkhir ? 'Rp ' + Number(vAkhir.replace(/[^\d]/g, '')).toLocaleString('id-ID')+',-' : '';
        }
        window.addEventListener('DOMContentLoaded', formatRupiahPreview2);
    </script>
</body>
</html>
