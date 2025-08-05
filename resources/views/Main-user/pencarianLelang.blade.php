<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing - Beranda</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Consistent styling with app layouts -->
    @if(file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            tailwind.config = {
                content: ["./**/*.{html,js,php,blade.php}"],
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Open Sans', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
        <style>
            * { box-sizing: border-box; }
            html { line-height: 1.5; font-size: 16px; }
            body { margin: 0; font-size: 14px; }
            @media (max-width: 640px) {
                html { font-size: 14px; }
                body { font-size: 13px; }
            }
        </style>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body, p, span, label, td, th, input, button, a, div {
            font-family: 'Open Sans', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .adlam-heading {
            font-family: 'ADLaM Display', cursive !important;
        }
        .filter-card {
            transition: all 0.3s ease;
        }
        .filter-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        .property-card {
            transition: all 0.3s ease;
        }
        .property-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }
        .property-card:hover .property-image {
            transform: scale(1.05);
        }
        .property-image {
            transition: transform 0.3s ease;
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }
        .button-hover {
            transition: all 0.3s ease;
        }
        .button-hover:hover {
            transform: translateY(-2px);
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        .gradient-border {
            background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c);
            padding: 2px;
            border-radius: 8px;
        }
        .gradient-border-inner {
            background: white;
            border-radius: 6px;
        }

        /* Mobile-specific styles */
        @media (max-width: 640px) {
            .property-card:hover {
                transform: none;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }
            .filter-card:hover {
                transform: none;
            }
        }

        /* Mobile filter transitions */
        .transition-transform {
            transition: transform 0.3s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800">
<!-- Header -->
<header class="bg-gradient-to-r from-red-900 to-red-800 text-white py-4 fixed top-0 left-0 w-full z-50 shadow-lg backdrop-blur-sm">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-12 w-auto mr-4" style="max-height:48px;">
            <a href="/" class="text-xl md:text-2xl font-bold hover:text-red-200 transition-colors tracking-wide flex items-center">
                <i class="fas fa-gavel mr-2"></i>
                <span class="hidden sm:inline">Beranda</span>
                <span class="sm:hidden">Home</span>
            </a>
        </div>
        <div class="flex items-center space-x-2 md:space-x-4">
            <!-- Desktop Button -->
            <button class="hidden sm:block bg-white text-red-900 px-6 py-2 rounded-full font-medium hover:bg-red-50 hover:shadow-lg transition-all duration-300 button-hover" onclick="document.getElementById('daftarModal').style.display='flex'">
                <i class="fas fa-user-plus mr-2"></i>
                Daftar
            </button>
            <!-- Mobile Button -->
            <button class="sm:hidden bg-white text-red-900 px-4 py-2 rounded-full font-medium hover:bg-red-50 transition-all duration-300" onclick="document.getElementById('daftarModal').style.display='flex'">>
                <i class="fas fa-user-plus"></i>
            </button>
            <!-- Mobile Menu Toggle -->
            <button class="sm:hidden text-white hover:text-red-200 p-2" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden sm:hidden bg-red-800 border-t border-red-700">
        <div class="container mx-auto px-4 py-4 space-y-3">
            <a href="/search" class="block text-white hover:text-red-200 py-2 border-b border-red-700 transition-colors">
                <i class="fas fa-search mr-3"></i>Cari Properti
            </a>
            <a href="/about" class="block text-white hover:text-red-200 py-2 border-b border-red-700 transition-colors">
                <i class="fas fa-info-circle mr-3"></i>Tentang Kami
            </a>
            <a href="/contact" class="block text-white hover:text-red-200 py-2 transition-colors">
                <i class="fas fa-phone mr-3"></i>Kontak
            </a>
        </div>
    </div>
</header>

<!-- Main Container -->
<div class="container mx-auto px-4 pt-28 pb-12">
    <!-- Page Title -->
    <div class="text-center mb-8 fade-in">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pencarian Lelang Properti</h1>
        <p class="text-gray-600">Temukan properti lelang terbaik sesuai kebutuhan Anda</p>
    </div>

    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('search') }}">
        <div class="w-full mb-8">

            <!-- Mobile Filters - Only show on mobile -->
            <div class="lg:hidden space-y-3 mb-6 max-w-6xl mx-auto">
                    <!-- Kategori Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <button type="button" onclick="toggleFilter('kategori')" class="w-full px-4 py-3 text-left text-sm font-medium text-gray-800 hover:bg-gray-50 flex items-center justify-between">
                            <span class="flex items-center">
                                <i class="fas fa-building mr-2 text-red-600"></i>
                                Kategori Lot
                            </span>
                            <i class="fas fa-chevron-down transition-transform" id="kategori-icon"></i>
                        </button>
                        <div id="kategori-content" class="hidden px-4 pb-3 space-y-2">
                            @foreach(['Gudang', 'Ruko', 'Rumah Tinggal', 'Tanah Kebun', 'Tanah Kosong'] as $label)
                                <label class="flex items-center p-2 rounded hover:bg-red-50 transition-colors cursor-pointer">
                                    <input type="radio" name="kategori_lot" value="{{ $label }}" class="mr-2 w-4 h-4 text-red-600 focus:ring-red-500"
                                        {{ request('kategori_lot') === $label ? 'checked' : '' }}>
                                    <span class="text-sm">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Harga Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <button type="button" onclick="toggleFilter('harga')" class="w-full px-4 py-3 text-left text-sm font-medium text-gray-800 hover:bg-gray-50 flex items-center justify-between">
                            <span class="flex items-center">
                                <i class="fas fa-money-bill-wave mr-2 text-green-600"></i>
                                Rentang Harga
                            </span>
                            <i class="fas fa-chevron-down transition-transform" id="harga-icon"></i>
                        </button>
                        <div id="harga-content" class="hidden px-4 pb-3">
                            <div class="grid grid-cols-2 gap-2">
                                <input type="text" name="harga_min" value="{{ request('harga_min') }}" placeholder="Min"
                                       class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-red-500 focus:outline-none">
                                <input type="text" name="harga_max" value="{{ request('harga_max') }}" placeholder="Max"
                                       class="border border-gray-300 rounded px-3 py-2 text-sm focus:border-red-500 focus:outline-none">
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Masukkan nilai dalam Rupiah</p>
                        </div>
                    </div>

                    <!-- Spesifikasi Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <button type="button" onclick="toggleFilter('spesifikasi')" class="w-full px-4 py-3 text-left text-sm font-medium text-gray-800 hover:bg-gray-50 flex items-center justify-between">
                            <span class="flex items-center">
                                <i class="fas fa-home mr-2 text-blue-600"></i>
                                Spesifikasi
                            </span>
                            <i class="fas fa-chevron-down transition-transform" id="spesifikasi-icon"></i>
                        </button>
                        <div id="spesifikasi-content" class="hidden px-4 pb-3 space-y-3">
                            <!-- Luas Tanah -->
                            <div>
                                <label class="text-xs font-medium text-gray-700 mb-1 flex items-center">
                                    <i class="fas fa-ruler-combined mr-1 text-green-500"></i>
                                    Luas Tanah (M²)
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="text" name="luas_tanah_min" value="{{ request('luas_tanah_min') }}" placeholder="Min"
                                           class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                    <input type="text" name="luas_tanah_max" value="{{ request('luas_tanah_max') }}" placeholder="Max"
                                           class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                </div>
                            </div>
                            <!-- Luas Bangunan -->
                            <div>
                                <label class="text-xs font-medium text-gray-700 mb-1 flex items-center">
                                    <i class="fas fa-building mr-1 text-purple-500"></i>
                                    Luas Bangunan (M²)
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="text" name="luas_bangunan_min" value="{{ request('luas_bangunan_min') }}" placeholder="Min"
                                           class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                    <input type="text" name="luas_bangunan_max" value="{{ request('luas_bangunan_max') }}" placeholder="Max"
                                           class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                </div>
                            </div>
                            <!-- Kamar -->
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="text-xs font-medium text-gray-700 mb-1 flex items-center">
                                        <i class="fas fa-bed mr-1 text-indigo-500"></i>
                                        K. Tidur
                                    </label>
                                    <select name="kamar_tidur" class="w-full border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:border-red-500">
                                        <option value="">-</option>
                                        <option value="1" {{ request('kamar_tidur') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('kamar_tidur') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('kamar_tidur') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('kamar_tidur') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('kamar_tidur') == '5' ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-700 mb-1 flex items-center">
                                        <i class="fas fa-bath mr-1 text-blue-500"></i>
                                        K. Mandi
                                    </label>
                                    <select name="kamar_mandi" class="w-full border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:border-red-500">
                                        <option value="">-</option>
                                        <option value="1" {{ request('kamar_mandi') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('kamar_mandi') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('kamar_mandi') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('kamar_mandi') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('kamar_mandi') == '5' ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi & Kondisi Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <button type="button" onclick="toggleFilter('lokasi')" class="w-full px-4 py-3 text-left text-sm font-medium text-gray-800 hover:bg-gray-50 flex items-center justify-between">
                            <span class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                                Lokasi & Kondisi
                            </span>
                            <i class="fas fa-chevron-down transition-transform" id="lokasi-icon"></i>
                        </button>
                        <div id="lokasi-content" class="hidden px-4 pb-3 space-y-3">
                            <!-- Lokasi -->
                            <div class="grid grid-cols-2 gap-2">
                                <input type="text" name="kota" value="{{ request('kota') }}" placeholder="Kota/Kabupaten"
                                       list="kota-list-mobile" id="kota-mobile" onchange="updateKecamatanMobile()"
                                       class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                <datalist id="kota-list-mobile">
                                    <option value="Kota Jambi">
                                    <option value="Kota Sungai Penuh">
                                    <option value="Kab. Batanghari">
                                    <option value="Kab. Bungo">
                                    <option value="Kab. Kerinci">
                                    <option value="Kab. Merangin">
                                    <option value="Kab. Muaro Jambi">
                                    <option value="Kab. Sarolangun">
                                    <option value="Kab. Tanjung Jabung Barat">
                                    <option value="Kab. Tanjung Jabung Timur">
                                    <option value="Kab. Tebo">
                                </datalist>
                                <input type="text" name="kecamatan" value="{{ request('kecamatan') }}" placeholder="Kecamatan"
                                       list="kecamatan-list-mobile" id="kecamatan-mobile"
                                       class="border border-gray-300 rounded px-2 py-1 text-sm focus:border-red-500">
                                <datalist id="kecamatan-list-mobile">
                                    <!-- Options will be populated by JavaScript -->
                                </datalist>
                            </div>
                            <!-- Kondisi -->
                            <div>
                                <label class="text-xs font-medium text-gray-700 mb-1 flex items-center">
                                    <i class="fas fa-clipboard-check mr-1 text-orange-600"></i>
                                    Kondisi
                                    <button type="button" onclick="openModal()" class="ml-2 w-5 h-5 bg-red-500 text-white text-xs rounded-full hover:bg-red-600">
                                        <i class="fas fa-question"></i>
                                    </button>
                                </label>
                                <div class="grid grid-cols-4 gap-1">
                                    @foreach(['L','K','AP','SH','AJB','TK','TP','BR'] as $kondisi)
                                        <label class="flex items-center p-1 rounded hover:bg-gray-50 cursor-pointer">
                                            <input type="checkbox" name="kondisi[]" value="{{ $kondisi }}"
                                                   {{ is_array(request('kondisi')) && in_array($kondisi, request('kondisi')) ? 'checked' : '' }}
                                                   class="mr-1 w-3 h-3 text-red-600 focus:ring-red-500 rounded">
                                            <span class="text-xs font-medium">{{ $kondisi }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="w-full">
                <!-- Search Bar and Buttons -->
                <div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 filter-card max-w-6xl mx-auto">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 md:gap-4">
                        <div class="flex-1 min-w-0 relative">
                            <i class="fas fa-search absolute left-3 md:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm md:text-base"></i>
                            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari berdasarkan kode aset, alamat, atau lokasi..."
                                   class="w-full border-2 border-gray-300 rounded-lg pl-10 md:pl-12 pr-3 md:pr-4 py-2 md:py-3 text-sm md:text-base input-focus focus:border-red-500 focus:outline-none">
                        </div>
                        <div class="flex flex-col sm:flex-row gap-2 md:gap-3">
                            <button type="submit" class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-800 px-4 md:px-6 py-2 md:py-3 rounded-lg font-medium hover:from-yellow-500 hover:to-yellow-600 transition-all duration-300 button-hover shadow-md text-sm md:text-base">
                                <i class="fas fa-search mr-1 md:mr-2"></i>
                                <span class="hidden sm:inline">Cari Lelang</span>
                                <span class="sm:hidden">Cari</span>
                            </button>
                            <a href="{{ route('search') }}" id="resetFilterBtn" class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-4 md:px-6 py-2 md:py-3 rounded-lg font-medium hover:from-gray-600 hover:to-gray-700 transition-all duration-300 button-hover shadow-md text-sm md:text-base text-center">
                                <i class="fas fa-redo mr-1 md:mr-2"></i>
                                <span class="hidden sm:inline">Reset Filter</span>
                                <span class="sm:hidden">Reset</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Desktop Filter Sections -->
                <div class="hidden lg:block">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6 max-w-6xl mx-auto">
                        <!-- Kategori Lot -->
                        <div class="gradient-border filter-card">
                            <div class="gradient-border-inner p-5">
                                <h3 class="font-semibold mb-4 text-gray-800 flex items-center">
                                    <i class="fas fa-building mr-2 text-red-600"></i>
                                    Kategori Lot Lelang
                                </h3>
                                <div class="space-y-3">
                                    @foreach(['Gudang', 'Ruko', 'Rumah Tinggal', 'Tanah Kebun', 'Tanah Kosong'] as $label)
                                        <label class="flex items-center p-2 rounded-lg hover:bg-red-50 transition-colors cursor-pointer">
                                            <input type="radio" name="kategori_lot" value="{{ $label }}" class="mr-3 w-4 h-4 text-red-600 focus:ring-red-500"
                                                {{ request('kategori_lot') === $label ? 'checked' : '' }}>
                                            <span class="text-sm font-medium">{{ $label }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm filter-card">
                            <h3 class="font-semibold mb-4 text-gray-800 flex items-center">
                                <i class="fas fa-money-bill-wave mr-2 text-green-600"></i>
                                Rentang Harga
                            </h3>
                            <div class="space-y-3">
                                <div class="grid grid-cols-[1fr_auto_1fr] gap-3 items-center">
                                    <input type="text" name="harga_min" value="{{ request('harga_min') }}" placeholder="Minimum"
                                           class="border border-gray-300 rounded-lg px-4 py-3 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
                                    <span class="text-gray-400 text-lg font-bold">—</span>
                                    <input type="text" name="harga_max" value="{{ request('harga_max') }}" placeholder="Maximum"
                                           class="border border-gray-300 rounded-lg px-4 py-3 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
                                </div>
                                <div class="text-xs text-gray-500 text-center">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Masukkan nilai dalam Rupiah
                                </div>
                            </div>
                        </div>
                    <!-- Spesifikasi Properti -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm filter-card">
                        <h3 class="font-semibold mb-5 text-gray-800 flex items-center">
                            <i class="fas fa-home mr-2 text-blue-600"></i>
                            Spesifikasi Properti
                        </h3>
                        <div class="space-y-5">
                            <!-- Luas Tanah -->
                            <div>
                                <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                    <i class="fas fa-ruler-combined mr-2 text-green-500"></i>
                                    Luas Tanah (M²)
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <input type="text" name="luas_tanah_min" value="{{ request('luas_tanah_min') }}" placeholder="Min"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm input-focus focus:border-red-500 focus:outline-none">
                                    <input type="text" name="luas_tanah_max" value="{{ request('luas_tanah_max') }}" placeholder="Max"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm input-focus focus:border-red-500 focus:outline-none">
                                </div>
                            </div>
                            <!-- Luas Bangunan -->
                            <div>
                                <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                    <i class="fas fa-building mr-2 text-purple-500"></i>
                                    Luas Bangunan (M²)
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <input type="text" name="luas_bangunan_min" value="{{ request('luas_bangunan_min') }}" placeholder="Min"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm input-focus focus:border-red-500 focus:outline-none">
                                    <input type="text" name="luas_bangunan_max" value="{{ request('luas_bangunan_max') }}" placeholder="Max"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm input-focus focus:border-red-500 focus:outline-none">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Jumlah Kamar Tidur -->
                                <div>
                                    <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                        <i class="fas fa-bed mr-2 text-indigo-500"></i>
                                        Kamar Tidur
                                    </label>
                                    <select name="kamar_tidur" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="1" {{ request('kamar_tidur') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('kamar_tidur') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('kamar_tidur') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('kamar_tidur') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('kamar_tidur') == '5' ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                                <!-- Daya Listrik -->
                                <div>
                                    <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                        <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                                        Daya Listrik
                                    </label>
                                    <select name="listrik" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="450 VA" {{ request('listrik') == '450 VA' ? 'selected' : '' }}>450 VA</option>
                                        <option value="900 VA" {{ request('listrik') == '900 VA' ? 'selected' : '' }}>900 VA</option>
                                        <option value="1200 VA" {{ request('listrik') == '1200 VA' ? 'selected' : '' }}>1200 VA</option>
                                        <option value="1300 VA" {{ request('listrik') == '1300 VA' ? 'selected' : '' }}>1300 VA</option>
                                        <option value="2200 VA" {{ request('listrik') == '2200 VA' ? 'selected' : '' }}>2200 VA</option>
                                        <option value="3500 VA" {{ request('listrik') == '3500 VA' ? 'selected' : '' }}>3500 VA</option>
                                        <option value="4400 VA" {{ request('listrik') == '4400 VA' ? 'selected' : '' }}>4400 VA</option>
                                        <option value="5500 VA" {{ request('listrik') == '5500 VA' ? 'selected' : '' }}>5500 VA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Jumlah Kamar Mandi -->
                                <div>
                                    <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                        <i class="fas fa-bath mr-2 text-blue-500"></i>
                                        Kamar Mandi
                                    </label>
                                    <select name="kamar_mandi" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="1" {{ request('kamar_mandi') == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('kamar_mandi') == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('kamar_mandi') == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('kamar_mandi') == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('kamar_mandi') == '5' ? 'selected' : '' }}>5+</option>
                                    </select>
                                </div>
                                <!-- Sumber Air -->
                                <div>
                                    <label class="flex text-sm font-medium text-gray-700 mb-2 items-center">
                                        <i class="fas fa-tint mr-2 text-cyan-500"></i>
                                        Sumber Air
                                    </label>
                                    <select name="air" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="PDAM" {{ request('air') == 'PDAM' ? 'selected' : '' }}>PDAM</option>
                                        <option value="Sumur" {{ request('air') == 'Sumur' ? 'selected' : '' }}>Sumur</option>
                                        <option value="Sumur Bor" {{ request('air') == 'Sumur Bor' ? 'selected' : '' }}>Sumur Bor</option>
                                        <option value="Sumur Gali" {{ request('air') == 'Sumur Gali' ? 'selected' : '' }}>Sumur Gali</option>
                                        <option value="PAM" {{ request('air') == 'PAM' ? 'selected' : '' }}>PAM</option>
                                        <option value="Sumur & PAM" {{ request('air') == 'Sumur & PAM' ? 'selected' : '' }}>Sumur & PAM</option>
                                        <option value="PDAM & Sumur Bor / Sumur Bor / PDAM" {{ request('air') == 'PDAM & Sumur Bor / Sumur Bor / PDAM' ? 'selected' : '' }}>PDAM & Sumur Bor / Sumur Bor / PDAM</option>
                                        <option value="Sumur Bor & PAM" {{ request('air') == 'Sumur Bor & PAM' ? 'selected' : '' }}>Sumur Bor & PAM</option>
                                        <option value="Sumur & PDAM" {{ request('air') == 'Sumur & PDAM' ? 'selected' : '' }}>Sumur & PDAM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi and Kondisi -->
                    <div class="space-y-6">
                        <!-- Lokasi -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm filter-card">
                            <h3 class="font-semibold mb-5 text-gray-800 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                                Lokasi
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Kota/Kabupaten -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten</label>
                                    <input type="text" name="kota" value="{{ request('kota') }}" placeholder="Pilih atau ketik kota/kabupaten"
                                           list="kota-list" id="kota-desktop" onchange="updateKecamatanDesktop()"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
                                    <datalist id="kota-list">
                                        <option value="Kota Jambi">
                                        <option value="Kota Sungai Penuh">
                                        <option value="Kab. Batanghari">
                                        <option value="Kab. Bungo">
                                        <option value="Kab. Kerinci">
                                        <option value="Kab. Merangin">
                                        <option value="Kab. Muaro Jambi">
                                        <option value="Kab. Sarolangun">
                                        <option value="Kab. Tanjung Jabung Barat">
                                        <option value="Kab. Tanjung Jabung Timur">
                                        <option value="Kab. Tebo">
                                    </datalist>
                                </div>
                                <!-- Kecamatan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                    <input type="text" name="kecamatan" value="{{ request('kecamatan') }}" placeholder="Pilih atau ketik kecamatan"
                                           list="kecamatan-list-desktop" id="kecamatan-desktop"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
                                    <datalist id="kecamatan-list-desktop">
                                        <!-- Options will be populated by JavaScript -->
                                    </datalist>
                                </div>
                            </div>
                        </div>

                        <!-- Kondisi -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm filter-card">
                            <h3 class="font-semibold mb-5 text-gray-800 flex items-center">
                                <i class="fas fa-clipboard-check mr-2 text-orange-600"></i>
                                Kondisi
                                <button type="button" id="conditionInfoBtn"
                                    class="ml-3 w-7 h-7 flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-bold rounded-full hover:from-red-600 hover:to-red-700 focus:outline-none transition-all duration-300 shadow-md button-hover"
                                    title="Info tentang kondisi">
                                    <i class="fas fa-question"></i>
                                </button>
                            </h3>
                            <div class="grid grid-cols-4 gap-y-3 gap-x-4 text-sm">
                                @foreach(['L','K','AP','SH','AJB','TK','TP','BR'] as $kondisi)
                                    <label class="flex items-center p-2 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                                        <input type="checkbox" name="kondisi[]" value="{{ $kondisi }}"
                                               {{ is_array(request('kondisi')) && in_array($kondisi, request('kondisi')) ? 'checked' : '' }}
                                               class="mr-2 w-4 h-4 text-red-600 focus:ring-red-500 rounded">
                                        <span class="font-medium">{{ $kondisi }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Results Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-list mr-2 text-blue-600"></i>
                Hasil Pencarian
            </h2>
            <div class="text-sm text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Menampilkan properti yang tersedia
            </div>
        </div>
    </div>

    <!-- Property Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-8 max-w-6xl mx-auto">
        @forelse($query as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="bg-white rounded-xl shadow-sm overflow-hidden property-card">
                <div class="w-full h-32 sm:h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center overflow-hidden">
                    @php
                        $mainImage = $property->images->where('is_main', true)->first() ?? $property->images->first();
                    @endphp
                    @if($mainImage)
                        <img src="{{ $mainImage->getUrl() }}" alt="{{ $property->nama }}" class="object-cover w-full h-full property-image">
                    @else
                        <div class="text-gray-400 text-center">
                            <i class="fas fa-image text-4xl mb-2"></i>
                            <p class="text-sm">No Image</p>
                        </div>
                    @endif
                </div>
                <div class="p-3 sm:p-5">
                    <h4 class="font-semibold text-gray-800 mb-2 line-clamp-2 text-sm sm:text-base">{{ $property->kode_aset }}</h4>
                    <p class="text-gray-600 text-xs sm:text-sm mb-2 sm:mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt mr-1 sm:mr-2 text-red-500"></i>
                        <span class="truncate">{{ $property->alamat }}</span>
                    </p>
                    <div class="bg-gradient-to-r from-red-50 to-red-100 p-2 sm:p-3 rounded-lg mb-2 sm:mb-3">
                        <p class="text-red-600 font-bold text-xs sm:text-sm">
                            @if($property->lelangSchedule)
                                <i class="fas fa-tag mr-1"></i>
                                Rp {{ number_format($property->lelangSchedule->limit_lelang, 0, ',', '.') }}
                            @else
                                <span class="text-gray-400">
                                    <i class="fas fa-clock mr-1"></i>
                                    Harga belum tersedia
                                </span>
                            @endif
                        </p>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 border-t pt-2 sm:pt-3">
                        <span class="flex items-center text-xs">
                            <i class="fas fa-bed mr-1"></i>
                            <span class="hidden sm:inline">{{ $property->kamar_tidur ?? '-' }} bed</span>
                            <span class="sm:hidden">{{ $property->kamar_tidur ?? '-' }}</span>
                        </span>
                        <span class="flex items-center text-xs">
                            <i class="fas fa-bath mr-1"></i>
                            <span class="hidden sm:inline">{{ $property->kamar_mandi ?? '-' }} bath</span>
                            <span class="sm:hidden">{{ $property->kamar_mandi ?? '-' }}</span>
                        </span>
                        <span class="flex items-center text-xs">
                            <i class="fas fa-ruler-combined mr-1"></i>
                            <span class="hidden sm:inline">{{ $property->luas_tanah ?? '-' }} m²</span>
                            <span class="sm:hidden">{{ $property->luas_tanah ?? '-' }}</span>
                        </span>
                        </span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-4 text-center py-16">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-search text-6xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada properti ditemukan</h3>
                <p class="text-gray-500">Coba ubah kriteria pencarian atau filter yang digunakan</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        <div class="mt-6">
            <style>
                .pagination-theme {
                    @apply flex items-center space-x-1;
                }
                .pagination-theme .active {
                    @apply bg-red-600 text-white font-bold;
                }
                .pagination-theme a, .pagination-theme span {
                    @apply bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-red-50 hover:text-red-600 transition;
                }
                .pagination-theme .disabled {
                    @apply opacity-50 cursor-not-allowed;
                }
            </style>
            {{ $query->withQueryString()->links('vendor.pagination.tailwind-custom') }}
        </div>
    </div>
</div>

<!-- Condition Info Modal -->
<div id="conditionModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="bg-red-900 text-white p-4 rounded-t-lg">
            <div class="flex justify-between items-center">
                <div class="text-center flex-1">
                    <h2 class="text-lg font-bold">Keterangan Kondisi Aset</h2>
                    <p class="text-sm opacity-90">Penjelasan Kode Kondisi Properti</p>
                </div>
                <button id="closeModal" class="text-white hover:text-gray-300 ml-4">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <!-- Modal Content -->
        <div class="p-6 space-y-6">
            <!-- 1. Cara Penjualan -->
            <div class="border-b border-gray-200 pb-4">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <span class="bg-yellow-400 text-gray-800 px-2 py-1 rounded text-sm mr-2">1</span>
                    Cara Penjualan
                </h3>
                <div class="grid grid-cols-1 gap-2 text-sm">
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">L</span>
                        <span class="text-gray-600">= Lelang</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">AJB</span>
                        <span class="text-gray-600">= Sukarela</span>
                    </div>
                </div>
            </div>
            <!-- 2. Ada tidaknya penghuni -->
            <div class="border-b border-gray-200 pb-4">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <span class="bg-yellow-400 text-gray-800 px-2 py-1 rounded text-sm mr-2">2</span>
                    Ada tidaknya penghuni
                </h3>
                <div class="grid grid-cols-1 gap-2 text-sm">
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">K</span>
                        <span class="text-gray-600">= Aset Kosong</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">TK</span>
                        <span class="text-gray-600">= Tidak Kosong</span>
                    </div>
                </div>
            </div>
            <!-- 3. Ada tidaknya penguasaan -->
            <div class="border-b border-gray-200 pb-4">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <span class="bg-yellow-400 text-gray-800 px-2 py-1 rounded text-sm mr-2">3</span>
                    Ada tidaknya penguasaan
                </h3>
                <div class="text-sm text-gray-600 mb-2">(perlawanan/penghadangan)</div>
                <div class="grid grid-cols-1 gap-2 text-sm">
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">AP</span>
                        <span class="text-gray-600">= Ada Perlawanan</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">TP</span>
                        <span class="text-gray-600">= Tanpa Perlawanan</span>
                    </div>
                </div>
            </div>
            <!-- 4. Kondisi Bangunan -->
            <div>
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <span class="bg-yellow-400 text-gray-800 px-2 py-1 rounded text-sm mr-2">4</span>
                    Kondisi Bangunan
                </h3>
                <div class="grid grid-cols-1 gap-2 text-sm">
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">SH</span>
                        <span class="text-gray-600">= Siap Huni</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">BR</span>
                        <span class="text-gray-600">= Butuh Renovasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
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

<!-- Modal: Daftar -->
<div id="daftarModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-red-900 text-white p-4 rounded-t-lg flex justify-between items-center">
            <h2 class="text-lg font-bold flex-1 text-center">Daftar</h2>
            <button onclick="document.getElementById('daftarModal').style.display='none'" class="text-white hover:text-gray-300 ml-4">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="daftarForm" class="p-6 space-y-4">
            <div>
                <label for="daftarName" class="block text-gray-700 font-semibold mb-1">Nama</label>
                <input type="text" id="daftarName" name="name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-300">
            </div>
            <div>
                <label for="daftarPhone" class="block text-gray-700 font-semibold mb-1">No. HP</label>
                <input type="tel" id="daftarPhone" name="phone" required pattern="[0-9]{10,15}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-300">
            </div>
            <div id="daftarSuccess" class="hidden text-green-600 font-semibold text-center py-2">Pendaftaran berhasil!</div>
            <button type="submit" class="w-full bg-red-800 text-white font-bold py-2 rounded-lg hover:bg-red-700 transition-all">Kirim</button>
        </form>
    </div>
</div>

<script>
    // Initialize page animations
    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in animation to cards
        const cards = document.querySelectorAll('.filter-card, .property-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('fade-in');
        });
    });

    // Reset Filter functionality with smooth animation
    document.getElementById('resetFilterBtn').addEventListener('click', function(e) {
        e.preventDefault();

        // Add loading state
        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Resetting...';

        setTimeout(() => {
            // Reset all form elements
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
                cb.closest('label').style.animation = 'fadeInUp 0.3s ease';
            });

            document.querySelectorAll('input[type="text"], input[type="search"]').forEach(input => {
                input.value = '';
                input.style.animation = 'fadeInUp 0.3s ease';
            });

            document.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
                select.style.animation = 'fadeInUp 0.3s ease';
            });

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.checked = false;
                radio.closest('label').style.animation = 'fadeInUp 0.3s ease';
            });

            // Restore button text
            this.innerHTML = '<i class="fas fa-redo mr-2"></i>Reset Filter';

            // Navigate to clean search page
            window.location.href = "{{ route('search') }}";
        }, 500);
    });

    // Enhanced Modal functionality
    const modal = document.getElementById('conditionModal');
    const openBtn = document.getElementById('conditionInfoBtn');
    const closeBtn = document.getElementById('closeModal');

    function openModal() {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        modal.style.animation = 'fadeInUp 0.3s ease';
    }

    function closeModal() {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Open modal
    openBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal();
    });

    // Close modal
    closeBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display !== 'none') {
            closeModal();
        }
    });

    // Enhanced form interactions
    document.querySelectorAll('input, select').forEach(element => {
        element.addEventListener('focus', function() {
            this.closest('.filter-card')?.classList.add('ring-2', 'ring-red-200');
        });

        element.addEventListener('blur', function() {
            this.closest('.filter-card')?.classList.remove('ring-2', 'ring-red-200');
        });
    });

    // Add smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add search input enhancement
    const searchInput = document.querySelector('input[name="q"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.paddingRight = '40px';
            } else {
                this.style.paddingRight = '16px';
            }
        });
    }

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-20px); }
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .property-card:hover .property-image {
            transform: scale(1.05);
        }

        .filter-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .filter-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    `;
    document.head.appendChild(style);

    // Daftar Modal Form Submission
    document.getElementById('daftarForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const name = document.getElementById('daftarName').value;
        const phone = document.getElementById('daftarPhone').value;
        const successDiv = document.getElementById('daftarSuccess');
        let errorDiv = document.getElementById('daftarError');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.id = 'daftarError';
            errorDiv.className = 'text-red-600 font-semibold text-center py-2';
            this.insertBefore(errorDiv, this.querySelector('button[type="submit"]'));
        }
        errorDiv.classList.add('hidden');
        successDiv.classList.add('hidden');
        try {
            const res = await fetch('/daftar-user', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, phone })
            });
            const data = await res.json();
            if (res.ok && data.success) {
                successDiv.textContent = data.message || 'Pendaftaran berhasil!';
                successDiv.classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById('daftarModal').style.display = 'none';
                    successDiv.classList.add('hidden');
                    document.getElementById('daftarForm').reset();
                }, 1500);
            } else {
                errorDiv.textContent = data.message || 'Terjadi kesalahan.';
                errorDiv.classList.remove('hidden');
            }
        } catch (err) {
            errorDiv.textContent = 'Gagal mengirim data. Coba lagi.';
            errorDiv.classList.remove('hidden');
        }
    });

    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.querySelector('[onclick="toggleMobileMenu()"] i');

        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    }

    // Mobile Filter Toggle
    function toggleMobileFilters() {
        const mobileFilters = document.getElementById('mobileFilters');
        const toggleIcon = document.getElementById('filterToggleIcon');

        if (mobileFilters.classList.contains('hidden')) {
            mobileFilters.classList.remove('hidden');
            toggleIcon.classList.remove('fa-chevron-down');
            toggleIcon.classList.add('fa-chevron-up');
        } else {
            mobileFilters.classList.add('hidden');
            toggleIcon.classList.remove('fa-chevron-up');
            toggleIcon.classList.add('fa-chevron-down');
        }
    }

    // Toggle Filter Function for Mobile Dropdowns
    function toggleFilter(filterId) {
        const content = document.getElementById(filterId + '-content');
        const icon = document.getElementById(filterId + '-icon');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuButton = document.querySelector('[onclick="toggleMobileMenu()"]');

        if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            const menuIcon = menuButton.querySelector('i');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 640) {
            document.getElementById('mobileMenu').classList.add('hidden');
            const menuIcon = document.querySelector('[onclick="toggleMobileMenu()"] i');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }

        // Show filters on desktop, hide on mobile
        if (window.innerWidth >= 1024) {
            document.getElementById('mobileFilters').classList.remove('hidden');
            document.getElementById('filterToggleIcon').classList.remove('fa-chevron-up');
            document.getElementById('filterToggleIcon').classList.add('fa-chevron-down');
        } else {
            document.getElementById('mobileFilters').classList.add('hidden');
        }
    });

    // Kecamatan data based on Kota/Kabupaten
    const kecamatanData = {
        'Kota Jambi': [
            'Jambi Selatan',
            'Jambi Timur',
            'Pasar Jambi',
            'Kota Baru',
            'Telanaipura',
            'Danau Sipin',
            'Danau Teluk',
            'Pelayangan',
            'Paal Merah',
            'Alam Barajo',
            'Jelutung'
        ],
        'Kota Sungai Penuh': [
            'Hamparan Rawang',
            'Tanah Kampung',
            'Kumun Debai',
            'Sungai Bungkal',
            'Sungai Penuh'
        ],
        'Kab. Batanghari': [
            'Muara Bulian',
            'Muara Tembesi',
            'Bajubang',
            'Pemayung',
            'Batin XXIV'
        ],
        'Kab. Bungo': [
            'Muara Bungo',
            'Bathin III',
            'Rantau Pandan',
            'Pelepat',
            'Jujuhan'
        ],
        'Kab. Kerinci': [
            'Air Hangat',
            'Gunung Kerinci',
            'Siulak',
            'Kayu Aro',
            'Depati VII'
        ],
        'Kab. Merangin': [
            'Bangko',
            'Tabir',
            'Pamenang',
            'Margo Tabir',
            'Sungai Manau'
        ],
        'Kab. Muaro Jambi': [
            'Sekernan',
            'Kumpeh',
            'Maro Sebo',
            'Mestong',
            'Jambi Luar Kota'
        ],
        'Kab. Sarolangun': [
            'Sarolangun',
            'Batang Asai',
            'Pauh',
            'Pelawan',
            'Air Hitam'
        ],
        'Kab. Tanjung Jabung Barat': [
            'Kuala Tungkal',
            'Betara',
            'Merlung',
            'Tebing Tinggi',
            'Pengabuan'
        ],
        'Kab. Tanjung Jabung Timur': [
            'Muara Sabak Timur',
            'Nipah Panjang',
            'Mendahara',
            'Dendang',
            'Sadu'
        ],
        'Kab. Tebo': [
            'Muara Tebo',
            'Tebo Tengah',
            'Rimbo Bujang',
            'Tebo Ilir',
            'VII Koto'
        ]
    };

    // Function to update Kecamatan options for mobile
    function updateKecamatanMobile() {
        const kotaInput = document.getElementById('kota-mobile');
        const kecamatanDatalist = document.getElementById('kecamatan-list-mobile');
        const kecamatanInput = document.getElementById('kecamatan-mobile');

        const selectedKota = kotaInput.value;

        // Clear existing options
        kecamatanDatalist.innerHTML = '';
        kecamatanInput.value = '';

        // Add new options based on selected kota
        if (kecamatanData[selectedKota]) {
            kecamatanData[selectedKota].forEach(kecamatan => {
                const option = document.createElement('option');
                option.value = kecamatan;
                kecamatanDatalist.appendChild(option);
            });
        }
    }

    // Function to update Kecamatan options for desktop
    function updateKecamatanDesktop() {
        const kotaInput = document.getElementById('kota-desktop');
        const kecamatanDatalist = document.getElementById('kecamatan-list-desktop');
        const kecamatanInput = document.getElementById('kecamatan-desktop');

        const selectedKota = kotaInput.value;

        // Clear existing options
        kecamatanDatalist.innerHTML = '';
        kecamatanInput.value = '';

        // Add new options based on selected kota
        if (kecamatanData[selectedKota]) {
            kecamatanData[selectedKota].forEach(kecamatan => {
                const option = document.createElement('option');
                option.value = kecamatan;
                kecamatanDatalist.appendChild(option);
            });
        }
    }

    // Initialize kecamatan options on page load if kota is already selected
    document.addEventListener('DOMContentLoaded', function() {
        // Check if kota is already set (from form request)
        const kotaMobile = document.getElementById('kota-mobile');
        const kotaDesktop = document.getElementById('kota-desktop');

        if (kotaMobile && kotaMobile.value) {
            updateKecamatanMobile();
        }

        if (kotaDesktop && kotaDesktop.value) {
            updateKecamatanDesktop();
        }
    });
</script>

</body>
</html>
