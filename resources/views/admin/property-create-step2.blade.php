<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Properti - Step 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body, p, span, label, td, th, input, button, a, div {
            font-family: 'Open Sans', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .adlam-heading {
            font-family: 'ADLaM Display', cursive !important;
        }
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
        body {
            min-height: 100vh;
            position: relative;
            padding-bottom: 200px;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;"></div>
        <nav class="border-b border-gray-100 sticky top-0 z-10" style="background: linear-gradient(135deg, #0f766e 0%, #06b6d4 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-12 w-auto mr-4 cursor-pointer hover:opacity-80 transition-opacity" style="max-height:48px;">
                    </a>
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:border-white hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                Admin Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Media Properti</h3>

                    <div id="image-list" class="space-y-3">
                        <div class="image-input-group">
                            <input type="file" name="images[]" accept="image/*,video/*" class="flex-1" onchange="validateFileSize(this)">
                            <div class="radio-group">
                                <input type="radio" name="main_image" value="0" id="main_0" checked>
                                <label for="main_0">Media Utama</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="addImageInput()" class="btn-secondary">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Media
                    </button>
                    <p class="upload-hint">Dapat mengupload gambar (.jpg, .jpeg, .png, .gif) atau video (.mp4, .mov, .avi). Maksimal 10MB per file. Pilih salah satu media sebagai media utama yang akan ditampilkan (Gambar atau Video)</p>
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

                    <div class="mb-4">
                        <label for="limit_lelang" class="form-label">Limit Lelang</label>
                        <input type="number" name="limit_lelang" id="limit_lelang" class="form-input" min="0" step="1" placeholder="Contoh: 700000000" oninput="formatRupiahPreview2()">
                        <p class="upload-hint">Masukkan limit lelang (harga final lelang)</p>
                        <div id="limit_lelang_preview" class="text-yellow-600 font-bold mt-1" style="font-size:1.3em;"></div>
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
        // File size validation (10MB = 10 * 1024 * 1024 bytes)
        const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB in bytes

        function validateFileSize(fileInput) {
            const file = fileInput.files[0];
            if (file && file.size > MAX_FILE_SIZE) {
                alert('Ukuran file terlalu besar! Maksimal 10MB per file.');
                fileInput.value = ''; // Clear the input
                return false;
            }
            return true;
        }

        // Add event listeners to existing file inputs
        document.addEventListener('DOMContentLoaded', function() {
            const existingInputs = document.querySelectorAll('input[type="file"][name="images[]"]');
            existingInputs.forEach(input => {
                input.addEventListener('change', function() {
                    validateFileSize(this);
                });
            });
        });

        // Dynamic add Image Input
        let imageIndex = 1;
        function addImageInput() {
            const container = document.getElementById('image-list');
            const div = document.createElement('div');
            div.className = 'image-input-group';
            div.innerHTML = `
                <input type="file" name="images[]" accept="image/*,video/*" class="flex-1" onchange="validateFileSize(this)">
                <div class="radio-group">
                    <input type="radio" name="main_image" value="${imageIndex}" id="main_${imageIndex}">
                    <label for="main_${imageIndex}">Media Utama</label>
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
            const limit = document.getElementById('limit_lelang');
            const limitPreview = document.getElementById('limit_lelang_preview');
            let vLimit = limit.value;
            limitPreview.textContent = vLimit ? 'Rp ' + Number(vLimit.replace(/[^\d]/g, '')).toLocaleString('id-ID')+',-' : '';
        }
        window.addEventListener('DOMContentLoaded', formatRupiahPreview2);
    </script>
    <footer class="bg-gray-900 text-gray-200 pt-10 pb-6 mt-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pb-8">
                <div>
                    <h2 class="text-xl font-bold mb-2">Gudang Properti Jambi</h2>
                    <p class="text-sm">Platform pencarian dan informasi lelang properti terbaik untuk wilayah Indonesia.</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold mb-2">Kontak</h2>
                    <p class="text-sm">Email: jambijuaro2024@gmail.com</p>
                    <p class="text-sm">No WA: 0818145686</p>
                </div>
            </div>
            <hr class="border-gray-700">
            <p class="text-center text-xs text-gray-500 pt-4">© 2025 Katalog Lelang Properti. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>
