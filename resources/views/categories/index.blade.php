@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">🗂 Categories</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-success">
            + Add Category
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Total Books</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $c->name }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $c->books()->count() }} books
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit',$c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            No categories available.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
