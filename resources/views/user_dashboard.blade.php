@extends('layouts.users.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient text-white text-center">
                    <h4 class="mb-0">{{ __('User Dashboard') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center mb-3">Welcome to Your Dashboard</h2>
                    <p class="text-center mb-4">Here you can manage your card requests.</p>

                    <hr class="my-4">

                    <h5 class="text-primary">Card Requests Overview</h5>
                    <p>Your requests have been submitted successfully. Please wait for an admin to notify you about the status of your requests.</p>

                    <div class="list-group mb-4">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Request 1
                            <span class="badge bg-secondary">Submitted</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Request 2
                            <span class="badge bg-secondary">Submitted</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Request 3
                            <span class="badge bg-secondary">Submitted</span>
                        </a>
                    </div>

                    <p class="text-muted text-center">You will be notified via email once your requests are processed.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection