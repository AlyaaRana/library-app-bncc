@extends('layouts.app')

@section('content')
<div class="container py-4">
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary card shadow-sm">
            + Borrow
        </a>
    </div>
</div>
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Borrow Date</th>
                        <th>Books</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $b->user->name ?? '-' }}</td>
                        <td>{{ $b->borrow_date }}</td>
                        <td>
                            @foreach($b->books as $bk)
                                <span class="badge bg-info text-dark mb-1">{{ $bk->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($b->returned_at)
                                <span class="badge bg-success">Returned</span>
                            @else
                                <span class="badge bg-warning text-dark">Borrowed</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('borrowings.show',$b->id) }}" class="btn btn-sm btn-info">Detail</a>
                            @if(!$b->returned_at)
                                <a href="{{ route('borrowings.edit',$b->id) }}" class="btn btn-sm btn-warning">Return</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No borrowings yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
