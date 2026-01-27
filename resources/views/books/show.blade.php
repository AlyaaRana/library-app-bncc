@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Book</h3>

    <img src="{{ asset('covers/'.$book->cover) }}" width="150" class="mb-3">

    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Category:</strong> {{ $book->category->name }}</p>
    <p><strong>Borrowed:</strong> {{ $book->borrowings()->count() }} times</p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
