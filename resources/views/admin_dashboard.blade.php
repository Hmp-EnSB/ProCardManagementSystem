@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <main role="main" class="col-md-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2 text-dark font-weight-bold">Welcome to Admin Dashboard!</h2>
            <p>Check today's requests</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <h3 class="font-weight-bold text-primary">User Base</h3>
                                <h2 class="display-4 font-weight-bold text-dark">{{ App\Models\User::count() }}</h2>
                                <p class="text-muted">Registered accounts in system</p>
                            </div>
                            <div class="col-md-6">
                                <h3 class="font-weight-bold text-success">Total Requests</h3>
                                <h2 class="display-4 font-weight-bold text-dark">{{ App\Models\Requestinfo::count() }}</h2>
                                <p class="text-muted">All-time requests in system</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
