@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 640px;">

    {{-- HEADER --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Add New Book</h2>
        <p class="text-muted mb-0">
            Fill in the details to add a book to the library
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TITLE --}}
                <div class="mb-4 ">
                    <label class="form-label fw-semibold btn btn-dark btn-lg fw-bold px-5 py-3
                   text-uppercase ">
                        Book Title
                    </label>
                    <input type="text"
                           name="title"
                           class="form-control form-control-lg"
                           placeholder="e.g. Atomic Habits"
                           required>
                </div>

                {{-- CATEGORY --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold btn btn-dark btn-lg fw-bold px-5 py-3
                   text-uppercase shadow-sm">
                        Category
                    </label>
                    <select name="category_id"
                            class="form-select form-select-lg "
                            >
                        <option value="" disabled selected>
                            Select category
                        </option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- COVER --}}
                <div class="mb-4 btn btn-dark btn-lg fw-bold px-5 py-3
                   text-uppercase shadow-sm">
                    <label class="form-label fw-semibold">
                        Book Cover
                    </label>
                    <input type="file"
                           name="cover"
                           class="form-control"
                           accept="image/*">
                    <div class="form-text">
                        JPG or PNG, max 2MB
                    </div>
                </div>

               {{-- ACTIONS --}}
<div class="d-flex justify-content-between align-items-center mt-5">

    <a href="{{ route('books.index') }}"
       class="fw-bold">
        ← Back
    </a>

    <button class="btn btn-dark btn-lg fw-bold px-5 py-3
                   text-uppercase shadow-sm">
        Save Book
    </button>

</div>

            </form>

        </div>
    </div>

</div>
@endsection
