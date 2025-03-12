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
        @vite([
            'resources/css/app.css',
            'public/vendor/alert/alert.css',
            'resources/js/app.js'
        ])

        <!-- Styles -->
        @livewireStyles
        <style>
            @keyframes progress-bar {
                from { width: 0%; }
                to { width: 100%; }
            }

            .animate-width {
                animation: progress-bar 5s linear forwards;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <livewire:alert-message />
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts

        <livewire:alert-modal />
        <livewire:alert-toastr />
        <livewire:alert-notify />

{{--        <x-notify />--}}

    </body>
</html>
