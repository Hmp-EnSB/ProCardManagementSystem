@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Request</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('request.update', $request->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" class="form-control" required>{{ $request->requestInfo->details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control-file">
                        <img src="{{ asset('storage/photos/' . $request->requestInfo->photo) }}" alt="Current Photo" class="mt-2 img-thumbnail" style="max-width: 200px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
