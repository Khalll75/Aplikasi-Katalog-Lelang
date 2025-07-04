<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        /* Reset dan base styling */
        * {
            box-sizing: border-box;
        }

        body {
            background: #f9fafb !important;
            position: relative;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        /* Background Image */
        body::before {
            content: '';
            position: fixed;
            z-index: -1;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;
            filter: blur(8px);
            opacity: 0.3;
        }

        /* Main container override */
        .main-container {
            background: #fff;
            min-height: 100vh;
            padding: 32px 0;
        }

        .form-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 24px;
            margin-bottom: 24px;
        }

        .btn-success {
            background: #16a34a;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 13px;
        }

        .btn-success:hover {
            background: #15803d;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th {
            background: rgba(248, 250, 252, 0.8) !important;
            padding: 20px !important;
            text-align: left !important;
            font-weight: 600 !important;
            color: #374151 !important;
            text-transform: uppercase !important;
            font-size: 0.75rem !important;
            letter-spacing: 0.05em !important;
            border-bottom: 2px solid #e5e7eb !important;
        }

        .table-container td {
            padding: 20px !important;
            border-bottom: 1px solid rgba(229, 231, 235, 0.5) !important;
        }

        .table-row:hover {
            background: rgba(248, 250, 252, 0.7) !important;
            transition: all 0.2s ease;
        }

        .avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }

        .user-name {
            font-size: 16px !important;
            font-weight: 600 !important;
            color: #1f2937 !important;
            margin: 0 !important;
        }

        .user-email {
            font-size: 14px !important;
            color: #6b7280 !important;
            margin: 0 !important;
        }

        .success-alert {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border: 2px solid #16a34a;
            color: #166534;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 32px;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.15);
            backdrop-filter: blur(10px);
        }

        .success-alert svg {
            width: 20px;
            height: 20px;
        }

        .empty-state {
            text-align: center;
            padding: 64px 32px;
            color: #6b7280;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            color: #d1d5db;
        }

        .empty-state p:first-of-type {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #374151 !important;
            margin-bottom: 8px !important;
        }

        .empty-state p:last-of-type {
            font-size: 14px !important;
            color: #6b7280 !important;
            margin: 0 !important;
        }

        .header-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 32px;
            margin-bottom: 32px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-section h1 {
            color: #1f2937 !important;
            font-size: 2.5rem !important;
            font-weight: 700 !important;
            margin-bottom: 8px !important;
        }

        .header-section p {
            color: #6b7280 !important;
            font-size: 1.125rem !important;
            margin: 0 !important;
        }

        .header-sticky {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 18px 0 12px 0;
        }
        .header-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px;
        }
        .header-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header-logo svg {
            width: 32px;
            height: 32px;
        }
        .header-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
        }
        .header-user {
            font-size: 1rem;
            color: #374151;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <svg class="block h-9 w-auto text-green-700" fill="none" viewBox="0 0 24 24"><path d="M3 12L12 3L21 12" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 10V21H19V10" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">
                            Admin Dashboard
                        </a>
                    </div>
                </div>
                <!-- Settings Dropdown -->
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
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div id="mobile-menu" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 hover:border-green-600 hover:text-green-700 focus:outline-none transition duration-150 ease-in-out">Admin Dashboard</a>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name ?? 'Admin User' }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-container">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Header Section -->
            <div class="header-section">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi User</h1>
                <p class="text-lg text-gray-600">Kelola dan verifikasi user yang belum diaktifkan</p>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
                <div class="success-alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Success Alert for JS -->
            <div class="success-alert" id="successAlert" style="display: none;">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span id="successMessage">User berhasil diverifikasi!</span>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <table class="min-w-full">
                    <thead style="background: #f8fafc; border-bottom: 2px solid #e5e7eb;">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        @forelse($users as $user)
                            <tr class="table-row border-b border-gray-100">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="avatar">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="user-email">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge">
                                        Pending
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.users.verify', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin memverifikasi {{ $user->name }}?')" class="inline">
                                        @csrf
                                        <button type="submit" class="btn-success">
                                            Verifikasi
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        <p class="text-base font-medium">Tidak ada user yang menunggu verifikasi</p>
                                        <p class="text-sm text-gray-500 mt-2">Semua user telah diverifikasi atau belum ada pendaftaran baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success message after 5 seconds
        const successAlert = document.querySelector('.success-alert:not(#successAlert)');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'all 0.3s ease';
                successAlert.style.opacity = '0';
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 300);
            }, 5000);
        }

        // Enhanced form submission with loading state
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const button = this.querySelector('button[type="submit"]');
                if (button) {
                    setTimeout(() => {
                        button.disabled = true;
                        button.innerHTML = 'Memproses...';
                        button.style.opacity = '0.7';
                    }, 100);
                }
            });
        });
    </script>
</body>
</html>
