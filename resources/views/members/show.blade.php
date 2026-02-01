{{--
Fungsi: Menampilkan detail anggota dan riwayat peminjaman.
Struktur: Extends layout app, section content dengan info anggota dan list borrowings.
Fitur: Display profile, table riwayat peminjaman, tombol edit.
--}}
@extends('layouts.app')

@section('title', 'Member Details')

@section('content')
{{-- Isi konten di sini --}}

<div class="container">
    <h3>Member Detail</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Member Code:</strong> {{ $member->member_code }}</p>
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>Email:</strong> {{ $member->email ?? '-' }}</p>
            <p><strong>Phone:</strong> {{ $member->phone ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $member->address ?? '-' }}</p>
            <p><strong>Join Date:</strong> {{ $member->join_date->format('d M Y') }}</p>

            <a href="{{ route('members.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('members.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </div>

    <h5>Borrowing History</h5>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($member->borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->book->title ?? '-' }}</td>
                <td>{{ $borrowing->borrowed_at }}</td>
                <td>{{ $borrowing->returned_at ?? '-' }}</td>
                <td>{{ ucfirst($borrowing->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No borrowing history.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
