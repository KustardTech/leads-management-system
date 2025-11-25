@extends('layouts.title')
@extends('layouts.app')
@section('title','Add Category Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5" style="width:400px;">
    <h2>Add a New Category</h2>
    <form method="POST" action="{{route('category.add.validate')}}">
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Enter category name"  name="category_name">
            @error('category_name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
@endsection


