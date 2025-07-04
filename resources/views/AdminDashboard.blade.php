<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: #f8fafb !important;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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
<body x-data="{ open: false }">
    <div style="position:fixed;z-index:0;top:0;left:0;width:100vw;height:100vh;background:url('/images/11bbcd55-51c3-4096-b89d-5d5e564c3703.jpg') center center/cover no-repeat;filter:blur(8px);opacity:0.5;pointer-events:none;"></div>
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-10" x-data="{ open: false }">
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
                <div class="hidden sm:flex sm:items-center sm:ms-6 relative" x-data="{ dropdownOpen: false }" @keydown.escape.window="dropdownOpen = false">
                    <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" type="button">
                        <div>{{ Auth::user()->name ?? 'Admin User' }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="dropdownOpen" x-transition @click.away="dropdownOpen = false" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</button>
                        </form>
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
        <div style="
            position:fixed;
            z-index:0;
            top:0;left:0;
            width:100vw;height:100vh;
            background:url('/images/11bbcd55-51c3-4096-b89d-5d5e564c3703.jpg') center center/cover no-repeat;
            filter:blur(8px);
            opacity:0.5;
            pointer-events:none;
        "></div>
        <x-slot name="header">
            <div class="header">
                <h1>Admin Dashboard</h1>
            </div>
        </x-slot>

        <div class="container">
            <div class="welcome">
                <h2>Selamat Datang, Admin!</h2>
                <p>Kelola properti Anda dengan mudah dan efisien</p>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Properti</div>
                </div>
            </div>

            <div class="actions">
                <h3>Aksi Utama</h3>
                <div class="action-grid">
                    <form action="{{ route('admin.properties.createStep1') }}" method="get" style="display:inline;">
                        <button type="submit" class="action-btn">
                            <svg class="action-icon" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                            </svg>
                            <span>Tambah Properti</span>
                        </button>
                    </form>
                    <a href="{{ route('admin.users.unverified') }}" class="action-btn">
                        <svg class="action-icon" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05C15.64 13.36 17 14.28 17 15.5V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                        <span>Verifikasi User</span>
                    </a>
                    <button class="action-btn">
                        <svg class="action-icon" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        </svg>
                        <span>Kelola Lelang</span>
                    </button>
                </div>
            </div>

            <div class="activity">
                <h3>Aktivitas Terbaru</h3>
                <div class="activity-item">
                    <div class="activity-content">
                        <div class="activity-dot green"></div>
                        <span class="activity-text">Properti "Rumah Minimalis Jl. Merdeka" berhasil ditambahkan</span>
                    </div>
                    <span class="activity-time">2 jam lalu</span>
                </div>
                <div class="activity-item">
                    <div class="activity-content">
                        <div class="activity-dot blue"></div>
                        <span class="activity-text">Status properti "Apartemen Central Park" diperbarui</span>
                    </div>
                    <span class="activity-time">5 jam lalu</span>
                </div>
                <div class="activity-item">
                    <div class="activity-content">
                        <div class="activity-dot yellow"></div>
                        <span class="activity-text">Foto properti "Villa Taman Sari" diunggah</span>
                    </div>
                    <span class="activity-time">1 hari lalu</span>
                </div>
            </div>
        </div>

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: #f8fafc;
                line-height: 1.6;
            }
            .header {
                background: white;
                border-bottom: 1px solid #e2e8f0;
                padding: 1rem 0;
                margin-bottom: 2rem;
            }
            .header h1 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #1e293b;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
                margin-top: 2.5rem;
                position: relative;
                z-index: 1;
            }
            .welcome {
                background: linear-gradient(135deg, #0f766e 0%, #06b6d4 100%);
                color: white;
                padding: 2rem;
                border-radius: 12px;
                margin-bottom: 2rem;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }
            .welcome h2 {
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }
            .welcome p {
                opacity: 0.9;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2rem;
            }
            .stat-card {
                background: white;
                padding: 1.5rem;
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                text-align: center;
                transition: transform 0.2s ease;
            }
            .stat-card:hover {
                transform: translateY(-2px);
            }
            .stat-card.available {
                background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);
                color: white;
            }
            .stat-card.rented {
                background: linear-gradient(135deg, #06b6d4 0%, #0ea5e9 100%);
                color: white;
            }
            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }
            .stat-label {
                font-size: 0.9rem;
                opacity: 0.8;
            }
            .actions {
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                margin-bottom: 2rem;
            }
            .actions h3 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #1e293b;
                margin-bottom: 1.5rem;
            }
            .action-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }
            .action-btn {
                background: #f8fafc;
                border: 2px solid #e2e8f0;
                border-radius: 8px;
                padding: 1.5rem 1rem;
                text-align: center;
                text-decoration: none;
                color: #475569;
                transition: all 0.2s ease;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                cursor: pointer;
            }
            .action-btn:hover {
                border-color: #3b82f6;
                background: white;
                color: #3b82f6;
                transform: translateY(-1px);
            }
            .action-icon {
                width: 24px;
                height: 24px;
                fill: currentColor;
            }
            .activity {
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }
            .activity h3 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #1e293b;
                margin-bottom: 1.5rem;
            }
            .activity-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 1rem;
                background: #f8fafc;
                border-radius: 8px;
                margin-bottom: 0.75rem;
            }
            .activity-item:last-child {
                margin-bottom: 0;
            }
            .activity-content {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            .activity-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
            }
            .activity-dot.green { background: #10b981; }
            .activity-dot.blue { background: #3b82f6; }
            .activity-dot.yellow { background: #f59e0b; }
            .activity-text {
                font-size: 0.9rem;
                color: #475569;
            }
            .activity-time {
                font-size: 0.8rem;
                color: #94a3b8;
            }
            @media (max-width: 768px) {
                .stats {
                    grid-template-columns: 1fr;
                }
                .action-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <script>
            // Simple fade-in animation
            document.addEventListener('DOMContentLoaded', function() {
                const elements = document.querySelectorAll('.welcome, .stat-card, .actions, .activity');
                elements.forEach((el, index) => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        el.style.transition = 'all 0.5s ease';
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            });
        </script>
</body>
</html>
