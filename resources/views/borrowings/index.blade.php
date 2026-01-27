@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Borrowings</h3>

    <a href="{{ route('borrowings.create') }}" class="btn btn-success mb-2">+ Borrow</a>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Date</th>
            <th>Books</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($borrowings as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->user->name }}</td>
            <td>{{ $b->borrow_date }}</td>
            <td>
                @foreach($b->books as $bk)
                    <span class="badge bg-info">{{ $bk->title }}</span>
                @endforeach
            </td>
            <td>{{ $b->returned_at ? 'Returned' : 'Borrowed' }}</td>
            <td>
                <a href="{{ route('borrowings.show',$b->id) }}" class="btn btn-sm btn-info">Detail</a>
                @if(!$b->returned_at)
                <a href="{{ route('borrowings.edit',$b->id) }}" class="btn btn-sm btn-warning">Return</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
