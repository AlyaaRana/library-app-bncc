@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-10">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-semibold tracking-tight">Dashboard Overview</h1>
        <p class="text-sm text-slate-500 mt-1">Library performance and activity summary</p>
    </div>

    {{-- QUICK ACTIONS --}}
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('books.create') }}" class="btn-action bg-blue-600 text-white hover:bg-blue-700">+ Add Book</a>
        <a href="{{ route('members.create') }}" class="btn-action bg-green-600 text-white hover:bg-green-700">+ Add Member</a>
        <a href="{{ route('borrowings.create') }}" class="btn-action bg-yellow-500 text-white hover:bg-yellow-600">+ New Borrowing</a>
        <a href="{{ route('categories.create') }}" class="btn-action bg-purple-600 text-white hover:bg-purple-700">+ Add Category</a>
    </div>

    {{-- STATISTICS --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card">
            <p class="stat-title">Total Books</p>
            <p class="stat-value">{{ $totalBooks }}</p>
            <span class="stat-icon">📚</span>
        </div>

        <div class="stat-card">
            <p class="stat-title">Members</p>
            <p class="stat-value">{{ $totalMembers }}</p>
            <span class="stat-icon">👥</span>
        </div>

        <div class="stat-card">
            <p class="stat-title">Active Borrowings</p>
            <p class="stat-value">{{ $activeBorrowings }}</p>
            <span class="stat-icon">📄</span>
        </div>

        <div class="stat-card">
            <p class="stat-title">Categories</p>
            <p class="stat-value">{{ $totalCategories }}</p>
            <span class="stat-icon">🏷️</span>
        </div>
    </div>

    {{-- CONTENT GRID --}}
    <div class="grid lg:grid-cols-3 gap-8">

        {{-- POPULAR BOOKS --}}
        <div class="card">
            <h3 class="card-title">Popular Books</h3>

            <div class="space-y-4 mt-5">
                @forelse($popularBooks as $book)
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-16 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400">
                            📖
                        </div>
                        <div>
                            <p class="text-sm font-medium">{{ $book->title }}</p>
                            <p class="text-xs text-slate-500">{{ $book->borrowing_details_count }} borrowings</p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-slate-400">No data available</p>
                @endforelse
            </div>
        </div>

        {{-- CHART --}}
        <div class="card lg:col-span-2">
            <h3 class="card-title">Borrowings per Month</h3>
            <canvas id="borrowChart" height="110" class="mt-6"></canvas>
        </div>

    </div>
</div>
@endsection
