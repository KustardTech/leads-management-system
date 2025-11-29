@extends('layouts.app')
@extends('layouts.title')
@section('title','Edit Category Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="app-content">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h4 class="card-title mb-0"><b>Edit Lead</b></h4>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('leads.update', $leadsedit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" 
                                value="{{ old('name', $leadsedit->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" 
                                value="{{ old('email', $leadsedit->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control" 
                                value="{{ old('mobile', $leadsedit->mobile) }}" required>
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_file_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ $leadsedit->category_file_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_file_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="4">{{ old('message', $leadsedit->message) }}</textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($leadsedit->image)
                                <div class="mt-2">
                                    <p>Current Image:</p>
                                    <img src="{{ Storage::url($leadsedit->image) }}" 
                                        alt="Lead Image" class="img-thumbnail" width="150">
                                </div>
                            @endif
                        </div>
                </div>
                <div class="card-footer d-flex">
                <a href="{{ route('leads.page') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary ms-auto">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection