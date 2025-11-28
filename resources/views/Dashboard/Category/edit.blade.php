@extends('layouts.title')
@extends('layouts.app')
@section('title','Edit Category Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="app-content">
    <div class="container d-flex justify-content-center mt-5">

        <div class="col-md-6">

            <div class="card card-primary card-outline mb-4">

               
                <div class="card-header">
                    <h4 class="card-title mb-0"><b>Edit Category</b></h4>
                </div>

                
                <div class="card-body">

                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text"
                                   id="category_name"
                                   name="category_name"
                                   class="form-control"
                                   value="{{ old('category_name', $category->name) }}"
                                   required>

                            @error('category_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                </div>

                
               <div class="card-footer d-flex">
    <a href="{{ route('category') }}" class="btn btn-secondary">
        Back
    </a>

    <button type="submit" class="btn btn-primary ms-auto">
        Update
    </button>
</div>

                    </form>
                

            </div>

        </div>

    </div>
</div>

@endsection

