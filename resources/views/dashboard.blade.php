{{--
Fungsi: Halaman utama dengan statistik perpustakaan.
Struktur: Extends layout app, section content dengan cards dan charts.
Fitur: Cards total buku/anggota/peminjaman, list popular books, chart peminjaman per bulan.
--}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
{{-- Isi konten di sini --}}
@endsection


























































































@endsection</div>    </div>        </div>            </div>                </div>                    </div>                        @endforelse                            <p class="text-gray-500">No books available.</p>                        @empty                            </div>                                </div>                                    <p class="text-xs text-gray-400">{{ $book->borrowing_details_count }} borrowings</p>                                    <p class="text-sm text-gray-500">by {{ $book->author }}</p>                                    <h3 class="text-sm font-medium text-gray-900">{{ $book->title }}</h3>                                <div>                                @endif                                    </div>                                        </svg>                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">                                    <div class="w-12 h-16 bg-gray-200 rounded flex items-center justify-center">                                @else                                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-12 h-16 object-cover rounded">                                @if($book->cover_image)                            <div class="flex items-center space-x-4">                        @forelse($popularBooks as $book)                    <div class="space-y-4">                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Popular Books</h2>                <div class="bg-white p-6 rounded-lg shadow-sm border">                <!-- Popular Books -->                </div>                    </div>                        </div>                            </div>                                <p class="text-2xl font-semibold text-gray-900">{{ $totalCategories }}</p>                                <p class="text-sm font-medium text-gray-600">Categories</p>                            <div class="ml-4">                            </div>                                </svg>                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <div class="p-2 bg-purple-500 rounded-md">                        <div class="flex items-center">                    <div class="bg-purple-50 p-6 rounded-lg">                    </div>                        </div>                            </div>                                <p class="text-2xl font-semibold text-gray-900">{{ $activeBorrowings }}</p>                                <p class="text-sm font-medium text-gray-600">Active Borrowings</p>                            <div class="ml-4">                            </div>                                </svg>                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <div class="p-2 bg-yellow-500 rounded-md">                        <div class="flex items-center">                    <div class="bg-yellow-50 p-6 rounded-lg">                    </div>                        </div>                            </div>                                <p class="text-2xl font-semibold text-gray-900">{{ $totalMembers }}</p>                                <p class="text-sm font-medium text-gray-600">Total Members</p>                            <div class="ml-4">                            </div>                                </svg>                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <div class="p-2 bg-green-500 rounded-md">                        <div class="flex items-center">                    <div class="bg-green-50 p-6 rounded-lg">                    </div>                        </div>                            </div>                                <p class="text-2xl font-semibold text-gray-900">{{ $totalBooks }}</p>                                <p class="text-sm font-medium text-gray-600">Total Books</p>                            <div class="ml-4">                            </div>                                </svg>                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">                            <div class="p-2 bg-blue-500 rounded-md">                        <div class="flex items-center">                    <div class="bg-blue-50 p-6 rounded-lg">                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">                <!-- Statistik Cards -->                <h1 class="text-2xl font-bold text-gray-900 mb-6">Dashboard</h1>            <div class="p-6 bg-white border-b border-gray-200">        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="py-12">@section('content')@section('title', 'Dashboard')
