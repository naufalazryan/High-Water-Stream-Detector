<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'HWSD' }}</title>
    <link rel="icon" href="{{ asset('images/titleIcon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>
    <script>
        const socket = io();

        socket.on('task_updated', data => {
            // Update the UI in response to real-time events
            const taskElement = document.getElementById(`task-${data.id}`);
            if (taskElement) {
                taskElement.classList.toggle('completed', data.completed);
            }
        });
    </script>
    <script>
        window.onload = function () {
            const lastVisitedUrl = "{{ session('last_visited_url') }}";
            const isAuthenticated = "{{ Auth::check() }}";
    
            if (!isAuthenticated && lastVisitedUrl) {
                window.location.href = lastVisitedUrl;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
{{-- @include('layouts.footer') --}}
<footer class="footer p-4 bg-white text-gray-500 text-center">
    <p class="text-center">Copyright © SMK Telkom Banjarbaru 2023 - All right reserved</p>
</footer>

</html>
