<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User Pendaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            background: #f8fafb !important;
            font-family: 'Inter', -apple-system,
            BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
            position: relative;
            z-index: 1;
        }
        .table-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px
            rgba(0,0,0,0.08);
            overflow: hidden;
            margin-top: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 16px;
            text-align: left;
        }
        th {
            background: #f8fafc;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid #e5e7eb;
        }
        tr {
            border-bottom: 1px solid #e5e7eb;
        }
        tr:last-child {
            border-bottom: none;
        }
        .header-section {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px
            rgba(0,0,0,0.08);
            padding: 32px;
            margin-bottom: 32px;
            border: 1px solid
            rgba(255,255,255,0.2);
        }
        .header-section h1 {
            color: #1f2937;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .header-section p {
            color: #6b7280;
            font-size: 1.125rem;
            margin: 0;
        }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false }" class="min-h-screen flex flex-col">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/11bbcd55-51c3-4096-b89d-5d5e564c3703.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="border-b border-gray-100 sticky top-0 z-10" style="background: linear-gradient(to right, #3BA798, #ffffff);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-12 w-auto mr-4" style="max-height:48px;">
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">
                                Admin Dashboard
                            </a>
                            <a href="{{ route('admin.daftar-users') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-green-600 text-green-700 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                Daftar User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-container flex-1">
        <div class="header-section">
            <h1>Daftar User yang Mendaftar</h1>
            <p>List semua user yang telah mendaftar melalui form pendaftaran.</p>
        </div>
        <div class="table-container overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">No HP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="text-lg font-medium text-gray-800 text-center">{{ $loop->iteration }}</td>
                        <td class="text-lg font-medium text-gray-800 text-center">{{ $user->name }}</td>
                        <td class="text-lg font-medium text-gray-800 text-center">{{ $user->phone }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-8">Belum ada user yang mendaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Dashboard</a>
        </div>
    </div>
    <footer class="bg-gray-900 bg-opacity-90 text-gray-100 pt-8 pb-4 mt-12 w-full" style="flex-shrink: 0;">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8 pb-4">
                <div>
                    <h2 class="text-xl font-bold mb-1">Katalog Lelang Properti</h2>
                    <p class="text-gray-300 text-sm">Platform pencarian dan informasi lelang properti terbaik.</p>
                </div>
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
</body>
</html>
