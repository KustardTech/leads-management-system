@extends('layouts.app')
@extends('layouts.title')
@section('title','Edit Category Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4 bg-dark text-light p-4 rounded">
    <h2 class="mb-4">Edit Lead</h2>
    <form enctype="multipart/form-data" class="mt-4" action="{{ route('leads.update', $leadsedit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-dark bg-secondary text-light border-light"
                    value="{{ old('name', $leadsedit->name) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control form-control-dark bg-secondary text-light border-light"
                    value="{{ old('email', $leadsedit->email) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control form-control-dark bg-secondary text-light border-light"
                    value="{{ old('mobile', $leadsedit->mobile) }}" required>
            </div>
            <div class="col-md-6">
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

            </div>
            <div class="col-12">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control form-control-dark bg-secondary text-light border-light" rows="4">{{ old('message', $leadsedit->message) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control form-control-dark bg-secondary text-light border-light">
                @if ($leadsedit->image)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ asset('uploads/leads/' . $leadsedit->image) }}" 
                        alt="Lead Image" class="img-thumbnail" width="150">
                </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Lead</button>
    </form>
</div>
@endsection