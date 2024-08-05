@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Requests</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pending Requests</h5>
                        <p class="card-text">View all pending requests</p>
                        <a href="{{ route('admin.requests.index', ['status' => 'pending']) }}" class="btn btn-warning btn-block">Pending</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rejected Requests</h5>
                        <p class="card-text">View all rejected requests</p>
                        <a href="{{ route('admin.requests.index', ['status' => 'rejected']) }}" class="btn btn-danger btn-block">Rejected</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Approved Requests</h5>
                        <p class="card-text">View all approved requests</p>
                        <a href="{{ route('admin.requests.index', ['status' => 'approved']) }}" class="btn btn-success btn-block">Approved</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <!-- ... (rest of the table code remains the same) ... -->
                </table>
            </div>
        </div>
    </div>
@endsection
