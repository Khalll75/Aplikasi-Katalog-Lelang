<x-app-layout>
    <div style="
        position:fixed;
        z-index:0;
        top:0;left:0;
        width:100vw;height:100vh;
        background:url('/images/11bbcd55-51c3-4096-b89d-5d5e564c3703.jpg') center center/cover no-repeat;
        filter:blur(8px);
        opacity:0.5;
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
                <button class="action-btn">
                    <svg class="action-icon" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span>Kelola Properti</span>
                </button>
                <button class="action-btn">
                    <svg class="action-icon" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
                    <span>Laporan</span>
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
</x-app-layout>