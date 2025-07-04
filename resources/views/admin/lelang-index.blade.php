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
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <svg class="block h-9 w-auto text-green-700" fill="none" viewBox="0 0 24 24">
                                <path d="M3 12L12 3L21 12" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 10V21H19V10" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">
                            Admin Dashboard
                        </a>
                        <a href="{{ route('admin.lelang.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-green-600 text-green-700 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                            Kelola Lelang
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen"
                                @keydown.escape="dropdownOpen = false"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150"
                                type="button">
                            <div>{{ Auth::user()->name ?? 'Admin User' }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                     :class="{ 'rotate-180': dropdownOpen }"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <div x-show="dropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click.away="dropdownOpen = false"
                             class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50"
                             style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </a>
                            <hr class="my-1 border-gray-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150 ease-in-out">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
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
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($lelangs as $lelang)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="text-lg font-medium text-gray-800 text-center">
                            {{ $lelang->property->kode_aset ?? '-' }}
                        </td>
                        <td>
                            @if($lelang->property)
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.properties.edit', $lelang->property->id) }}" class="action-btn bg-yellow-500 hover:bg-yellow-600 inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m-7-7h14"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.properties.destroy', $lelang->property->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus properti ini?')" class="inline">
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
                            @else
                            <div class="text-center text-gray-400">-</div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-500 py-8">Belum ada data lelang.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $lelangs->links() }}
            </div>
        </div>
    </div>
</body>
</html>
