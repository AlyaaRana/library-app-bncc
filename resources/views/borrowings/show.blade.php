@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Borrowing Detail</h3>

    <p><strong>User:</strong> {{ $borrowing->user->name }}</p>
    <p><strong>Borrow Date:</strong> {{ $borrowing->borrow_date }}</p>
    <p><strong>Return Date:</strong> {{ $borrowing->returned_at ?? '-' }}</p>

    <h5>Books:</h5>
    @foreach($borrowing->books as $bk)
        <li>{{ $bk->title }}</li>
    @endforeach

    <h5 class="mt-3">History:</h5>
    <ul>
        @foreach($borrowing->logs as $log)
            <li>{{ $log->status }} - {{ $log->created_at }}</li>
        @endforeach
    </ul>

    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
