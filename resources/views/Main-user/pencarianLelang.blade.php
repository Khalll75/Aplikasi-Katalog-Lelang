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
    <form method="GET" action="{{ route('search') }}">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">

            <!-- Sidebar Filters -->
            <div class="lg:col-span-1">
                <!-- Kategori Lot Lelang -->
                <div class="bg-white border-2 border-red-200 rounded-lg p-4 mb-6">
                    <h3 class="font-semibold mb-4 text-gray-800">Kategori Lot Lelang</h3>
                    <div class="space-y-2">
                        @foreach(['rumah' => 'Rumah', 'ruko' => 'Ruko', 'tanah' => 'Tanah'] as $key => $label)
                            <label class="flex items-center">
                                <input type="radio" name="kategori_lot" value="{{ $key }}" class="mr-2"
                                    {{ request('kategori_lot') === $key ? 'checked' : '' }}>
                                <span class="text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Harga -->
                <div class="bg-white border-2 border-red-200 rounded-lg p-4">
                    <h3 class="font-semibold mb-4 text-gray-800">Harga</h3>
                    <div class="grid grid-cols-[1fr_auto_1fr] gap-2 items-center">
                        <input type="text" name="harga_min" value="{{ request('harga_min') }}" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
                        <span class="text-gray-500 text-lg">—</span>
                        <input type="text" name="harga_max" value="{{ request('harga_max') }}" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Search Bar and Buttons -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <div class="flex-1 min-w-0">
                        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari lelang..."
                               class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                    </div>
                    <button type="submit" class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-lg font-medium hover:bg-yellow-500 transition-colors">
                        Cari Lelang
                    </button>
                    <a href="{{ route('search') }}" id="resetFilterBtn" class="bg-gray-400 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-500 transition-colors">
                        Reset Filter
                    </a>
                </div>

                <!-- Filter Sections (unchanged, keep your existing code for other filters) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Spesifikasi Properti -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold mb-4 text-gray-800">Spesifikasi Properti</h3>
                        <div class="space-y-4">
                            <!-- Luas Tanah -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Luas Tanah (M²)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="text" name="luas_tanah_min" value="{{ request('luas_tanah_min') }}" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                    <input type="text" name="luas_tanah_max" value="{{ request('luas_tanah_max') }}" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                            </div>
                            <!-- Luas Bangunan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Luas Bangunan (M²)</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="text" name="luas_bangunan_min" value="{{ request('luas_bangunan_min') }}" placeholder="Minimum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                    <input type="text" name="luas_bangunan_max" value="{{ request('luas_bangunan_max') }}" placeholder="Maximum" class="border border-gray-300 rounded px-3 py-2 text-sm">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Kamar Tidur -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Tidur</label>
                                    <select name="kamar_tidur" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                        <option value="">Pilih...</option>
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}" {{ request('kamar_tidur') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <!-- Daya Listrik -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Daya Listrik</label>
                                    <select name="listrik" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                        <option value="">Pilih...</option>
                                        @foreach(['450', '900', '1300', '2200', '3500', '4400', '5500', '6600', 'lebih'] as $val)
                                            <option value="{{ $val }}" {{ request('listrik') == $val ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Kamar Mandi -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kamar Mandi</label>
                                    <select name="kamar_mandi" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                        <option value="">Pilih...</option>
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{ $i }}" {{ request('kamar_mandi') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <!-- Sumber Air -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Sumber Air</label>
                                    <select name="air" class="w-full border border-gray-300 rounded px-3 py-2 text-sm bg-gray-100">
                                        <option value="">Pilih...</option>
                                        @foreach(['PDAM', 'Sumur', 'Lainnya'] as $val)
                                            <option value="{{ $val }}" {{ request('air') == $val ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
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
                                <!-- Kota/Kabupaten -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten</label>
                                    <input type="text" name="kota" value="{{ request('kota') }}" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
                                </div>
                                <!-- Kecamatan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                                    <input type="text" name="kecamatan" value="{{ request('kecamatan') }}" class="border border-gray-300 rounded px-3 py-2 text-sm w-full">
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
                                @foreach(['L','K','AP','SH','AJB','TK','TP','BR'] as $kondisi)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="kondisi[]" value="{{ $kondisi }}" {{ is_array(request('kondisi')) && in_array($kondisi, request('kondisi')) ? 'checked' : '' }} class="mr-2">
                                        <span>{{ $kondisi }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Property Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @forelse($query as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow block">
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    @php
                        $mainImage = $property->images->where('is_main', true)->first() ?? $property->images->first();
                    @endphp
                    @if($mainImage)
                        <img src="{{ asset('storage/'.$mainImage->image_url) }}" alt="{{ $property->nama }}" class="object-cover w-full h-full">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-gray-800 mb-2">{{ $property->nama }}</h4>
                    <p class="text-gray-600 text-sm mb-2">{{ $property->alamat }}</p>
                    <p class="text-red-600 font-bold">
                        @if($property->lelangSchedule)
                            Rp {{ number_format($property->lelangSchedule->harga_limit_awal, 0, ',', '.') }} - Rp {{ number_format($property->lelangSchedule->harga_limit_akhir, 0, ',', '.') }}
                        @else
                            <span class="text-gray-400">Harga belum tersedia</span>
                        @endif
                    </p>
                    <div class="mt-3 flex justify-between text-xs text-gray-500">
                        <span>{{ $property->kamar_tidur ?? '-' }} bed</span>
                        <span>{{ $property->kamar_mandi ?? '-' }} bath</span>
                        <span>{{ $property->luas_tanah ?? '-' }} m²</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-4 text-center text-gray-500 py-12">Tidak ada properti ditemukan.</div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div>
        {{ $query->withQueryString()->links() }}
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
