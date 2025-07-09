<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properti Area Jambi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Hide scrollbar for horizontal scroll */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;  /* Safari and Chrome */
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-red-800 text-white py-4 sticky top-0 z-50 shadow-md">
            <div class="container mx-auto px-4 flex justify-end">
                <button class="bg-white text-red-800 px-6 py-2 rounded text-base font-semibold hover:bg-gray-100 transition-colors shadow">
                    Contact Us
                </button>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative bg-gray-900 text-white min-h-96">
            <!-- Background overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>

            <!-- Hero Content -->
            <div class="relative container mx-auto px-4 py-20 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-8">
                    <span class="text-yellow-400">PROPERTI AREA</span><br>
                    <span class="text-yellow-400">JAMBI</span>
                </h1>

                <!-- Search Bar -->
                <div class="max-w-md mx-auto">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="relative">
                            <input type="text"
                                   name="q"
                                   value="{{ request('q') }}"
                                   placeholder="Search..."
                                   class="w-full px-4 py-3 pl-10 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">

            <!-- Kategori Lot Lelang Section -->
            <section class="mb-16">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Kategori Lot Lelang</h2>
                    <a href="/search" class="text-red-600 hover:text-red-700 font-medium flex items-center">
                        See all
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Rumah -->
                    <a href="{{ route('search', ['kategori_lot' => 'rumah']) }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center block">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-house text-2xl text-red-700"></i>
                        </div>
                        <div class="font-semibold text-gray-800">Rumah</div>
                    </a>
                    <!-- Ruko -->
                    <a href="{{ route('search', ['kategori_lot' => 'ruko']) }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center block">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-store text-2xl text-yellow-600"></i>
                        </div>
                        <div class="font-semibold text-gray-800">Ruko</div>
                    </a>
                    <!-- Tanah -->
                    <a href="{{ route('search', ['kategori_lot' => 'tanah']) }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center block">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-mountain text-2xl text-green-700"></i>
                        </div>
                        <div class="font-semibold text-gray-800">Tanah</div>
                    </a>
                </div>
            </section>

            <!-- Rekomendasi Properti Baru Section -->
            <section class="mb-16">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Rekomendasi Properti Baru</h2>
                    <a href="/search" class="text-red-600 hover:text-red-700 font-medium flex items-center">
                        See all
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-6 pb-4" style="width: max-content;">
                        @forelse($properties as $property)
                            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80 cursor-pointer"
                                 onclick="window.location.href='{{ route('properties.show', $property->id) }}'"
                                 role="button" aria-label="Lihat detail properti">
                                @php
                                    $mainImage = $property->images->where('is_main', true)->first() ?? $property->images->first();
                                    $lelang = $property->lelangSchedule;
                                    $kategori = ucfirst($property->kategori_lot ?? 'Properti');
                                    $status = $lelang && $lelang->is_selesai ? 'Lelang Selesai' : 'Tersedia';
                                @endphp
                                <div class="h-48 bg-gray-200 flex items-center justify-center">
                                    @if($mainImage)
                                        <img src="{{ asset('storage/'.$mainImage->image_url) }}" alt="{{ $property->nama }}" class="object-cover w-full h-full">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <span class="inline-block {{ $status == 'Tersedia' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-500' }} text-xs px-2 py-1 rounded-full mb-2">{{ $status }}</span>
                                    <span class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full mb-2 ml-2">{{ $kategori }}</span>
                                    <div class="text-xs text-gray-500 mb-1">Kode Properti: <span class="font-semibold">{{ $property->kode_aset }}</span></div>
                                    <div class="text-gray-900 font-bold text-lg mb-2">
                                        @if($lelang)
                                            Rp {{ number_format($lelang->harga_limit_akhir, 0, ',', '.') }}
                                        @else
                                            <span class="text-gray-400">Harga belum tersedia</span>
                                        @endif
                                    </div>
                                    <div class="text-gray-600 text-sm truncate">{{ $property->alamat }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500">Belum ada properti.</div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="mb-16">
                <div class="bg-white rounded-3xl shadow-lg border border-yellow-300 p-8 md:p-12 max-w-5xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-green-900 mb-8 text-center">
                        Membeli Asset Agunan Pembiayaan Bank
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- 1 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-blue-100 border-4 border-blue-400 flex items-center justify-center text-blue-700 font-bold text-lg">01</div>
                            </div>
                            <div>
                                <div class="font-semibold text-blue-900">Aset Variatif</div>
                                <div class="text-gray-700 text-sm">(Tanah, Rumah dan Ruko)</div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-red-100 border-4 border-red-400 flex items-center justify-center text-red-700 font-bold text-lg">02</div>
                            </div>
                            <div>
                                <div class="font-semibold text-red-900">Harga dibawah pasaran</div>
                                <div class="text-gray-700 text-sm">dan lokasi jaminan strategis</div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-purple-100 border-4 border-purple-400 flex items-center justify-center text-purple-700 font-bold text-lg">03</div>
                            </div>
                            <div>
                                <div class="font-semibold text-purple-900">Dibantu pengelola</div>
                                <div class="text-gray-700 text-sm">untuk survey terlebih dahulu</div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-green-100 border-4 border-green-400 flex items-center justify-center text-green-700 font-bold text-lg">04</div>
                            </div>
                            <div>
                                <div class="font-semibold text-green-900">Proses lelang mudah dan cepat</div>
                                <div class="text-gray-700 text-sm">(Online)</div>
                            </div>
                        </div>
                        <!-- 5 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-blue-100 border-4 border-blue-400 flex items-center justify-center text-blue-700 font-bold text-lg">05</div>
                            </div>
                            <div>
                                <div class="font-semibold text-blue-900">Bisa langsung proses Pembiayaan*</div>
                                <div class="text-gray-700 text-xs">*SnK Berlaku</div>
                            </div>
                        </div>
                        <!-- 6 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-purple-100 border-4 border-purple-400 flex items-center justify-center text-purple-700 font-bold text-lg">06</div>
                            </div>
                            <div>
                                <div class="font-semibold text-purple-900">Dokumen kepemilikan lebih terjamin</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Tata Cara Mengikuti Lelang E-Auction Section -->
            <section class="mb-16">
                <div class="bg-white rounded-3xl shadow-lg border border-yellow-300 p-8 md:p-12 max-w-5xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-green-900 mb-8 text-center">
                        TATA CARA MENGIKUTI LELANG E-AUCTION <span class="text-yellow-500">(LELANG.GO.ID)</span>
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <!-- Left column: Steps 1, 3, 5, 7 -->
                        <div class="space-y-8">
                            <!-- Step 1 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v10"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Peminat Sign in/Sign Up di lelang.go.id</div>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Setor Uang Jaminan Lelang</div>
                                </div>
                            </div>
                            <!-- Step 5 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 17l-4 4m0 0l-4-4m4 4V3"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Pemenang Lelang</div>
                                </div>
                            </div>
                            <!-- Step 7 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Pelunasan Max H+5</div>
                                </div>
                            </div>
                        </div>
                        <!-- Right column: Steps 2, 4, 6, 8 -->
                        <div class="space-y-8">
                            <!-- Step 2 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><text x="12" y="16" text-anchor="middle" font-size="8" fill="currentColor">Activation</text></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Peserta Mendapatkan kode aktivasi</div>
                                </div>
                            </div>
                            <!-- Step 4 -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h8v8H8z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Peserta Memilih Objek Agunan Lelang</div>
                                </div>
                            </div>
                            <!-- Step 6 (conditional) -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Peserta datang ke KPKNL untuk mengambil uang setoran jaminan tanpa dikenakan potongan (jika tidak menang)</div>
                                </div>
                            </div>
                            <!-- Step 8 (if win) -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v10"/><rect x="4" y="4" width="16" height="16" rx="2"/></svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">Terbit Risalah Lelang & Pemenang datang ke Bank untuk mengambil Sertifikat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section class="mb-24">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                    <div class="h-96 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center">
                        <p class="text-gray-600 font-medium">Map Location</p>
                    </div>
                </div>
            </section>
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
    </div>
</body>
</html>
