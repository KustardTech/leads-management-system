@extends('layouts.title')
@section('title','User Registration Page')


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>

 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center mb-4">User Registration</h3>

                    <form action="{{route('user.datastore')}}" method="post" >
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name:</label>
                            <input type="text" name="name" id="Name" class="form-control" placeholder="Enter your Name" value="{{ old('name') }}">
                            <span id="name-error" class="text-danger"></span>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                     
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                            <span id="email-error" class="text-danger"></span>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                 

                     
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            <span id="password-error" class="text-danger"></span>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter password">
                            <span id="confirm-password-error" class="text-danger"></span>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                  
                      
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                       
                        @if(session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        <div class="text-danger mt-2" id="allErrors"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <br>


       <!-- <script src="{{ asset('js_validation/register.js') }}"></script> -->
</body>
</html>
