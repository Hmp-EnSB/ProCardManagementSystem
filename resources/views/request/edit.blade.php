@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Edit Card Request') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('request.update', $request->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">{{ __('Full Name') }}</label>
                                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name', $request->requestInfo->full_name) }}" required autocomplete="full_name" autofocus>
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $request->requestInfo->email) }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Add other fields (phone_number, CIN, institution, position) here -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">{{ __('Type') }}</label>
                                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                                            <option value="">{{ __('Select Type') }}</option>
                                            <option value="academic" {{ old('type', $request->requestInfo->type) == 'academic' ? 'selected' : '' }}>{{ __('Academic') }}</option>
                                            <option value="administrative" {{ old('type', $request->requestInfo->type) == 'administrative' ? 'selected' : '' }}>{{ __('Administrative') }}</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">{{ __('Photo') }}</label>
                                        <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo">
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <img src="{{ asset('storage/photos/' . $request->requestInfo->photo) }}" alt="Current Photo" class="mt-2 img-thumbnail" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="details">{{ __('Details') }}</label>
                                <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" required>{{ old('details', $request->requestInfo->details) }}</textarea>
                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Request') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
