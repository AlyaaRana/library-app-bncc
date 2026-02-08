@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 680px;">

    {{-- HEADER --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Borrow Books</h2>
        <p class="text-muted mb-0">
            Assign one or more books to a user
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('borrowings.store') }}" method="POST">
                @csrf

                {{-- USER --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Borrower
                    </label>
                    <select name="user_id"
                            class="form-select form-select-lg"
                            required>
                        <option value="" disabled selected>
                            Select user
                        </option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">
                                {{ $u->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

              {{-- BOOKS --}}
<div class="mb-4">
    <label class="form-label fw-semibold">Books</label>

    <div class="select2-wrapper">
        <select name="book_ids[]"
                class="form-select select2"
                multiple
                required>
            @foreach($books as $bk)
                <option value="{{ $bk->id }}">
                    {{ $bk->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>


                {{-- ACTIONS --}}
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <a href="{{ route('borrowings.index') }}"
                       class="text-decoration-none text-muted">
                        ← Back to list
                    </a>

                    <button class="btn btn-dark btn-lg px-5">
                        Borrow Books
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


@endsection
