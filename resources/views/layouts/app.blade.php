<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('header')
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-5xl px-6">
            <header class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <svg class="h-12 w-auto text-red-600" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5.5-2.5l7.51-3.49L17.5 6.5 9.99 9.99 6.5 17.5zm5.5-6.6c.61 0 1.1.49 1.1 1.1s-.49 1.1-1.1 1.1-1.1-.49-1.1-1.1.49-1.1 1.1-1.1z"/>
                    </svg>
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white ml-2">Pizza Order</h1>
                </div>
                <nav class="flex space-x-4">
                    <a href="{{ route('welcome') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Home</a>
                    <a href="{{ route('orders.create') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Order</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Contact</a>
                </nav>
            </header>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="mt-8">
                {{ $slot }}
            </main>
            <footer class="mt-16 text-center">
                <p class="text-gray-500 dark:text-gray-400">&copy; {{ date('Y') }} Pizza Order. All rights reserved.</p>
            </footer>
        </div>
    </div>
    @stack('footer')
    </body>
</html>
