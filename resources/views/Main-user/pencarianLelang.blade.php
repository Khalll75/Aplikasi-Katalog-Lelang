<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing - Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
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
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800">
<!-- Header -->
<header class="bg-gradient-to-r from-red-900 to-red-800 text-white py-4 fixed top-0 left-0 w-full z-50 shadow-lg backdrop-blur-sm">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-12 w-auto mr-4" style="max-height:48px;">
            <a href="/" class="text-2xl font-bold hover:text-red-200 transition-colors tracking-wide flex items-center">
                <i class="fas fa-gavel mr-2"></i>
                Beranda
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="bg-white text-red-900 px-6 py-2 rounded-full font-medium hover:bg-red-50 hover:shadow-lg transition-all duration-300 button-hover" onclick="document.getElementById('daftarModal').classList.remove('hidden')">
                <i class="fas fa-user-plus mr-2"></i>
                Daftar
            </button>
            <!-- Logo removed from right side -->
        </div>
    </div>
</header>

<!-- Main Container -->
<div class="container mx-auto px-4 pt-28 pb-12">
    <!-- Page Title -->
    <div class="text-center mb-8 fade-in">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pencarian Lelang Properti</h1>
        <p class="text-gray-600">Temukan properti lelang terbaik sesuai kebutuhan Anda</p>
        <div class="flex justify-center mt-4 space-x-2">
            <div class="w-2 h-2 bg-red-500 rounded-full pulse-dot"></div>
            <div class="w-2 h-2 bg-red-400 rounded-full pulse-dot" style="animation-delay: 0.2s;"></div>
            <div class="w-2 h-2 bg-red-300 rounded-full pulse-dot" style="animation-delay: 0.4s;"></div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('search') }}">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">

            <!-- Sidebar Filters -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Kategori Lot Lelang -->
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
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Search Bar and Buttons -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6 filter-card">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-0 relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari berdasarkan kode aset, alamat, atau lokasi..."
                                   class="w-full border-2 border-gray-300 rounded-lg pl-12 pr-4 py-3 input-focus focus:border-red-500 focus:outline-none">
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-800 px-6 py-3 rounded-lg font-medium hover:from-yellow-500 hover:to-yellow-600 transition-all duration-300 button-hover shadow-md">
                            <i class="fas fa-search mr-2"></i>
                            Cari Lelang
                        </button>
                        <a href="{{ route('search') }}" id="resetFilterBtn" class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 py-3 rounded-lg font-medium hover:from-gray-600 hover:to-gray-700 transition-all duration-300 button-hover shadow-md">
                            <i class="fas fa-redo mr-2"></i>
                            Reset Filter
                        </a>
                    </div>
                </div>

                <!-- Filter Sections -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Spesifikasi Properti -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm filter-card">
                        <h3 class="font-semibold mb-5 text-gray-800 flex items-center">
                            <i class="fas fa-home mr-2 text-blue-600"></i>
                            Spesifikasi Properti
                        </h3>
                        <div class="space-y-5">
                            <!-- Luas Tanah -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
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
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                        <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                                        Daya Listrik
                                    </label>
                                    <select name="listrik" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="450 VA" {{ request('listrik') == '450 VA' ? 'selected' : '' }}>450 VA</option>
                                        <option value="900 VA" {{ request('listrik') == '900 VA' ? 'selected' : '' }}>900 VA</option>
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
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
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                        <i class="fas fa-tint mr-2 text-cyan-500"></i>
                                        Sumber Air
                                    </label>
                                    <select name="air" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white input-focus focus:border-red-500 focus:outline-none">
                                        <option value="">Pilih...</option>
                                        <option value="PDAM" {{ request('air') == 'PDAM' ? 'selected' : '' }}>PDAM</option>
                                        <option value="Sumur Bor" {{ request('air') == 'Sumur Bor' ? 'selected' : '' }}>Sumur Bor</option>
                                        <option value="Sumur Gali" {{ request('air') == 'Sumur Gali' ? 'selected' : '' }}>Sumur Gali</option>
                                        <option value="Air Tanah" {{ request('air') == 'Air Tanah' ? 'selected' : '' }}>Air Tanah</option>
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
                                    <input type="text" name="kota" value="{{ request('kota') }}" placeholder="Masukkan kota"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
                                </div>
                                <!-- Kecamatan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                    <input type="text" name="kecamatan" value="{{ request('kecamatan') }}" placeholder="Masukkan kecamatan"
                                           class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full input-focus focus:border-red-500 focus:outline-none">
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
    </form>

    <!-- Results Section -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @forelse($query as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="bg-white rounded-xl shadow-sm overflow-hidden property-card">
                <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center overflow-hidden">
                    @php
                        $mainImage = $property->images->where('is_main', true)->first() ?? $property->images->first();
                    @endphp
                    @if($mainImage)
                        <img src="{{ asset('storage/'.$mainImage->media_url) }}" alt="{{ $property->nama }}" class="object-cover w-full h-full property-image">
                    @else
                        <div class="text-gray-400 text-center">
                            <i class="fas fa-image text-4xl mb-2"></i>
                            <p class="text-sm">No Image</p>
                        </div>
                    @endif
                </div>
                <div class="p-5">
                    <h4 class="font-semibold text-gray-800 mb-2 line-clamp-2">{{ $property->kode_aset }}</h4>
                    <p class="text-gray-600 text-sm mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                        {{ $property->alamat }}
                    </p>
                    <div class="bg-gradient-to-r from-red-50 to-red-100 p-3 rounded-lg mb-3">
                        <p class="text-red-600 font-bold text-sm">
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
                    <div class="flex justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="flex items-center">
                            <i class="fas fa-bed mr-1"></i>
                            {{ $property->kamar_tidur ?? '-' }} bed
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-bath mr-1"></i>
                            {{ $property->kamar_mandi ?? '-' }} bath
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-ruler-combined mr-1"></i>
                            {{ $property->luas_tanah ?? '-' }} m²
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
<div id="conditionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
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
                <h2 class="text-xl font-bold mb-2">Katalog Lelang Properti</h2>
                <p class="text-sm">Platform pencarian dan informasi lelang properti terbaik untuk wilayah Indonesia.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Kontak</h2>
                <p class="text-sm">Email: info@kataloglelang.id</p>
                <p class="text-sm">Telepon: (021) 9876-5432</p>
            </div>
        </div>
        <hr class="border-gray-700">
        <p class="text-center text-xs text-gray-500 pt-4">© 2025 Katalog Lelang Properti. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<!-- Modal: Daftar -->
<div id="daftarModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-red-900 text-white p-4 rounded-t-lg flex justify-between items-center">
            <h2 class="text-lg font-bold flex-1 text-center">Daftar</h2>
            <button onclick="document.getElementById('daftarModal').classList.add('hidden')" class="text-white hover:text-gray-300 ml-4">
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
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        modal.style.animation = 'fadeInUp 0.3s ease';
    }

    function closeModal() {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            modal.classList.add('hidden');
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
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
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
                    document.getElementById('daftarModal').classList.add('hidden');
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
</script>

</body>
</html>
