{{--
Fungsi: Form untuk menambah anggota baru dengan generate member_code.
Struktur: Extends layout app, section content dengan form.
Fitur: Input name, email, dll., field member_code (auto-generate), tombol submit, error display.
--}}
@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
{{-- Isi konten di sini --}}

<div class="container">
    <h3>Add Member</h3>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label>Member Code (auto)</label>
            <input type="text" name="member_code" class="form-control" placeholder="Auto-generated">
        </div>

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-2">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
            @error('join_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection
