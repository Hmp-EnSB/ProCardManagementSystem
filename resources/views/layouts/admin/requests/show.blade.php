@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1 class="mb-4">Request Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $request->id }}</p>
                <p><strong>User:</strong> {{ $request->user->name }}</p>
                <p><strong>Status:</strong> <span class="badge badge-{{ $request->status == 'approved' ? 'success' : ($request->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($request->status) }}</span></p>
                <p><strong>Details:</strong> {{ $request->requestInfo->details }}</p>
                <img src="{{ asset('storage/photos/' . $request->requestInfo->photo) }}" alt="Request Photo" class="img-fluid mb-3" style="max-width: 300px;">
                
                @if($request->status == 'pending')
                    <form action="{{ route('admin.requests.approve', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.requests.decline', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                @else
                    <form action="{{ route('admin.requests.undo', $request->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">Undo Decision</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
