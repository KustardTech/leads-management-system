<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-light shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Create Lead</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{route('lead.validate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control bg-dark text-light border-secondary" value="{{ old('name') }}">
                            @error('name')
                             <small class="text-danger">{{ $message }}</small> 
                             @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control bg-dark text-light border-secondary" value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control bg-dark text-light border-secondary" value="{{ old('phone') }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (Max 2MB)</label>
                            <input type="file" id="image" name="image" class="form-control bg-dark text-light border-secondary" value="{{old('image')}}">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="msg" class="form-label">Message</label>
                            <textarea id="msg" name="msg" class="form-control bg-dark text-light border-secondary">{{ old('msg') }}</textarea>
                            @error('msg') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                          <select name="category" id="category" class="form-select bg-dark text-light border-secondary" required>
                          <option value="">-- Select Category --</option>
                           @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}
                        </option>
                         @endforeach
                        </select>
                            @error('category') 
                                <small class="text-danger">{{ $message }}</small> 
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoXcZf0ihW6p4Rn1l9fHQ4mQjOV/xL1R8yy0v5QyDkF0ZJ" crossorigin="anonymous"></script>
