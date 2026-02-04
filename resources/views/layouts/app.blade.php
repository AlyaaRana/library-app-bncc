<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Management System')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-slate-100 text-slate-800">

    <div class="min-h-screen flex flex-col">

        {{-- NAVBAR --}}
        <nav class="bg-white/80 backdrop-blur border-b border-slate-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between h-16 items-center">

                    <a href="{{ route('dashboard') }}"
                       class="text-lg font-semibold tracking-tight text-indigo-600">
                        Library System
                    </a>

                    <div class="hidden sm:flex items-center space-x-8 text-sm font-medium">
                        <a href="{{ route('dashboard') }}"
                           class="{{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-800' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('books.index') }}"
                           class="{{ request()->routeIs('books.*') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-800' }}">
                            Books
                        </a>
                        <a href="{{ route('members.index') }}"
                           class="{{ request()->routeIs('members.*') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-800' }}">
                            Members
                        </a>
                        <a href="{{ route('borrowings.index') }}"
                           class="{{ request()->routeIs('borrowings.*') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-800' }}">
                            Borrowings
                        </a>
                    </div>

                    <div class="flex items-center space-x-4 text-sm">
                        @auth
                            <span class="text-slate-600">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="text-slate-400 hover:text-red-500 transition">Logout</button>
                            </form>
                        @endauth
                    </div>

                </div>
            </div>
        </nav>

        {{-- CONTENT --}}
        <main class="flex-1 w-full max-w-7xl mx-auto px-6 py-10">
            @yield('content')
        </main>

    </div>

    {{-- PAGE SCRIPTS (Chart.js etc) --}}
    @stack('scripts')

</body>
</html>
