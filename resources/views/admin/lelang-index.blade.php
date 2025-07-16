<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lelang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body { background: #f8fafb !important; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; }
        .main-container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; position: relative; z-index: 1; }
        .table-container { background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); overflow: hidden; margin-top: 2rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 16px; text-align: left; }
        th { background: #f8fafc; font-weight: 700; color: #374151; text-transform: uppercase; font-size: 0.85rem; border-bottom: 2px solid #e5e7eb; }
        tr { border-bottom: 1px solid #e5e7eb; }
        tr:last-child { border-bottom: none; }
        .action-btn { background: #3b82f6; color: #fff; padding: 8px 16px; border-radius: 6px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; font-size: 13px; }
        .action-btn:hover { background: #2563eb; }
        .header-section { background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 32px; margin-bottom: 32px; border: 1px solid rgba(255,255,255,0.2); }
        .header-section h1 { color: #1f2937; font-size: 2rem; font-weight: 700; margin-bottom: 8px; }
        .header-section p { color: #6b7280; font-size: 1.125rem; margin: 0; }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false }">
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
                            <a href="{{ route('admin.lelang.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-green-600 text-green-700 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                Kelola Lelang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-container">
        <div class="header-section">
            <h1>Kelola Lelang</h1>
            <p>Daftar semua lelang properti yang sudah diinput</p>
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
                {{ $properties->links() }}
            </div>
        </div>
    </div>
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
            // Optionally, you can force reload or redirect, but since this is already the target page, just alert is enough
        </script>
    @endif
</body>
</html>
