<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @if(file_exists(public_path('build/manifest.json')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Fallback to CDN when Vite assets are not available -->
            <script src="https://cdn.tailwindcss.com"></script>
            <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <script>
                tailwind.config = {
                    content: [
                        "./**/*.{html,js,php,blade.php}"
                    ],
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Figtree', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                            }
                        }
                    }
                }
            </script>
            <!-- Enhanced form styles to match @tailwindcss/forms -->
            <style>
                /* Reset and normalize styles to match local development */
                * {
                    box-sizing: border-box;
                }
                html {
                    line-height: 1.5;
                    -webkit-text-size-adjust: 100%;
                    font-size: 16px;
                }
                body {
                    margin: 0;
                    line-height: inherit;
                    font-size: 14px;
                }

                /* Form styles to match @tailwindcss/forms plugin */
                input[type="text"],
                input[type="email"],
                input[type="password"],
                input[type="number"],
                input[type="search"],
                input[type="tel"],
                input[type="url"],
                select,
                textarea {
                    appearance: none;
                    background-color: #fff;
                    border-color: #6b7280;
                    border-width: 1px;
                    border-radius: 0.375rem;
                    padding: 0.5rem 0.75rem;
                    font-size: 0.875rem;
                    line-height: 1.25rem;
                    color: #111827;
                }

                input[type="text"]:focus,
                input[type="email"]:focus,
                input[type="password"]:focus,
                input[type="number"]:focus,
                input[type="search"]:focus,
                input[type="tel"]:focus,
                input[type="url"]:focus,
                select:focus,
                textarea:focus {
                    outline: 2px solid transparent;
                    outline-offset: 2px;
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
                    border-color: #3b82f6;
                }

                /* Button styles */
                button,
                [type="button"],
                [type="reset"],
                [type="submit"] {
                    appearance: none;
                    background-color: transparent;
                    background-image: none;
                    border-width: 1px;
                    font-size: 0.875rem;
                    font-weight: 500;
                    line-height: 1.25rem;
                    padding: 0.5rem 1rem;
                    border-radius: 0.375rem;
                    cursor: pointer;
                }

                /* Checkbox and radio styles */
                input[type="checkbox"],
                input[type="radio"] {
                    appearance: none;
                    padding: 0;
                    width: 1rem;
                    height: 1rem;
                    border: 1px solid #6b7280;
                    border-radius: 0.25rem;
                    background-color: #fff;
                    background-origin: border-box;
                }

                input[type="checkbox"]:checked,
                input[type="radio"]:checked {
                    border-color: transparent;
                    background-color: #3b82f6;
                    background-size: 100% 100%;
                    background-position: center;
                    background-repeat: no-repeat;
                }

                input[type="checkbox"]:checked {
                    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='m13.854 3.646-7.5 7.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6 10.293l7.146-7.147a.5.5 0 0 1 .708.708z'/%3e%3c/svg%3e");
                }

                input[type="radio"] {
                    border-radius: 50%;
                }

                input[type="radio"]:checked {
                    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                }

                /* Additional responsive adjustments */
                @media (max-width: 640px) {
                    html {
                        font-size: 14px;
                    }
                    body {
                        font-size: 13px;
                    }
                }
            </style>
        @endif
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
