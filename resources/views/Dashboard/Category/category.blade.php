@extends('layouts.title')
@extends('layouts.app')
@section('title','Category Page')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
</head>
<body>
    <div class="container py-4">
        <center><h2>Category Page</h2></center>

        <div class="mb-3">
            <a href="{{ route('category.add') }}"  class="btn btn-success">Add Category</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $index => $cat)
            <tr>
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

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this category?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
 <div>
    @endsection

