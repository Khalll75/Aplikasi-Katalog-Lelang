<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properti Area Jambi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    <div class="relative">
                        <input type="text"
                               placeholder="Search..."
                               class="w-full px-4 py-3 pl-10 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
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

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Category Item 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 12 2-2m0 0 7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Item 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Item 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Item 4 -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow text-center">
                        <div class="w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                            </svg>
                        </div>
                    </div>
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

                <!-- Horizontal Scrollable Container -->
                <div class="overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-6 pb-4" style="width: max-content;">
                        <!-- Property Card 1 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80" onclick="window.location.href='/properties/{property}'">
                            <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Modern House</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 2.5M</span>
                                    <span class="text-sm text-gray-500">3 bed • 2 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 2 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 4.2M</span>
                                    <span class="text-sm text-gray-500">5 bed • 3 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 3 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-pink-400 to-pink-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 1.8M</span>
                                    <span class="text-sm text-gray-500">2 bed • 1 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 4 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 3.1M</span>
                                    <span class="text-sm text-gray-500">4 bed • 2 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 5 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-green-400 to-green-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 1.2M</span>
                                    <span class="text-sm text-gray-500">1 bed • 1 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 6 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 2.8M</span>
                                    <span class="text-sm text-gray-500">3 bed • 2 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 7 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-red-400 to-red-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 6.5M</span>
                                    <span class="text-sm text-gray-500">4 bed • 3 bath</span>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 8 -->
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-lg transition-shadow flex-shrink-0 w-80">
                            <div class="h-48 bg-gradient-to-br from-indigo-400 to-indigo-600"></div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-2">Property</h3>
                                <p class="text-gray-600 text-sm">Deskripsi</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Rp 3.7M</span>
                                    <span class="text-sm text-gray-500">4 bed • 3 bath</span>
                                </div>
                            </div>
                        </div>
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
            <section class="mb-16">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                    <div class="h-96 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center">
                        <p class="text-gray-600 font-medium">Map Location</p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="bg-red-900 text-white py-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-white rounded-full mr-2"></div>
                            <span class="font-bold text-lg">logoipsum</span>
                        </div>
                        <p class="text-red-200 text-sm mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.763-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-8 h-8 bg-blue-800 rounded-full flex items-center justify-center hover:bg-blue-900 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Take a tour -->
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Take a tour</h3>
                        <ul class="space-y-2 text-red-200">
                            <li><a href="#" class="hover:text-white transition-colors">Features</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Partners</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Pricing</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Product</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Support</a></li>
                        </ul>
                    </div>

                    <!-- Our Company -->
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Our Company</h3>
                        <ul class="space-y-2 text-red-200">
                            <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Agents</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Media</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Subscribe -->
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Subscribe</h3>
                        <p class="text-red-200 text-sm mb-4">Subscribe to get latest insights about real estate market updates daily from us.</p>
                        <div class="flex">
                            <input type="email" placeholder="Email address" class="flex-1 px-3 py-2 rounded-l-lg text-gray-900 focus:outline-none">
                            <button class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-r-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="border-red-800 my-8">

                <div class="text-center text-red-200 text-sm">
                    <p>&copy; 2024. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>