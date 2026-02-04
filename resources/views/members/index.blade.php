@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">👥 Members</h4>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            + Add Member
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Member Code</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th class="text-center" width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                    <tr>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $member->member_code }}
                            </span>
                        </td>
                        <td class="fw-semibold">{{ $member->name }}</td>
                        <td>{{ $member->email ?? '-' }}</td>
                        <td>
                            {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('d M Y') : '-' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('members.show', $member) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this member?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No members found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $members->links() }}
        </div>
    </div>

</div>
@endsection
