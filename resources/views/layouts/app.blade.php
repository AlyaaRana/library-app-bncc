{{--
Fungsi: Layout utama untuk semua halaman.
Struktur: HTML head, nav bar, main content yield, footer.
Fitur: Nav links, auth display, flash messages, responsive design.
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Management System')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">
                                Library System
                            </a>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'border-indigo-400 text-gray-900' : '' }}">
                                Dashboard
                            </a>
                            <a href="{{ route('books.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('books.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                                Books
                            </a>
                            <a href="{{ route('categories.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('categories.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                                Categories
                            </a>
                            <a href="{{ route('members.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('members.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                                Members
                            </a>
                            <a href="{{ route('borrowings.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('borrowings.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                                Borrowings
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <div class="ml-3 relative">
                                <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mx-4 mt-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500">
                    &copy; 2026 Library Management System. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>










































































</html></body>    </div>        </footer>            </div>                </p>                    &copy; 2026 Library Management System. All rights reserved.                <p class="text-center text-sm text-gray-500">            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">        <footer class="bg-white border-t">        <!-- Footer -->        </main>            @yield('content')            @endif                </div>                    {{ session('error') }}                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mx-4 mt-4" role="alert">            @if (session('error'))            @endif                </div>                    {{ session('success') }}                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4" role="alert">            @if (session('success'))        <main class="flex-1">        <!-- Main Content -->        </nav>            </div>                </div>                    </div>                        @endauth                            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Login</a>                        @else                            </div>                                </form>                                    <button type="submit" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Logout</button>                                    @csrf                                <form method="POST" action="{{ route('logout') }}" class="inline">                                <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>                            <div class="ml-3 relative">                        @auth                    <div class="hidden sm:flex sm:items-center sm:ml-6">                    </div>                        </div>                            </a>                                Borrowings                            <a href="{{ route('borrowings.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('borrowings.*') ? 'border-indigo-400 text-gray-900' : '' }}">                            </a>                                Members                            <a href="{{ route('members.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('members.*') ? 'border-indigo-400 text-gray-900' : '' }}">                            </a>                                Categories                            <a href="{{ route('categories.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('categories.*') ? 'border-indigo-400 text-gray-900' : '' }}">                            </a>                                Books                            <a href="{{ route('books.index') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('books.*') ? 'border-indigo-400 text-gray-900' : '' }}">                            </a>                                Dashboard                            <a href="{{ route('dashboard') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'border-indigo-400 text-gray-900' : '' }}">                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">                        </div>                            </a>                                Library System                            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">                        <div class="shrink-0 flex items-center">                    <div class="flex">                <div class="flex justify-between h-16">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">        <nav class="bg-white shadow-sm border-b">        <!-- Navigation -->    <div class="min-h-screen flex flex-col"><body class="antialiased bg-gray-50"></head>    @vite(['resources/css/app.css', 'resources/js/app.js'])    <!-- Scripts -->    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />    <link rel="preconnect" href="https://fonts.bunny.net">    <!-- Fonts -->    <title>@yield('title', 'Library Management System')</title>    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta charset="utf-8"><head><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
