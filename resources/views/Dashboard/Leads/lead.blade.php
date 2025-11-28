@extends('layouts.app')
@extends('layouts.title')
@section('title','Leads Page')
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<div class="app-content">
    <div class="container d-flex justify-content-center mt-5">

        <div class="col-md-lg"> 

            <div class="card card-primary card-outline mb-4">

    <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0"><b>All Leads</b></h4> 
    <a href="{{ route('leads.add') }}" class="btn btn-success btn-sm" style="margin-left:780px;">Add Lead</a>
    </div>
    


              
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                      
                     <div class="mb-3">
                        <input type="text" id="userSearch" class="form-control" placeholder="Search leads...">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="leadsTable">
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
                                    <tr class="align-middle">
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->mobile }}</td>
                                        <td>
                                        <img src="{{ asset('storage/' . $lead->image) }}" alt="Lead Image" style="max-width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $lead->message }}</td>
                                        <td>
                                            <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>

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

                </div>
            </div>

        </div>

    </div>
</div>
<script>
$(document).ready(function() {

    var table = $('#leadsTable').DataTable({
        paging: true,         
        info: true,            
        ordering: true,        
        lengthChange: false,   
        searching: true,       
        dom: 'lrtip'           
    });

    
    $('#userSearch').on('keyup', function () {
        table.search(this.value).draw();
    });

});
</script>

@endsection

