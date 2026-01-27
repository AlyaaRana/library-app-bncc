@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Books</h3>

    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title..." class="form-control">
        
        <select name="category_id" class="form-select" style="width:200px">
            <option value="">All Categories</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary">Filter</button>
    </form>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-2">+ Add Book</a>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($books as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset('covers/'.$b->cover) }}" width="60"></td>
            <td>{{ $b->title }}</td>
            <td>{{ $b->category->name }}</td>
            <td>
                <a href="{{ route('books.show',$b->id) }}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{ route('books.edit',$b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('books.destroy',$b->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Del</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $books->links() }}
</div>
@endsection
