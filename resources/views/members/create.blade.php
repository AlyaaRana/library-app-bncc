@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
<div class="container py-5" style="max-width: 720px;">

    {{-- HEADER --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Add Member</h2>
        <p class="text-muted mb-0">
            Register a new library member
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('members.store') }}" method="POST">
                @csrf

                {{-- MEMBER CODE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Member Code
                    </label>
                    <input type="text"
                           name="member_code"
                           class="form-control"
                           placeholder="Auto-generated"
                           readonly>
                    <div class="form-text">
                        This code will be generated automatically
                    </div>
                </div>

                {{-- NAME --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Full Name
                    </label>
                    <input type="text"
                           name="name"
                           class="form-control form-control-lg @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="e.g. John Doe"
                           required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Email Address
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="email@example.com"
                           required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PHONE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Phone Number
                    </label>
                    <input type="text"
                           name="phone"
                           class="form-control form-control-lg"
                           value="{{ old('phone') }}"
                           placeholder="+62...">
                </div>

                {{-- ADDRESS --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Address
                    </label>
                    <textarea name="address"
                              class="form-control"
                              rows="3"
                              placeholder="Street, city, etc.">{{ old('address') }}</textarea>
                </div>

                {{-- JOIN DATE --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Join Date
                    </label>
                    <input type="date"
                           name="join_date"
                           class="form-control @error('join_date') is-invalid @enderror"
                           value="{{ old('join_date') }}"
                           required>
                    @error('join_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- ACTIONS --}}
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('members.index') }}"
                       class="text-decoration-none text-muted">
                        ← Back to members
                    </a>

                    <button class="btn btn-dark btn-lg px-5">
                        Save Member
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
