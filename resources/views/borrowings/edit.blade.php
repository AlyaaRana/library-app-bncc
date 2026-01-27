@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Return Book</h3>

    <form action="{{ route('borrowings.update',$borrowing->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-2">
            <label>Return Date</label>
            <input type="date" name="returned_at" class="form-control" value="{{ date('Y-m-d') }}">
        </div>

        <button class="btn btn-primary">Confirm Return</button>
    </form>
</div>
@endsection
