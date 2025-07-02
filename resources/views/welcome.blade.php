<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <h1 class="text-2xl font-bold mb-4">Welcome, Admin!</h1>
            <p class="mb-6 text-gray-600">This is the admin landing page for the Property Catalog. Please log in to access your dashboard or register a new admin account.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('login') }}" class="px-6 py-2 bg-gray-800 text-white rounded hover:bg-black transition">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-white border border-gray-300 text-gray-800 rounded hover:bg-gray-100 transition">Register</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
