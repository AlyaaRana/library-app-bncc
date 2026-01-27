@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Borrow Book</h3>

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>User</label>
            <select name="user_id" class="form-select">
                @foreach($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Books</label>
            <select name="book_ids[]" multiple class="form-select" size="6">
                @foreach($books as $bk)
                <option value="{{ $bk->id }}">{{ $bk->title }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Borrow</button>
    </form>
</div>
@endsection
