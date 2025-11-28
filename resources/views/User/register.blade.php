@extends('layouts.title')
@section('title','User Registration Page')


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <style>
.card-primary.card-outline
 {
    border-top: 3px solid #0d6efd !important;
 }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">   
            
            <div class="card card-primary card-outline mb-4">
             
                <div class="card-header">
                    <div class="card-title">
                        <center><h3>User Registration</h3></center></div>
                </div>
                <form action="{{ route('user.datastore') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" name="name" id="Name" class="form-control"
                                   placeholder="Enter your Name" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Enter your password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                   id="password_confirmation" class="form-control"
                                   placeholder="Re-enter password">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <center>
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </center>
                        
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


       <!-- <script src="{{ asset('js_validation/register.js') }}"></script> -->
</body>
</html>
