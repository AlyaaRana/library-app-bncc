@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Category</h3>

    <form action="{{ route('categories.update',$category->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
