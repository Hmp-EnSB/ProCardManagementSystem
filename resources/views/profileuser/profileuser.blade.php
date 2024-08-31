@extends('layouts.users.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profileuser.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                       
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                       
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                       
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary btn-sm">Update Profile</button>
                        </div>
                    </form>

                    <hr>

                    <form action="{{ route('profileuser.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
