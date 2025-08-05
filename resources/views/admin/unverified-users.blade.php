<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi User</title>
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
        /* Reset dan base styling */
        * {
            box-sizing: border-box;
        }

        body {
            background: #f9fafb !important;
            position: relative;
            font-family: 'Open Sans', sans-serif !important;
            min-height: 100vh;
            padding-bottom: 200px;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
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
            padding: 20px 0;
        }
        @media (min-width: 640px) {
            .main-container {
                padding: 32px 0;
            }
        }

        .form-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 18px;
            margin-bottom: 18px;
        }
        @media (min-width: 640px) {
            .form-section {
                padding: 24px;
                margin-bottom: 24px;
            }
        }

        .btn-success {
            background: #16a34a;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 11px;
        }
        @media (min-width: 640px) {
            .btn-success {
                padding: 6px 12px;
                font-size: 13px;
            }
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
            padding: 12px 8px !important;
            text-align: left !important;
            font-weight: 600 !important;
            color: #374151 !important;
            text-transform: uppercase !important;
            font-size: 0.65rem !important;
            letter-spacing: 0.05em !important;
            border-bottom: 2px solid #e5e7eb !important;
        }
        @media (min-width: 640px) {
            .table-container th {
                padding: 20px !important;
                font-size: 0.75rem !important;
            }
        }

        .table-container td {
            padding: 12px 8px !important;
            border-bottom: 1px solid rgba(229, 231, 235, 0.5) !important;
            font-size: 13px;
        }
        @media (min-width: 640px) {
            .table-container td {
                padding: 20px !important;
                font-size: 14px;
            }
        }

        .table-row:hover {
            background: rgba(248, 250, 252, 0.7) !important;
            transition: all 0.2s ease;
        }

        .avatar {
            width: 40px;
            height: 40px;
        }
        @media (min-width: 640px) {
            .avatar {
                width: 48px;
                height: 48px;
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
<body x-data="{ mobileMenuOpen: false }">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/jalan%20setapak%20gang%20rumah%20yang%20syahdu.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="border-b border-gray-100 sticky top-0 z-10" style="background: linear-gradient(135deg, #0f766e 0%, #06b6d4 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="/images/logo-ACR.png" alt="Logo ACR" class="h-10 sm:h-12 w-auto mr-2 sm:mr-4 cursor-pointer hover:opacity-80 transition-opacity" style="max-height:48px;">
                    </a>
                    <div class="flex">
                        <div class="hidden space-x-4 sm:space-x-8 sm:-my-px sm:ms-6 lg:ms-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-white text-white text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                Admin Dashboard
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
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-white bg-opacity-20">
                    Admin Dashboard
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
        <div class="max-w-6xl mx-auto px-3 sm:px-6">
            <!-- Header Section -->
            <div class="header-section">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Verifikasi User</h1>
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
