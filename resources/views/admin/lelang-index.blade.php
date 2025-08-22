<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lelang</title>
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
                            sans: ['Open Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
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
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body, p, span, label, td, th, input, button, a, div {
            font-family: 'Open Sans', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .adlam-heading {
            font-family: 'ADLaM Display', cursive !important;
        }
        body {
            background: #f8fafb !important;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
            position: relative;
            z-index: 1;
        }
        @media (min-width: 640px) {
            .main-container {
                padding: 2rem 1rem;
            }
        }
        .table-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-top: 1rem;
        }
        @media (min-width: 640px) {
            .table-container {
                margin-top: 2rem;
            }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        @media (min-width: 640px) {
            table {
                font-size: 16px;
            }
        }
        th, td {
            padding: 12px 8px;
            text-align: left;
        }
        @media (min-width: 640px) {
            th, td {
                padding: 16px;
            }
        }
        th {
            background: #f8fafc;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            font-size: 0.75rem;
            border-bottom: 2px solid #e5e7eb;
        }
        @media (min-width: 640px) {
            th {
                font-size: 0.85rem;
            }
        }
        tr {
            border-bottom: 1px solid #e5e7eb;
        }
        tr:last-child {
            border-bottom: none;
        }
        .action-btn {
            background: #3b82f6;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 12px;
        }
        @media (min-width: 640px) {
            .action-btn {
                padding: 8px 16px;
                font-size: 13px;
            }
        }
        .action-btn:hover {
            background: #2563eb;
        }
        .header-section {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.2);
        }
        @media (min-width: 640px) {
            .header-section {
                padding: 32px;
                margin-bottom: 32px;
            }
        }
        .header-section h1 {
            color: #1f2937;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        @media (min-width: 640px) {
            .header-section h1 {
                font-size: 2rem;
            }
        }
        .header-section p {
            color: #6b7280;
            font-size: 0.9rem;
            margin: 0;
        }
        @media (min-width: 640px) {
            .header-section p {
                font-size: 1.125rem;
            }
        }
        /* Mobile table optimization */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .table-container::after {
                content: "Swipe untuk melihat lebih →";
                position: absolute;
                bottom: 10px;
                right: 15px;
                font-size: 11px;
                color: #9ca3af;
                background: rgba(255,255,255,0.9);
                padding: 2px 6px;
                border-radius: 4px;
                pointer-events: none;
            }
        }
        body {
            min-height: 100vh;
            position: relative;
            padding-bottom: 200px;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false }">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/11bbcd55-51c3-4096-b89d-5d5e564c3703.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="border-b border-gray-100 sticky top-0 z-10" style="background: linear-gradient(135deg, #0f766e 0%, #06b6d4 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-10 sm:h-12 w-auto mr-2 sm:mr-4 cursor-pointer hover:opacity-80 transition-opacity" style="max-height:48px;">
                    </a>
                    <div class="flex">
                        <div class="hidden space-x-4 sm:space-x-8 sm:-my-px sm:ms-6 lg:ms-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:border-white hover:text-white focus:outline-none transition duration-150 ease-in-out">
                                Admin Dashboard
                            </a>
                            <a href="{{ route('admin.lelang.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-white text-white text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                Kelola Lelang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-white hover:text-gray-200 focus:outline-none focus:text-gray-200 p-2">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:flex items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-3 sm:px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center space-x-2 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" class="hidden sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-teal-800 bg-opacity-50">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-gray-200 hover:bg-white hover:bg-opacity-10">
                    Admin Dashboard
                </a>
                <a href="{{ route('admin.lelang.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-white bg-opacity-20">
                    Kelola Lelang
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-white hover:text-gray-200 hover:bg-white hover:bg-opacity-10">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="main-container">
        <div class="header-section">
            <h1>Kelola Lelang</h1>
            <p>Daftar semua lelang properti yang sudah diinput</p>
            <form method="GET" action="" class="flex gap-2 mt-6">
                <input type="text" name="q" placeholder="Cari kode aset, kategori, atau lokasi lelang..." value="{{ request('q') }}" class="border rounded px-3 py-2 w-full" />
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded font-semibold">Cari</button>
            </form>
        </div>
        <div class="table-container overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-center">Kode Aset</th>
                        <th class="text-center">Kategori Lot</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($properties as $property)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="text-lg font-medium text-gray-800 text-center">
                            {{ $property->kode_aset }}
                        </td>
                        <td class="text-lg font-medium text-gray-800 text-center">
                            {{ ucwords(str_replace('_', ' ', $property->kategori_lot)) }}
                        </td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.properties.edit', $property->id) }}" class="action-btn bg-yellow-500 hover:bg-yellow-600 inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m-7-7h14"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus properti ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn bg-red-500 hover:bg-red-600 inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-500 py-8">Belum ada data properti.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">
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
                {{ $properties->links('vendor.pagination.tailwind-custom') }}
            </div>
        </div>
    </div>
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
            // Optionally, you can force reload or redirect, but since this is already the target page, just alert is enough
        </script>
    @endif
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
</body>
</html>

