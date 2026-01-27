@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Book</h3>

    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-2">
            <label>Title</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ $book->category_id==$c->id?'selected':'' }}>
                    {{ $c->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Cover</label> <br>
            <img src="{{ asset('covers/'.$book->cover) }}" width="80" class="mb-2">
            <input type="file" name="cover" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
