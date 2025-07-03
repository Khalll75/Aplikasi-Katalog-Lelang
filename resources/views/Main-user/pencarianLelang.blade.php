<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing - Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
<!-- Header -->
<header class="bg-red-900 text-white py-4 fixed top-0 left-0 w-full z-50 shadow">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold hover:underline">Beranda</a>
        <button class="bg-white text-red-900 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition-colors">
            Contact Us
        </button>
    </div>
</header>

<div class="container mx-auto px-4 py-6 pt-24">
    <!-- Search and Filter Section -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">

        <!-- Sidebar Filters -->
        <div class="lg:col-span-1">
            <!-- Kategori Lot Lelang -->
            <div class="bg-white border-2 border-red-200 rounded-lg p-4 mb-6">
                <h3 class="font-semibold mb-4 text-gray-800">Kategori Lot Lelang</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">APARTEMEN</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">BANGUNAN</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">GUDANG</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">KAVELING</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">KENDARAAN</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">PETERNAKAN</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">PERTANIAN</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">RUMAH TINGGAL</span>
                    </label>
                </div>
            </div>

            <!-- Harga -->
            <div class="bg-white border-2 border-red-200 rounded-lg p-4">
                <h3 class="font-semibold mb-4 text-gray-800">Harga</h3>
                <div class="grid grid-cols-[1fr_auto_1fr] gap-2 items-center">
                    <input type="text" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
                    <span class="text-gray-500 text-lg">—</span>
                    <input type="text" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Search Bar and Buttons -->
            <div class="flex flex-wrap items-center gap-4 mb-6">
                <div class="flex-1 min-w-0">
                    <input type="search" placeholder="Cari lelang..."
                           class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                </div>
                <button class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-lg font-medium hover:bg-yellow-500 transition-colors">
                    Cari Lelang
                </button>
                <button id="resetFilterBtn" class="bg-gray-400 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-500 transition-colors">
                    Reset Filter
                </button>
            </div>

            <!-- Filter Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Spesifikasi Properti -->
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h3 class="font-semibold mb-4 text-gray-800">Spesifikasi Properti</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Luas Tanah (M²)</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="text" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                <input type="text" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Luas Bangunan (M²)</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="text" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                <input type="text" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Tidur</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Daya Listrik</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Mandi</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sumber Air</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lokasi and Kondisi -->
                <div class="space-y-6">
                    <!-- Lokasi -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold mb-4 text-gray-800">Lokasi</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                    <option>Pilih...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Kondisi -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold mb-4 text-gray-800 flex items-center">
                            Kondisi
                            <button type="button" id="conditionInfoBtn"
                                class="ml-2 w-6 h-6 flex items-center justify-center bg-red-500 text-white text-xs font-bold rounded hover:bg-red-600 focus:outline-none transition-colors"
                                title="Info tentang kondisi">
                                ?
                            </button>
                        </h3>
                        <div class="grid grid-cols-4 gap-y-2 gap-x-8 text-lg">
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>L</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>K</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>AP</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>SH</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>AJB</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>TK</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>TP</span></label>
                            <label class="flex items-center"><input type="checkbox" class="mr-2"><span>BR</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Property Cards -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Image Placeholder</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Property Title 1</h4>
                <p class="text-gray-600 text-sm mb-2">Location Details</p>
                <p class="text-red-600 font-bold">Rp 0,000,000</p>
                <div class="mt-3 flex justify-between text-xs text-gray-500">
                    <span>0 bed</span>
                    <span>0 bath</span>
                    <span>0 m²</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Image Placeholder</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Property Title 2</h4>
                <p class="text-gray-600 text-sm mb-2">Location Details</p>
                <p class="text-red-600 font-bold">Rp 0,000,000</p>
                <div class="mt-3 flex justify-between text-xs text-gray-500">
                    <span>0 bed</span>
                    <span>0 bath</span>
                    <span>0 m²</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Image Placeholder</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Property Title 3</h4>
                <p class="text-gray-600 text-sm mb-2">Location Details</p>
                <p class="text-red-600 font-bold">Rp 0,000,000</p>
                <div class="mt-3 flex justify-between text-xs text-gray-500">
                    <span>0 bed</span>
                    <span>0 bath</span>
                    <span>0 m²</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Image Placeholder</span>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Property Title 4</h4>
                <p class="text-gray-600 text-sm mb-2">Location Details</p>
                <p class="text-red-600 font-bold">Rp 0,000,000</p>
                <div class="mt-3 flex justify-between text-xs text-gray-500">
                    <span>0 bed</span>
                    <span>0 bath</span>
                    <span>0 m²</span>
                </div>
            </div>
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
<footer class="bg-red-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Description -->
            <div class="md:col-span-1">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-full mr-2"></div>
                    <span class="font-bold text-lg">logoipsum</span>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="flex space-x-3 mt-4">
                    <a href="#" class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-blue-400 rounded flex items-center justify-center hover:bg-blue-500 transition-colors">
                        <i class="fab fa-twitter text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-pink-600 rounded flex items-center justify-center hover:bg-pink-700 transition-colors">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-blue-800 rounded flex items-center justify-center hover:bg-blue-900 transition-colors">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </a>
                </div>
                <p class="text-xs text-gray-400 mt-4">© 2021 - All rights reserved.</p>
            </div>

            <!-- Quick Links Column 1 -->
            <div>
                <h4 class="font-semibold mb-4">Take a tour</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Features</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Partners</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Product</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Support</a></li>
                </ul>
            </div>

            <!-- Quick Links Column 2 -->
            <div>
                <h4 class="font-semibold mb-4">Our Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Agents</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Media</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="font-semibold mb-4">Subscribe</h4>
                <p class="text-sm text-gray-300 mb-4">Subscribe to get latest property, blog, news from us</p>
                <div class="flex">
                    <input type="email" placeholder="Enter your email"
                           class="flex-1 px-3 py-2 rounded-l-lg border-0 text-gray-800 text-sm focus:outline-none">
                    <button class="bg-blue-600 px-4 py-2 rounded-r-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Reset Filter functionality
    document.getElementById('resetFilterBtn').addEventListener('click', function() {
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
        document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        document.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
        document.querySelectorAll('input[type="search"]').forEach(input => input.value = '');
    });

    // Modal functionality
    const modal = document.getElementById('conditionModal');
    const openBtn = document.getElementById('conditionInfoBtn');
    const closeBtn = document.getElementById('closeModal');

    // Open modal
    openBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    });

    // Close modal
    closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    });

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
</script>

</body>
</html>