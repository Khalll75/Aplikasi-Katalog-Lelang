<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Detail - {{ $property->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body, p, span, label, td, th, input, button, a, div {
            font-family: 'Open Sans', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .adlam-heading {
            font-family: 'ADLaM Display', cursive !important;
        }
        .main-image-frame {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: #f8f9fa;
            border-radius: 0.75rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e9ecef;
        }
        .main-image-frame img {
            display: block;
            max-width: 100%;
            height: auto;
            max-height: 65vh;
            margin: 0 auto;
            object-fit: contain;
        }
        .button-hover {
            transition: all 0.2s ease;
        }
        .button-hover:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-shadow {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }
        .card-shadow:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }
        .section-spacing {
            margin-bottom: 2rem;
        }
        .info-grid-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 1rem;
            border-radius: 0.75rem;
            text-align: center;
            transition: all 0.2s ease;
        }
        .info-grid-item:hover {
            border-color: #dc2626;
            transform: translateY(-1px);
        }
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }
        .btn-primary {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-1px);
        }
        .text-readable {
            line-height: 1.6;
            color: #374151;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid;
        }
        @media (max-width: 768px) {
            .main-image-frame {
                max-height: 50vh;
            }
            .info-grid-item {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
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
            <div class="relative">
                <form action="{{ route('search') }}" method="GET">
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari lelang..."
                           class="bg-white text-gray-800 px-4 py-2 pr-10 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-red-300">
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <button class="bg-white text-red-900 px-6 py-2 rounded-full font-medium hover:bg-red-50 hover:shadow-lg transition-all duration-300 button-hover" onclick="document.getElementById('daftarModal').classList.remove('hidden')">
                <i class="fas fa-user-plus mr-2"></i>
                Daftar
            </button>
        </div>
    </div>
</header>
<div class="container mx-auto px-4 pt-28 pb-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Property Images and Details -->
        <div class="lg:col-span-2">
            <!-- Main Property Card -->
            <div class="bg-white rounded-xl card-shadow overflow-hidden section-spacing">
                <!-- Image Gallery Section -->
                <div class="p-6">
                    <!-- Main Image Container -->
                    <div class="main-image-frame relative">
                        <div class="swiper mySwiperMain w-full">
                            <div class="swiper-wrapper">
                                @forelse($property->images as $img)
                                    <div class="swiper-slide flex items-center justify-center">
                                        @if($img->media_type === 'video')
                                            <video controls class="rounded-lg max-h-full">
                                                <source src="{{ asset('storage/'.$img->media_url) }}" type="video/{{ $img->format }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/'.$img->media_url) }}"
                                                 alt="Property Image" class="rounded-lg" />
                                        @endif
                                    </div>
                                @empty
                                    <div class="swiper-slide flex items-center justify-center">
                                        <img src="https://placehold.co/800x400/f8f9fa/6c757d?text=No+Image+Available"
                                             alt="No Image Available" class="rounded-lg" />
                                    </div>
                                @endforelse
                            </div>
                            <div class="swiper-button-prev custom-swiper-nav z-50"></div>
                            <div class="swiper-button-next custom-swiper-nav z-50"></div>
                            <div class="absolute top-4 right-4 bg-black bg-opacity-60 text-white text-sm px-3 py-1 rounded-full z-50">
                                <span class="swiper-counter">1 / {{ $property->images->count() ?: 1 }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Navigation -->
                    <div class="mt-6">
                        <div class="swiper mySwiperThumbs">
                            <div class="swiper-wrapper">
                                @forelse($property->images as $img)
                                    <div class="swiper-slide !w-20 !h-20 cursor-pointer rounded-lg overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-200">
                                        <img src="{{ asset('storage/'.$img->media_url) }}"
                                             alt="Thumbnail"
                                             class="w-full h-full object-cover" />
                                    </div>
                                @empty
                                    <div class="swiper-slide !w-20 !h-20 cursor-pointer rounded-lg overflow-hidden border-2 border-gray-200 hover:border-red-500 transition-all duration-200">
                                        <img src="https://placehold.co/80x80/f8f9fa/6c757d?text=No+Image"
                                             alt="No Image"
                                             class="w-full h-full object-cover" />
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Property Details -->
                <div class="px-6 pb-6">
                    <div class="border-t border-gray-200 pt-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-3">{{ $property->nama }}</h1>
                        <div class="flex items-start mb-6">
                            <i class="fas fa-map-marker-alt text-red-600 mt-1 mr-3"></i>
                            <p class="text-gray-700 text-readable">{{ $property->alamat }}</p>
                        </div>
                        <!-- Address, Google Maps Link, and QR Code Section -->
                        <div class="mt-2 mb-8 flex flex-col md:flex-row items-center gap-6 bg-gradient-to-br from-red-50 to-white border border-red-200 rounded-xl shadow p-6">
                            <div class="flex-1">
                                <a href="{{ $gmapLink }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors font-medium">
                                    <i class="fas fa-location-arrow mr-2"></i> Lihat di Google Maps
                                </a>
                            </div>
                            <div class="flex-shrink-0 flex items-center justify-center">
                                <div class="bg-white border border-red-100 rounded-lg p-3 shadow">
                                    {!! QrCode::size(120)->generate($gmapLink) !!}
                                    <div class="text-xs text-gray-500 mt-2 text-center">Scan untuk buka di HP</div>
                                </div>
                            </div>
                        </div>
                        <!-- Property Features Grid -->
                        @php
                            $hasFeatures = $property->luas_tanah || $property->luas_bangunan || $property->kamar_tidur || $property->kamar_mandi || $property->listrik || $property->air;
                        @endphp
                        @if($hasFeatures)
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                            @if($property->luas_tanah)
                            <div class="info-grid-item">
                                <i class="fas fa-ruler-combined text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->luas_tanah }} m²</div>
                                <div class="text-sm text-gray-600">Luas Tanah</div>
                            </div>
                            @endif
                            @if($property->luas_bangunan)
                            <div class="info-grid-item">
                                <i class="fas fa-building text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->luas_bangunan }} m²</div>
                                <div class="text-sm text-gray-600">Luas Bangunan</div>
                            </div>
                            @endif
                            @if($property->kamar_tidur)
                            <div class="info-grid-item">
                                <i class="fas fa-bed text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->kamar_tidur }}</div>
                                <div class="text-sm text-gray-600">Kamar Tidur</div>
                            </div>
                            @endif
                            @if($property->kamar_mandi)
                            <div class="info-grid-item">
                                <i class="fas fa-bath text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->kamar_mandi }}</div>
                                <div class="text-sm text-gray-600">Kamar Mandi</div>
                            </div>
                            @endif
                            @if($property->listrik)
                            <div class="info-grid-item">
                                <i class="fas fa-bolt text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->listrik }}</div>
                                <div class="text-sm text-gray-600">Listrik</div>
                            </div>
                            @endif
                            @if($property->air)
                            <div class="info-grid-item">
                                <i class="fas fa-tint text-red-600 text-lg mb-2"></i>
                                <div class="text-red-900 font-semibold text-lg">{{ $property->air }}</div>
                                <div class="text-sm text-gray-600">Air</div>
                            </div>
                            @endif
                        </div>
                        @endif
                        <!-- Point of Interest -->
                        @if($property->pointsOfInterest && $property->pointsOfInterest->count())
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-map-marked-alt text-red-600 mr-2"></i>
                                Point of Interest
                            </h2>
                            <div class="space-y-3">
                                @foreach($property->pointsOfInterest as $poi)
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-location-dot text-red-600 mr-3"></i>
                                            <span class="text-gray-700 text-readable">{{ $poi->poin }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column - Property Info and Contact -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Property Code and Status -->
            <div class="space-y-4">
                <div class="bg-white rounded-xl card-shadow p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Kode Aset</span>
                        <span class="text-sm font-semibold text-gray-900">{{ $property->kode_aset }}</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl card-shadow p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Kategori Lot</span>
                        <span class="text-sm font-semibold text-gray-900">
                            @php
                                $kategoriLabels = [
                                    'gudang' => 'Gudang',
                                    'ruko' => 'Ruko',
                                    'rumah_tinggal' => 'Rumah Tinggal',
                                    'tanah_kebun' => 'Tanah Kebun',
                                    'tanah_kosong' => 'Tanah Kosong',
                                ];
                            @endphp
                            {{ $kategoriLabels[$property->kategori_lot] ?? $property->kategori_lot }}
                        </span>
                    </div>
                </div>
                <div class="bg-white rounded-xl card-shadow p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Kondisi</span>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-gray-900">{{ $property->kondisi }}</span>
                            <button type="button"
                                    class="w-6 h-6 flex items-center justify-center bg-red-600 text-white text-xs rounded-full hover:bg-red-700 transition-colors"
                                    title="Info tentang kondisi"
                                    onclick="document.getElementById('conditionModal').classList.remove('hidden')">
                                <i class="fas fa-question"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                            onclick="copyShareLink()"
                            class="bg-white text-gray-700 border border-gray-300 px-6 py-3 rounded-lg font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 button-hover flex items-center gap-2">
                        <i class="fas fa-share-alt"></i>
                        <span>Bagikan</span>
                    </button>
                </div>
            </div>
            <!-- Price Card -->
            <div class="bg-white rounded-xl card-shadow p-6 text-center">
                <div class="text-gray-600 text-sm font-medium mb-2">Limit Lelang</div>
                @if($property->lelangSchedule)
                    <div class="text-red-600 text-3xl font-bold mb-1">
                        Rp {{ number_format($property->lelangSchedule->limit_lelang, 0, ',', '.') }}
                    </div>
                @else
                    <div class="text-gray-400 text-lg">Belum ada data lelang</div>
                @endif
            </div>
            <!-- Auction Schedule -->
            <div class="bg-white rounded-xl card-shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-calendar-alt text-red-600 mr-2"></i>
                    Jadwal Lelang
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                            @if($property->lelangSchedule && $property->lelangSchedule->tanggal)
                                {{ \Carbon\Carbon::parse($property->lelangSchedule->tanggal)->translatedFormat('l, d F Y') }}
                            @else
                                Belum ditentukan
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Lelang</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                            <span class="text-gray-900">{{ $property->lelangSchedule && $property->lelangSchedule->lokasi ? $property->lelangSchedule->lokasi : 'Belum ditentukan' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Person -->
            <div class="bg-white rounded-xl card-shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-address-book text-red-600 mr-2"></i>
                    Contact Person
                </h3>
                <div class="space-y-3">
                    @forelse($property->contactPersons as $cp)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-user text-red-600 mr-2"></i>
                                <span class="text-gray-900 font-medium">{{ $cp->nama }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-red-600 mr-2"></i>
                                <span class="text-gray-700 mr-2">{{ $cp->no_hp }}</span>
                                <a href="https://wa.me/62{{ ltrim($cp->no_hp, '0') }}" target="_blank" class="text-green-600 hover:underline flex items-center gap-1">
                                    <i class="fab fa-whatsapp"></i>
                                    Chat on WhatsApp
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <i class="fas fa-info-circle text-gray-400 mr-2"></i>
                                <span class="text-gray-500">Tidak ada kontak tersedia</span>
                            </div>
                        </div>
                    @endforelse
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
<!-- Modal: Keterangan Kondisi -->
<div id="conditionModal" class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-red-600 text-white p-6 rounded-t-xl">
            <div class="flex justify-between items-center">
                <div class="text-center flex-1">
                    <h2 class="text-xl font-bold">Keterangan Kondisi Aset</h2>
                    <p class="text-red-100 text-sm mt-1">Penjelasan Kode Kondisi Properti</p>
                </div>
                <button id="closeModal" class="text-white hover:text-red-200 ml-4 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <div class="border-b border-gray-200 pb-6">
                <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium mr-3">1</span>
                    Cara Penjualan
                </h3>
                <div class="grid grid-cols-1 gap-3">
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">L</span>
                        <span class="text-gray-700 ml-4">Lelang</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">AJB</span>
                        <span class="text-gray-700 ml-4">Sukarela</span>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-200 pb-6">
                <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium mr-3">2</span>
                    Ada tidaknya penghuni
                </h3>
                <div class="grid grid-cols-1 gap-3">
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">K</span>
                        <span class="text-gray-700 ml-4">Aset Kosong</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">TK</span>
                        <span class="text-gray-700 ml-4">Tidak Kosong</span>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-200 pb-6">
                <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium mr-3">3</span>
                    Ada tidaknya penguasaan
                </h3>
                <p class="text-gray-600 text-sm mb-4">(perlawanan/penghadangan)</p>
                <div class="grid grid-cols-1 gap-3">
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">AP</span>
                        <span class="text-gray-700 ml-4">Ada Perlawanan</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">TP</span>
                        <span class="text-gray-700 ml-4">Tanpa Perlawanan</span>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium mr-3">4</span>
                    Kondisi Bangunan
                </h3>
                <div class="grid grid-cols-1 gap-3">
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">SH</span>
                        <span class="text-gray-700 ml-4">Sangat Baik</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">BA</span>
                        <span class="text-gray-700 ml-4">Baik</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">CU</span>
                        <span class="text-gray-700 ml-4">Cukup</span>
                    </div>
                    <div class="flex items-center bg-gray-50 rounded-lg p-3">
                        <span class="font-bold text-red-600 w-12 text-center">RB</span>
                        <span class="text-gray-700 ml-4">Rusak Berat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Swiper setup
    var thumbSwiper = new Swiper('.mySwiperThumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            640: { slidesPerView: 4, spaceBetween: 10 },
            768: { slidesPerView: 4, spaceBetween: 12 },
            1024: { slidesPerView: 4, spaceBetween: 15 }
        }
    });
    var mainSwiper = new Swiper('.mySwiperMain', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: { swiper: thumbSwiper },
        on: {
            slideChange: function () {
                const counter = document.querySelector('.swiper-counter');
                if (counter) {
                    counter.textContent = `${this.activeIndex + 1} / ${this.slides.length}`;
                }
                const thumbnails = document.querySelectorAll('.mySwiperThumbs .swiper-slide img');
                thumbnails.forEach((thumb, index) => {
                    if (index === this.activeIndex) {
                        thumb.classList.add('!border-red-500');
                        thumb.classList.remove('border-gray-200');
                    } else {
                        thumb.classList.remove('!border-red-500');
                        thumb.classList.add('border-gray-200');
                    }
                });
            }
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const firstThumbnail = document.querySelector('.mySwiperThumbs .swiper-slide:first-child img');
        if (firstThumbnail) {
            firstThumbnail.classList.add('!border-red-500');
            firstThumbnail.classList.remove('border-gray-200');
        }
    });
    function copyShareLink() {
        const shareData = {
            title: 'Bagikan',
            text: 'Cek data ini!',
            url: window.location.href
        };

        if (navigator.share) {
            navigator.share(shareData)
                .then(() => console.log('Link dibagikan!'))
                .catch((err) => console.error('Gagal membagikan:', err));
        } else {
            alert("Browser tidak mendukung fitur bagikan.");
        }
    }
    // Close modal function
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('conditionModal').classList.add('hidden');
    });
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

