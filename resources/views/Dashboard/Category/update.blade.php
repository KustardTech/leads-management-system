@extends('layouts.title')
@extends('layouts.app')
@section('title','Update Category Page')
@section('content')
<div class="container mt-4">
    <h2>Edit Category</h2>
    <form action="{{ route('category.update.validate', $category->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control"
                   value="{{ old('category_name', $category->name) }}" required>
            @error('category_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
