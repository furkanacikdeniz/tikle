<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'tikle') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- Bootstrap JS for tabs functionality --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Main Content Area: Flex container for Sidebar and Content -->
            <main class="main-content-area">
                <div class="sidebar-nav-container">
                    {{-- Tabs are moved here to be part of the sidebar structure --}}
                    <ul class="nav nav-tabs" id="taskTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Tümü</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="created-tab" data-bs-toggle="tab" href="#created" role="tab" aria-controls="created" aria-selected="false">Oluşturduğum Takım Görevleri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="assigned-tab" data-bs-toggle="tab" href="#assigned" role="tab" aria-controls="assigned" aria-selected="false">Bana Atananlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Bireysel</a>
                        </li>
                    </ul>
                </div>
                <div class="content-pane">
                    {{-- All page content from tasks/index.blade.php will be yielded here --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
