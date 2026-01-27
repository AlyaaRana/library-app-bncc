@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Category</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Category name..." required>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
