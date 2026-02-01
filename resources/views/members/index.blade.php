{{--
Fungsi: Menampilkan daftar anggota.
Struktur: Extends layout app, section content dengan table/list anggota.
Fitur: Pagination, tombol create/edit/delete, display member_code, name, email.
--}}
@extends('layouts.app')

@section('title', 'Members')

@section('content')
{{-- Isi konten di sini --}}

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Members</h3>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Add Member</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Member Code</th>
                <th>Name</th>
                <th>Email</th>
                <th>Join Date</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>{{ $member->member_code }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email ?? '-' }}</td>
                <td>{{ $member->join_date->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('members.show', $member) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No members found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->links() }}
</div>

@endsection
