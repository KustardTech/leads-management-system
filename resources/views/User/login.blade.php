@extends('layouts.title')
@section('title','User Login Page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <style>
.card-danger.card-outline
{
    border-top: 3px solid #dc3545 !important;   
}
</style>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-4">
        <div class="card card-danger card-outline mb-4">
            <div class="card-header">
                <div class="card-title">
                    <center><h3>User Login</h3></center></div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

               
                <form method="POST" action="{{ route('check.login') }}">
                    @csrf

                 
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Enter your email"
                            autofocus
                        >
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                  
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Enter your password"
                        >
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            </div>

       
            <div class="card-footer">
            <center>  <button type="submit" class="btn btn-primary w-60">Login</button></center>
                <div class="text-center mt-3">
                    <p class="mb-0">
                        Don't have an account? 
                        <a href="{{ route('user.register') }}">Register here</a>
                    </p>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>