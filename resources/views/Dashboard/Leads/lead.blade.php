@extends('layouts.app')
@extends('layouts.title')
@section('title','Leads Page')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Leads</h2>
        <a href="{{ route('leads.add') }}" class="btn btn-primary">Add Lead</a>
    </div>
       @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                     <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                    <tr>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->mobile }}</td>
                        <td>{{ $lead->image }}</td>
                        <td>{{ $lead->message }}</td>
                        <td>
                          
                            <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-warning">Edit</a>
                       
                            <form action="{{ route('leads.delete', $lead->id) }}" method="POST" class="d-inline">
                            @csrf
                           @method('DELETE') 
                          <button type="submit" class="btn btn-danger btn-sm" 
                          onclick="return confirm('Are you sure you want to delete this lead?')">
                           Delete
                         </button>
                         </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No leads found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
       
    </div>
        <div class="conatiner">
        {{$leads->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection

