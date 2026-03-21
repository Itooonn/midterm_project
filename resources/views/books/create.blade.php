<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Book</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="book_id" class="form-label">Book ID</label>
                                <input type="text" class="form-control @error('book_id') is-invalid @enderror" 
                                       id="book_id" name="book_id" value="{{ old('book_id') }}" required>
                                @error('book_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                                <select name="genre" id="genre" class="form-select @error('genre') is-invalid @enderror" required>
                                    <option value="" selected disabled>-- Choose a Genre --</option>
                                    
                                    @php
                                        $genres = ['Sci-fi', 'Romance', 'Mystery', 'Fantasy', 'Action'];
                                    @endphp

                                    @foreach($genres as $genre)
                                        <option value="{{ $genre }}" {{ old('genre') == $genre ? 'selected' : '' }}>
                                            {{ $genre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="is_available" class="form-label">Available</label>
                                <select class="form-select @error('is_available') is-invalid @enderror" 
                                        id="is_available" name="is_available" required>
                                    <option value="">Select Availability</option>
                                    <option value="1" {{ old('is_available') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('is_available')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
