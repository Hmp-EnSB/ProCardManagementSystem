@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-4">Request Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $request->id }}</p>
                <p><strong>Status:</strong> <span class="badge badge-{{ $request->status == 'approved' ? 'success' : ($request->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($request->status) }}</span></p>
                <p><strong>Details:</strong> {{ $request->requestInfo->details }}</p>
                <img src="{{ asset('storage/photos/' . $request->requestInfo->photo) }}" alt="Request Photo" class="img-fluid mb-3" style="max-width: 300px;">
                
                @if($request->status == 'pending')
                    <a href="{{ route('request.edit', $request->id) }}" class="btn btn-warning">Edit Request</a>
                @endif
            </div>
        </div>
    </div>
@endsection
