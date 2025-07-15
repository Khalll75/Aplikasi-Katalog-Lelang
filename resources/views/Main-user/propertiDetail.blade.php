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
    <style>
        /* Add this in your <head> or a <style> block */
        .main-image-frame {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: #000;
            border-radius: 0.75rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-image-frame img {
            display: block;
            max-width: 100%;
            height: auto;
            max-height: 70vh; /* Prevents image from being too tall */
            margin: 0 auto;
            object-fit: contain;
            background: #000;
        }

        .button-hover {
            transition: all 0.3s ease;
        }

        .button-hover:hover {
            transform: translateY(-2px);
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
            <!-- Logo removed from right side -->
        </div>
    </div>
</header>

<div class="container mx-auto px-4 pt-28 pb-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column - Property Images and Details -->
        <div class="lg:col-span-2">
            <!-- Main Property Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <!-- Image Gallery Section -->
                <div class="relative p-6">
                    <!-- Main Image Container -->
                    <div class="main-image-frame relative">
                        <div class="swiper mySwiperMain w-full">
                            <div class="swiper-wrapper">
                                @forelse($property->images as $img)
                                    <div class="swiper-slide flex items-center justify-center">
                                        @if($img->media_type === 'video')
                                            <video controls class="rounded-xl">
                                                <source src="{{ asset('storage/'.$img->media_url) }}" type="video/{{ $img->format }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/'.$img->media_url) }}"
                                                 alt="Property Image" class="rounded-xl" />
                                        @endif
                                    </div>
                                @empty
                                    <div class="swiper-slide flex items-center justify-center">
                                        <img src="https://placehold.co/800x400/e2e8f0/64748b?text=No+Image"
                                             alt="No Image" class="rounded-xl" />
                                    </div>
                                @endforelse
                            </div>
                            <div class="swiper-button-prev !text-white !bg-black !bg-opacity-50 hover:!bg-opacity-70 !rounded-full !w-10 !h-10 !left-4 transition-all duration-200 after:!text-base after:!font-bold"></div>
                            <div class="swiper-button-next !text-white !bg-black !bg-opacity-50 hover:!bg-opacity-70 !rounded-full !w-10 !h-10 !right-4 transition-all duration-200 after:!text-base after:!font-bold"></div>
                            <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white text-sm px-3 py-1 rounded-full">
                                <span class="swiper-counter">1 / {{ $property->images->count() ?: 1 }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Navigation -->
                    <div class="mt-4">
                        <div class="swiper mySwiperThumbs">
                            <div class="swiper-wrapper">
                                @forelse($property->images as $img)
                                    <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                        <img src="{{ asset('storage/'.$img->media_url) }}"
                                             alt="Thumbnail"
                                             class="object-cover border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg w-full h-full" />
                                    </div>
                                @empty
                                    <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                        <img src="https://placehold.co/80x80/e2e8f0/64748b?text=No+Image"
                                             alt="No Image"
                                             class="object-cover border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg w-full h-full" />
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $property->nama }}</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        {{ $property->alamat }}
                    </p>

                    <!-- QR Code Section (improved) -->
                    <div class="mb-6 flex justify-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-red-700 to-red-400 rounded-2xl shadow-lg flex flex-col items-center justify-center relative border-4 border-white">
                            <i class="fas fa-qrcode text-white text-5xl mb-2"></i>
                            <span class="text-white font-bold text-lg tracking-wider">QR Code</span>
                            <span class="text-xs text-red-100 mt-1">Scan to get info</span>
                        </div>
                    </div>

                    <!-- Additional Info Grid (improved) -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-ruler-combined text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->luas_tanah }} m²</span>
                            <span class="text-xs text-gray-500">Luas Tanah</span>
                        </div>
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-building text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->luas_bangunan ?? '-' }} m²</span>
                            <span class="text-xs text-gray-500">Luas Bangunan</span>
                        </div>
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-bed text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->kamar_tidur ?? '-' }}</span>
                            <span class="text-xs text-gray-500">Kamar Tidur</span>
                        </div>
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-bath text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->kamar_mandi ?? '-' }}</span>
                            <span class="text-xs text-gray-500">Kamar Mandi</span>
                        </div>
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-bolt text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->listrik ?? '-' }}</span>
                            <span class="text-xs text-gray-500">Listrik</span>
                        </div>
                        <div class="bg-white border-2 border-red-200 rounded-xl shadow-sm flex flex-col items-center justify-center py-3 px-2 transition hover:shadow-md hover:border-red-400">
                            <i class="fas fa-tint text-red-500 mb-1"></i>
                            <span class="text-red-900 font-bold text-base">{{ $property->air ?? '-' }}</span>
                            <span class="text-xs text-gray-500">Air</span>
                        </div>
                    </div>

                    <!-- Point of Interest -->
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Point of Interest</h3>
                    <div class="space-y-3">
                        @forelse($property->pointsOfInterest as $poi)
                            <div class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-3">
                                <span class="text-gray-600">{{ $poi->poin }}</span>
                            </div>
                        @empty
                            <div class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-3">
                                <span class="text-gray-400">Tidak ada data</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Property Info and Contact -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Property Code and Status -->
            <div class="flex flex-row gap-8 mb-8">
                <div class="flex flex-col gap-4 flex-1 max-w-md">
                    <!-- Kode Aset Row -->
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center min-h-[48px]">
                        <span class="text-base font-semibold text-gray-900 ml-2">Kode Aset :</span>
                        <span class="flex-1 mx-4 text-base font-normal text-gray-900 whitespace-nowrap overflow-hidden text-ellipsis">{{ $property->kode_aset }}</span>
                    </div>
                    <!-- Kategori Lot Row -->
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center min-h-[48px]">
                        <span class="text-base font-semibold text-gray-900 ml-2">Kategori Lot :</span>
                        <span class="flex-1 mx-4 text-base font-normal text-gray-900 whitespace-nowrap overflow-hidden text-ellipsis">
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
                    <!-- Kondisi Row -->
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center min-h-[48px]">
                        <span class="text-base font-semibold text-gray-900 ml-2">Kondisi :</span>
                        <span class="flex-1 mx-4 text-base font-normal text-gray-900 whitespace-nowrap overflow-hidden text-ellipsis" title="Klik tanda tanya untuk penjelasan">{{ $property->kondisi }}</span>
                        <button type="button"
        class="w-7 h-7 flex items-center justify-center bg-red-800 text-white text-base font-bold rounded ml-2"
        title="Info tentang kondisi"
        onclick="document.getElementById('conditionModal').classList.remove('hidden')"
    >?</button>
                    </div>
                </div>
                <div class="flex items-start">
                    <button
                        type="button"
                        onclick="copyShareLink()"
                        class="bg-yellow-100 hover:bg-yellow-200 border-2 border-yellow-300 text-gray-900 font-semibold flex items-center gap-2 px-4 py-3 rounded-xl shadow-md transition-all duration-150 relative group"
                        title="Salin tautan properti"
                    >
                        <span>Share</span>
                        <i class="fas fa-share-alt text-lg"></i>
                        <span id="share-tooltip" class="absolute left-1/2 -translate-x-1/2 top-full mt-2 bg-gray-900 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-10">
                            Salin tautan ke clipboard
                        </span>
                    </button>
                </div>
            </div>

            <!-- Price Card -->
            <div class="bg-white rounded-xl p-6 shadow-md border-2 border-yellow-200 flex flex-col items-center text-center">
                <div class="text-yellow-700 text-lg font-semibold mb-1">Limit Lelang</div>
                @if($property->lelangSchedule)
                    <div class="text-orange-700 text-4xl md:text-5xl font-extrabold mt-1 mb-1">
                        Rp. {{ number_format($property->lelangSchedule->limit_lelang, 0, ',', '.') }}
                    </div>
                @else
                    <div class="text-gray-400">Belum ada data lelang</div>
                @endif
            </div>

            <!-- Auction Schedule -->
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Jadwal Lelang</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Hari, Tanggal</label>
                        <input type="text" value="{{ $property->lelangSchedule ? \Carbon\Carbon::parse($property->lelangSchedule->tanggal)->translatedFormat('l, d F Y') : '-' }}"
                               class="w-full bg-yellow-100 border border-yellow-300 rounded-lg px-3 py-2 text-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Lokasi Lelang</label>
                        <input type="text" value="{{ $property->lelangSchedule->lokasi ?? '-' }}"
                               class="w-full bg-yellow-100 border border-yellow-300 rounded-lg px-3 py-2 text-sm" readonly>
                    </div>
                </div>
            </div>

            <!-- Contact Person -->
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Person</h3>
                <div class="space-y-4">
                    @forelse($property->contactPersons as $cp)
                        <div class="border border-yellow-300 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <span class="text-gray-900 font-semibold">{{ $cp->nama }}</span>
                            </div>
                            <div class="text-gray-700 font-medium">{{ $cp->no_hp }}</div>
                        </div>
                    @empty
                        <div class="border border-yellow-300 rounded-lg p-4">
                            <div class="text-gray-400">Tidak ada kontak</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-100 pt-8 pb-4 mt-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8 pb-4">
            <!-- Nama Aplikasi -->
            <div>
                <h2 class="text-xl font-bold mb-1">Katalog Lelang Properti</h2>
                <p class="text-gray-300 text-sm">Platform pencarian dan informasi lelang properti terbaik.</p>
            </div>
            <!-- Kontak -->
            <div>
                <h2 class="text-xl font-bold mb-1">Kontak</h2>
                <p class="text-gray-300 text-sm">Email: info@kataloglelang.id</p>
                <p class="text-gray-300 text-sm">Telepon: (021) 9876-5432</p>
            </div>
        </div>
        <hr class="border-gray-700 my-2">
        <div class="text-center text-xs text-gray-400 pt-2">
            © 2025 Katalog Lelang Properti. Hak Cipta Dilindungi.
        </div>
    </div>
</footer>

<!-- Modal: Keterangan Kondisi -->
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
                        <span class="text-gray-600">= Sangat Baik</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">BA</span>
                        <span class="text-gray-600">= Baik</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">CU</span>
                        <span class="text-gray-600">= Cukup</span>
                    </div>
                    <div class="flex">
                        <span class="font-bold text-gray-700 w-12">RB</span>
                        <span class="text-gray-600">= Rusak Berat</span>
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
    // Initialize thumbnail swiper
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

    // Initialize main swiper
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
                        thumb.classList.remove('border-transparent');
                    } else {
                        thumb.classList.remove('!border-red-500');
                        thumb.classList.add('border-transparent');
                    }
                });
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const firstThumbnail = document.querySelector('.mySwiperThumbs .swiper-slide:first-child img');
        if (firstThumbnail) {
            firstThumbnail.classList.add('!border-red-500');
            firstThumbnail.classList.remove('border-transparent');
        }
    });

    function copyShareLink() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
            const tooltip = document.getElementById('share-tooltip');
            if (tooltip) {
                tooltip.textContent = 'Tautan disalin!';
                tooltip.classList.add('opacity-100');
                setTimeout(() => {
                    tooltip.textContent = 'Salin tautan ke clipboard';
                    tooltip.classList.remove('opacity-100');
                }, 1500);
            }
        });
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
