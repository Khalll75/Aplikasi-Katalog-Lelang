<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booklet Download</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        input:checked ~ .dot {
            transform: translateX(100%);
            background-color: #dc2626;
        }
        input:checked ~ .block {
            background-color: #fca5a5;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-red-900 to-red-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold hover:text-red-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Admin Panel
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm">{{ Auth::user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm hover:text-red-200 transition-colors">
                        <i class="fas fa-sign-out-alt mr-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Booklet Download</h1>
            <p class="text-gray-600 mt-2">Kelola link download booklet properti yang muncul di halaman utama</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.booklet.update') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <!-- Active Toggle -->
            <div class="mb-6">
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="active" value="1" class="sr-only"
                               {{ isset($booklet['active']) && $booklet['active'] ? 'checked' : '' }}
                               onchange="this.form.querySelector('[name=active_hidden]').disabled = this.checked">
                        <div class="block bg-gray-200 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                    <div class="ml-3">
                        <span class="text-gray-700 font-medium">Tampilkan Booklet</span>
                        <p class="text-sm text-gray-500">Aktifkan untuk menampilkan link booklet di halaman utama</p>
                    </div>
                </label>
                <input type="hidden" name="active" value="0" {{ isset($booklet['active']) && $booklet['active'] ? 'disabled' : '' }} name="active_hidden">
            </div>

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Judul Booklet
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $booklet['title'] ?? '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                       placeholder="📚 Booklet Properti"
                       required>
                <p class="text-sm text-gray-500 mt-1">Contoh: 📚 Booklet Properti</p>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="description"
                       name="description"
                       value="{{ old('description', $booklet['description'] ?? '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                       placeholder="Agustus 2025 - Klik untuk download"
                       required>
                <p class="text-sm text-gray-500 mt-1">Contoh: Desember 2025 - Klik untuk download</p>
            </div>

            <!-- URL -->
            <div class="mb-6">
                <label for="url" class="block text-gray-700 font-semibold mb-2">
                    URL Download
                    <span class="text-red-500">*</span>
                </label>
                <input type="url"
                       id="url"
                       name="url"
                       value="{{ old('url', $booklet['url'] ?? '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                       placeholder="https://bit.ly/BOOKLET_PROPERTY_AGUSTUS_2025"
                       required>
                <p class="text-sm text-gray-500 mt-1">Masukkan URL lengkap (contoh: https://bit.ly/your-link)</p>
            </div>

            <!-- Preview -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Preview:</h3>
                <div class="flex justify-center">
                    <a href="#" class="group pointer-events-none">
                        <div class="bg-gradient-to-r from-red-700 to-orange-600 text-white px-6 py-3 rounded-full shadow-lg border-2 border-white border-opacity-30 inline-flex items-center gap-3">
                            <div class="bg-white bg-opacity-90 rounded-full p-2">
                                <i class="fas fa-download text-red-800 text-sm"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-sm font-bold" id="preview-title">{{ $booklet['title'] ?? '📚 Booklet Properti' }}</div>
                                <div class="text-xs opacity-90" id="preview-description">{{ $booklet['description'] ?? 'Agustus 2025 - Klik untuk download' }}</div>
                            </div>
                            <i class="fas fa-external-link-alt text-white text-xs opacity-70"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.lelang.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Live preview update
    document.getElementById('title').addEventListener('input', function() {
        document.getElementById('preview-title').textContent = this.value || '📚 Booklet Properti';
    });

    document.getElementById('description').addEventListener('input', function() {
        document.getElementById('preview-description').textContent = this.value || 'Agustus 2025 - Klik untuk download';
    });
</script>
</body>
</html>
