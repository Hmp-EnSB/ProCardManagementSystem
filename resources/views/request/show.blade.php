@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Request Details') }}</h4>
                    </div>

                    <div class="card-body">
                        <p><strong>{{ __('ID') }}:</strong> {{ $request->id }}</p>
                        <p><strong>{{ __('Status') }}:</strong> <span class="badge bg-{{ $request->status == 'approved' ? 'success' : ($request->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($request->status) }}</span></p>
                        
                        <p><strong>{{ __('Full Name') }}:</strong> {{ $request->requestInfo->full_name }}</p>
                        <p><strong>{{ __('Email') }}:</strong> {{ $request->requestInfo->email }}</p>
                        <p><strong>{{ __('Phone Number') }}:</strong> {{ $request->requestInfo->phone_number }}</p>
                        <p><strong>{{ __('CIN') }}:</strong> {{ $request->requestInfo->CIN }}</p>
                        <p><strong>{{ __('Institution') }}:</strong> {{ $request->requestInfo->institution }}</p>
                        <p><strong>{{ __('Position') }}:</strong> {{ $request->requestInfo->position }}</p>
                        <p><strong>{{ __('Type') }}:</strong> {{ ucfirst($request->requestInfo->type) }}</p>
                        <p><strong>{{ __('Details') }}:</strong> {{ $request->requestInfo->details }}</p>

                        <div class="mt-3 mb-3">
                            <strong>{{ __('Photo') }}:</strong><br>
                            <img src="{{ asset('storage/photos/' . $request->requestInfo->photo) }}" alt="Request Photo" class="img-thumbnail" style="max-width: 300px;">
                        </div>

                        @if($request->status == 'pending')
                            <a href="{{ route('request.edit', $request->id) }}" class="btn btn-warning">{{ __('Edit Request') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
