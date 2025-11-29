@extends('layouts.title')
@extends('layouts.app')
@section('title','Category Page')
@section('content')
<div class="app-content">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-8"> 
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Category List</h3>
                    <a href="{{ route('category.add') }}" class="btn btn-success btn-sm" style="margin-left:600px;">
                        Add Category
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60%">Category Name</th>
                                <th style="width: 40%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr class="align-middle">
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $cat->id) }}" 
                                            class="btn btn-warning btn-sm me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('category.delete', $cat->id) }}" 
                                              method="POST" 
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

