@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Categories</h3>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-2">+ Add Category</a>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Total Books</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $c)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->books()->count() }}</td>
            <td>
                <a href="{{ route('categories.edit',$c->id) }}" class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
