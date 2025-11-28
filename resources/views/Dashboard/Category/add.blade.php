@extends('layouts.title')
@extends('layouts.app')
@section('title','Add Category Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="app-content">
    <div class="container d-flex justify-content-center mt-5">

        <div class="col-md-6">

            <div class="card card-primary card-outline mb-4">

           
                <div class="card-header">
                    <h4 class="card-title mb-0"><b>Add New Category</b></h4>
                </div>

          
                <div class="card-body">

                    <form method="POST" action="{{ route('category.add.validate') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="categoryName"
                                   name="category_name"
                                   placeholder="Enter category name">

                            @error('category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                </div>

                <!-- <div class="card-footer d-flex justify-content-end">
                    
                    <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div> -->
                <div class="card-footer d-flex">
    <a href="{{ route('category') }}" class="btn btn-secondary">
        Back
    </a>

    <button type="submit" class="btn btn-primary ms-auto">
        Add
    </button>
</div>


            </div>

        </div>
    </div>
</div>

@endsection


 