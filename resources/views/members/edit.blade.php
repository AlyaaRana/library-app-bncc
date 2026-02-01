{{--
Fungsi: Form untuk mengedit anggota existing.
Struktur: Extends layout app, section content dengan form pre-filled.
Fitur: Input fields terisi, tombol update, error display.
--}}
@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
{{-- Isi konten di sini --}}

<div class="container">
    <h3>Edit Member</h3>

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Member Code</label>
            <input type="text" name="member_code" class="form-control"
                value="{{ old('member_code', $member->member_code) }}">
        </div>

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                value="{{ old('name', $member->name) }}">
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                value="{{ old('email', $member->email) }}">
        </div>

        <div class="mb-2">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control"
                value="{{ old('phone', $member->phone) }}">
        </div>

        <div class="mb-2">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $member->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control"
                value="{{ old('join_date', $member->join_date->format('Y-m-d')) }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection
