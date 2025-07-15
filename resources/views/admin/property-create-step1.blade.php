<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Properti - Step 1</title>
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
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;"></div>
    <!-- Header Sticky -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen py-8" style="position:relative;z-index:1;">
        <div class="max-w-4xl mx-auto px-4">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.properties.storeStep1') }}" method="POST">
                @csrf
                <!-- Informasi Dasar -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Informasi Dasar</h2>

                    <div class="mb-4">
                        <label for="kode_aset" class="form-label required">Kode Aset</label>
                        <input type="text" name="kode_aset" id="kode_aset" class="form-input" placeholder="Masukkan kode aset" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label required">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-input" rows="3" placeholder="Masukkan alamat lengkap properti" required></textarea>
                    </div>
                </div>

                <!-- Spesifikasi Properti -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Spesifikasi Properti</h2>

                    <div class="grid-2">
                        <div class="mb-4">
                            <label for="luas_tanah" class="form-label required">Luas Tanah (M²)</label>
                            <input type="number" name="luas_tanah" id="luas_tanah" class="form-input" placeholder="0" required min="0" step="0.01">
                        </div>
                        <div class="mb-4">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan (M²)</label>
                            <input type="number" name="luas_bangunan" id="luas_bangunan" class="form-input" placeholder="0" min="0" step="0.01">
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="mb-4">
                            <label for="kamar_tidur" class="form-label">Jumlah Kamar Tidur</label>
                            <select name="kamar_tidur" id="kamar_tidur" class="form-input">
                                <option value="">Pilih...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="kamar_mandi" class="form-label">Jumlah Kamar Mandi</label>
                            <select name="kamar_mandi" id="kamar_mandi" class="form-input">
                                <option value="">Pilih...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="mb-4">
                            <label for="listrik" class="form-label">Daya Listrik</label>
                            <select name="listrik" id="listrik" class="form-input">
                                <option value="">Pilih...</option>
                                <option value="450 VA">450 VA</option>
                                <option value="900 VA">900 VA</option>
                                <option value="1300 VA">1300 VA</option>
                                <option value="2200 VA">2200 VA</option>
                                <option value="3500 VA">3500 VA</option>
                                <option value="4400 VA">4400 VA</option>
                                <option value="5500 VA">5500 VA</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="air" class="form-label">Sumber Air</label>
                            <select name="air" id="air" class="form-input">
                                <option value="">Pilih...</option>
                                <option value="PDAM">PDAM</option>
                                <option value="Sumur Bor">Sumur Bor</option>
                                <option value="Sumur Gali">Sumur Gali</option>
                                <option value="Air Tanah">Air Tanah</option>
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

                    <div class="grid grid-cols-4 gap-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="L" id="kondisi_l" class="mr-2">
                            <label for="kondisi_l">L</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="K" id="kondisi_k" class="mr-2">
                            <label for="kondisi_k">K</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="AP" id="kondisi_ap" class="mr-2">
                            <label for="kondisi_ap">AP</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="SH" id="kondisi_sh" class="mr-2">
                            <label for="kondisi_sh">SH</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="AJB" id="kondisi_ajb" class="mr-2">
                            <label for="kondisi_ajb">AJB</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="TK" id="kondisi_tk" class="mr-2">
                            <label for="kondisi_tk">TK</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="TP" id="kondisi_tp" class="mr-2">
                            <label for="kondisi_tp">TP</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="kondisi[]" value="BR" id="kondisi_br" class="mr-2">
                            <label for="kondisi_br">BR</label>
                        </div>
                    </div>
                </div>

                <!-- Kategori Lot & Status Tanah -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Kategori Lot</h2>
                    <div class="mb-4">
                        <label for="kategori_lot" class="form-label required">Kategori Lot</label>
                        <select name="kategori_lot" id="kategori_lot" class="form-input" required>
                            <option value="">Pilih Kategori</option>
                            <option value="gudang">Gudang</option>
                            <option value="ruko">Ruko</option>
                            <option value="rumah_tinggal">Rumah Tinggal</option>
                            <option value="tanah_kebun">Tanah Kebun</option>
                            <option value="tanah_kosong">Tanah Kosong</option>
                        </select>
                        @error('kategori_lot')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">
                        Lanjut ke Step 2
                        <svg class="w-4 h-4 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
