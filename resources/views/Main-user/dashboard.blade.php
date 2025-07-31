<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properti Area Jambi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Hide scrollbar for horizontal scroll */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Smooth animations */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effects */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Custom gradient */
        .gradient-bg {
            background: linear-gradient(135deg, #7c2d12 0%, #991b1b 100%);
        }

        .category-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .property-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .property-card img {
            transition: transform 0.3s ease;
        }

        .property-card:hover img {
            transform: scale(1.05);
        }

        /* Steps animation */
        .step-item {
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .step-item:hover {
            opacity: 1;
            transform: translateX(5px);
        }

        .step-number {
            transition: all 0.3s ease;
        }

        .step-item:hover .step-number {
            transform: scale(1.1);
        }

        /* Search input focus effect */
        .search-input {
            transition: all 0.3s ease;
        }

        .search-input:focus {
            transform: scale(1.02);
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.3);
        }

        /* Button hover effects */
        .btn-primary {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .button-hover {
            transition: all 0.3s ease;
        }

        .button-hover:hover {
            transform: translateY(-2px);
        }

        /* Parallax effect for hero */
        .hero-parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Icon animation */
        .icon-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Pulse effect for status badges */
        .pulse-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
            }
        }

        /* Loading state */
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        .adlam-heading {
            font-family: 'ADLaM Display', cursive !important;
        }
    </style>
</head>
<body class="bg-gray-50" style="background-image: url('/images/ds wallpaper.png'); background-repeat: repeat; background-size: 600px; background-attachment: fixed; position: relative;">
    <!-- Semi-transparent overlay for better readability -->
    <div class="absolute inset-0 bg-white bg-opacity-70" style="z-index: 0;"></div>
    <div class="min-h-screen" style="position: relative; z-index: 1;">
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

        <!-- Hero Section -->
        <section class="relative bg-cover bg-center h-[32rem] text-white hero-parallax" style="background-image: url('/images/dashboard_bg.jpeg')">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
            <div class="relative container mx-auto px-4 h-full flex flex-col justify-center items-center text-center animate-fade-in">
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 adlam-heading">
                    <span class="text-yellow-400 drop-shadow-lg">GUDANG PROPERTI JAMBI</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl">
                    Temukan properti impian Anda dengan harga terbaik
                </p>
                <form action="{{ route('search') }}" method="GET" class="w-full max-w-lg">
                    <div class="relative">
                        <input type="text" name="q" value="{{ request('q') }}"
                               placeholder="Cari properti berdasarkan lokasi, kode, atau jenis..."
                               class="search-input w-full py-4 px-6 pr-32 pl-14 rounded-full text-gray-900 focus:ring-2 focus:ring-yellow-400 focus:outline-none shadow-lg text-base placeholder:text-sm placeholder-gray-500">
                        <div class="absolute inset-y-0 left-5 flex items-center">
                            <i class="fa fa-search text-gray-400 text-lg"></i>
                        </div>
                        <button type="submit" class="absolute right-2 top-2 bg-yellow-400 text-gray-900 px-6 py-2 rounded-full hover:bg-yellow-500 transition-colors font-semibold">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Main Content -->
        <div class="container mx-auto px-4 pt-28 pb-12" style="position: relative; z-index: 1;">

            <!-- Kategori Lot Lelang Section -->
            <section class="mb-16 animate-slide-up">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 adlam-heading">Kategori Lot Properti</h2>
                        <p class="text-gray-600">Pilih kategori properti yang Anda minati</p>
                    </div>
                    <a href="/search" class="text-red-600 hover:text-red-700 font-medium flex items-center group">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-6 pb-4 justify-center" style="width: max-content; margin-left: auto; margin-right: auto;">
                        <!-- Gudang -->
                        <a href="{{ route('search', ['kategori_lot' => 'Gudang']) }}" class="category-card bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-shadow text-center block group flex-shrink-0 w-64">
                            <div class="w-16 h-16 mx-auto mb-4 bg-gray-50 rounded-xl flex items-center justify-center group-hover:bg-gray-100 transition-colors">
                                <i class="fa-solid fa-warehouse text-2xl text-gray-600 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-semibold text-gray-800 text-lg mb-1">Gudang</div>
                            <div class="text-gray-500 text-sm">Penyimpanan & logistik</div>
                        </a>
                        <!-- Ruko -->
                        <a href="{{ route('search', ['kategori_lot' => 'Ruko']) }}" class="category-card bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-shadow text-center block group flex-shrink-0 w-64">
                            <div class="w-16 h-16 mx-auto mb-4 bg-yellow-50 rounded-xl flex items-center justify-center group-hover:bg-yellow-100 transition-colors">
                                <i class="fa-solid fa-store text-2xl text-yellow-600 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-semibold text-gray-800 text-lg mb-1">Ruko</div>
                            <div class="text-gray-500 text-sm">Properti komersial</div>
                        </a>
                        <!-- Rumah Tinggal -->
                        <a href="{{ route('search', ['kategori_lot' => 'Rumah Tinggal']) }}" class="category-card bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-shadow text-center block group flex-shrink-0 w-64">
                            <div class="w-16 h-16 mx-auto mb-4 bg-red-50 rounded-xl flex items-center justify-center group-hover:bg-red-100 transition-colors">
                                <i class="fa-solid fa-house text-2xl text-red-600 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-semibold text-gray-800 text-lg mb-1">Rumah Tinggal</div>
                            <div class="text-gray-500 text-sm">Hunian keluarga</div>
                        </a>
                        <!-- Tanah Kebun -->
                        <a href="{{ route('search', ['kategori_lot' => 'Tanah Kebun']) }}" class="category-card bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-shadow text-center block group flex-shrink-0 w-64">
                            <div class="w-16 h-16 mx-auto mb-4 bg-green-50 rounded-xl flex items-center justify-center group-hover:bg-green-100 transition-colors">
                                <i class="fa-solid fa-seedling text-2xl text-green-600 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-semibold text-gray-800 text-lg mb-1">Tanah Kebun</div>
                            <div class="text-gray-500 text-sm">Lahan perkebunan</div>
                        </a>
                        <!-- Tanah Kosong -->
                        <a href="{{ route('search', ['kategori_lot' => 'Tanah Kosong']) }}" class="category-card bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-shadow text-center block group flex-shrink-0 w-64">
                            <div class="w-16 h-16 mx-auto mb-4 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                <i class="fa-solid fa-mountain text-2xl text-blue-600 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-semibold text-gray-800 text-lg mb-1">Tanah Kosong</div>
                            <div class="text-gray-500 text-sm">Lahan kosong siap bangun</div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Rekomendasi Properti Baru Section -->
            <section class="mb-16 animate-slide-up">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 adlam-heading">Rekomendasi Properti Baru</h2>
                        <p class="text-gray-600">Properti terbaru dengan harga terbaik</p>
                    </div>
                    <a href="/search" class="text-red-600 hover:text-red-700 font-medium flex items-center group">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-6 pb-4" style="width: max-content;">
                        @forelse($properties as $property)
                                @php
                                    $mainImage = $property->images->where('is_main', true)->first() ?? $property->images->first();
                                    $lelang = $property->lelangSchedule;
                                    $kategori = ucfirst($property->kategori_lot ?? 'Properti');
                                    $status = $lelang && $lelang->is_selesai ? 'Lelang Selesai' : 'Tersedia';
                                @endphp
                            @if($mainImage)
                                <div class="property-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-xl transition-all flex-shrink-0 w-80 cursor-pointer group"
                                     onclick="window.location.href='{{ route('properties.show', $property->id) }}'"
                                     role="button" aria-label="Lihat detail properti">
                                <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('storage/'.$mainImage->media_url) }}"
                                             alt="{{ $property->nama }}"
                                             class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="inline-block {{ $status == 'Tersedia' ? 'bg-green-100 text-green-700 pulse-badge' : 'bg-gray-200 text-gray-500' }} text-xs px-3 py-1 rounded-full font-medium">
                                            {{ $status }}
                                        </span>
                                        <span class="inline-block bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-medium">
                                            {{ $kategori }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-500 mb-2">
                                        Kode: <span class="font-semibold text-gray-700">{{ $property->kode_aset }}</span>
                                    </div>
                                    <div class="text-gray-900 font-bold text-xl mb-3">
                                            @if($lelang && $lelang->limit_lelang)
                                                <span class="text-green-600">Rp {{ number_format($lelang->limit_lelang, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-gray-400">Harga belum tersedia</span>
                                        @endif
                                    </div>
                                    <div class="text-gray-600 text-sm flex items-center">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                        <span class="line-clamp-2">{{ $property->alamat }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <div class="text-center py-12 text-gray-500 w-full">
                                <i class="fas fa-home text-4xl mb-4"></i>
                                <p>Belum ada properti tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="mb-16 animate-slide-up">
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl shadow-lg border border-blue-200 p-8 md:p-12 max-w-5xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-blue-900 mb-4 text-center adlam-heading">
                        Keunggulan Membeli Asset Agunan Pembiayaan Bank
                    </h2>
                    <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">
                        Dapatkan properti berkualitas dengan harga terbaik dan proses yang mudah
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- 1 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-blue-100 border-2 border-blue-400 flex items-center justify-center text-blue-700 font-bold text-lg">01</div>
                            </div>
                            <div>
                                <div class="font-semibold text-blue-900 text-lg mb-1">Aset Variatif</div>
                                <div class="text-gray-700">(Tanah, Rumah dan Ruko)</div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-red-100 border-2 border-red-400 flex items-center justify-center text-red-700 font-bold text-lg">02</div>
                            </div>
                            <div>
                                <div class="font-semibold text-red-900 text-lg mb-1">Harga Dibawah Pasaran</div>
                                <div class="text-gray-700">dan lokasi jaminan strategis</div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-purple-100 border-2 border-purple-400 flex items-center justify-center text-purple-700 font-bold text-lg">03</div>
                            </div>
                            <div>
                                <div class="font-semibold text-purple-900 text-lg mb-1">Dibantu Pengelola</div>
                                <div class="text-gray-700">untuk survey terlebih dahulu</div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-green-100 border-2 border-green-400 flex items-center justify-center text-green-700 font-bold text-lg">04</div>
                            </div>
                            <div>
                                <div class="font-semibold text-green-900 text-lg mb-1">Proses Lelang Mudah</div>
                                <div class="text-gray-700">dan cepat (Online)</div>
                            </div>
                        </div>
                        <!-- 5 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-blue-100 border-2 border-blue-400 flex items-center justify-center text-blue-700 font-bold text-lg">05</div>
                            </div>
                            <div>
                                <div class="font-semibold text-blue-900 text-lg mb-1">Proses Pembiayaan</div>
                                <div class="text-gray-700">bisa langsung diproses*</div>
                                <div class="text-gray-500 text-xs mt-1">*SnK Berlaku</div>
                            </div>
                        </div>
                        <!-- 6 -->
                        <div class="step-item flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="step-number w-12 h-12 rounded-full bg-purple-100 border-2 border-purple-400 flex items-center justify-center text-purple-700 font-bold text-lg">06</div>
                            </div>
                            <div>
                                <div class="font-semibold text-purple-900 text-lg mb-1">Dokumen Terjamin</div>
                                <div class="text-gray-700">kepemilikan lebih terjamin</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tata Cara Mengikuti Lelang E-Auction Section -->
            <section class="mb-16 animate-slide-up">
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl shadow-lg border border-orange-200 p-8 md:p-12 max-w-5xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-orange-900 mb-4 text-center adlam-heading">
                        TATA CARA MENGIKUTI LELANG E-AUCTION
                    </h2>
                    <div class="text-center mb-8">
                        <span class="inline-block bg-yellow-400 text-yellow-900 px-4 py-2 rounded-full font-semibold text-sm">
                            LELANG.GO.ID
                        </span>
                        <p class="text-gray-600 mt-2">Ikuti langkah-langkah berikut untuk mengikuti lelang</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left column: Steps 1, 3, 5, 7 -->
                        <div class="space-y-6">
                            <!-- Step 1 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user-plus text-blue-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Sign in/Sign Up</div>
                                    <div class="text-gray-600 text-sm">Peminat registrasi di lelang.go.id</div>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-money-check text-green-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Setor Jaminan</div>
                                    <div class="text-gray-600 text-sm">Setor uang jaminan lelang</div>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-trophy text-yellow-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Pemenang Lelang</div>
                                    <div class="text-gray-600 text-sm">Pengumuman hasil lelang</div>
                                </div>
                            </div>

                            <!-- Step 7 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-clock text-red-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Pelunasan</div>
                                    <div class="text-gray-600 text-sm">Pelunasan maksimal H+5</div>
                                </div>
                            </div>
                        </div>

                        <!-- Right column: Steps 2, 4, 6, 8 -->
                        <div class="space-y-6">
                            <!-- Step 2 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-key text-purple-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Kode Aktivasi</div>
                                    <div class="text-gray-600 text-sm">Peserta mendapatkan kode aktivasi</div>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-mouse-pointer text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Pilih Objek</div>
                                    <div class="text-gray-600 text-sm">Peserta memilih objek agunan lelang</div>
                                </div>
                            </div>

                            <!-- Step 6 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-hand-holding-usd text-gray-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Ambil Jaminan</div>
                                    <div class="text-gray-600 text-sm">Peserta datang ke KPKNL untuk mengambil uang jaminan (jika tidak menang)</div>
                                </div>
                            </div>

                            <!-- Step 8 -->
                            <div class="step-item flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-certificate text-green-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 mb-1">Terbit Risalah</div>
                                    <div class="text-gray-600 text-sm">Terbit risalah lelang & pemenang datang ke Bank untuk mengambil sertifikat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section class="mb-24 animate-slide-up">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center adlam-heading">
                        <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>
                        Lokasi Kantor
                    </h2>
                    <iframe
                      src="https://www.google.com/maps?q=-1.6146340931868217,103.61583471117679&z=17&output=embed"
                      width="100%"
                      height="450"
                      style="border:0;"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </section>
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
    </div>

    <!-- Modal: Daftar -->
    <div id="daftarModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
            <div class="bg-red-900 text-white p-4 rounded-t-lg flex justify-between items-center">
                <h2 class="text-lg font-bold flex-1 text-center adlam-heading">Daftar</h2>
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

    @guest
    <!-- Floating Chat Bubble for Daftar Recommendation -->
    <div id="daftarChatBubble" class="fixed z-50 top-24 right-8 max-w-xs bg-white shadow-xl rounded-2xl border border-red-200 p-4 flex items-start gap-3 animate-fade-in" style="box-shadow: 0 8px 32px rgba(0,0,0,0.12);">
        <!-- Triangle pointer -->
        <div class="absolute left-10 -top-4 w-0 h-0 border-l-8 border-r-8 border-b-8 border-l-transparent border-r-transparent border-b-white"></div>
        <div class="flex-shrink-0">
            <div class="bg-red-100 rounded-full p-2">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2m2-4h4m-4 0a2 2 0 1 0 4 0m-4 0V4a2 2 0 1 1 4 0v0"></path></svg>
            </div>
        </div>
        <div class="flex-1">
            <div class="font-semibold text-gray-900 mb-1">Daftar untuk info lebih lanjut!</div>
            <div class="text-gray-600 text-sm mb-2">Dapatkan detail properti, jadwal lelang, dan penawaran eksklusif dengan mendaftar sekarang.</div>
            <button onclick="document.getElementById('daftarModal').classList.remove('hidden');document.getElementById('daftarChatBubble').style.display='none';" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded-lg font-bold text-sm shadow button-hover w-full">Daftar Sekarang</button>
        </div>
        <button onclick="document.getElementById('daftarChatBubble').style.display='none';" class="ml-2 text-gray-400 hover:text-gray-600 focus:outline-none" aria-label="Tutup">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endguest

    <script>
        // Add smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add loading animation for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
        });

        // Add intersection observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });

        // Add click ripple effect for cards
        document.querySelectorAll('.category-card, .property-card').forEach(card => {
            card.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.3)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.left = (e.clientX - e.target.offsetLeft) + 'px';
                ripple.style.top = (e.clientY - e.target.offsetTop) + 'px';
                ripple.style.width = ripple.style.height = '20px';

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
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
                        'X-Requested-With': 'XMLHttpRequest',
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
