<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Book</h3>
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

                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Book ID</label>
                                <input type="text" class="form-control" value="{{ $book->book_id }}" disabled>      
                                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" value="{{ $book->title }}" disabled>      
                                <input type="hidden" name="title" value="{{ $book->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <input type="text" class="form-control" value="{{ $book->genre }}" disabled>      
                                <input type="hidden" name="genre" value="{{ $book->genre }}">
                            </div>

                            <div class="mb-3">
                                <label for="is_available" class="form-label">Available</label>
                                <select class="form-select @error('is_available') is-invalid @enderror" 
                                        id="is_available" name="is_available" required>
                                    <option value="">Select Availability</option>
                                    <option value="1" {{ old('is_available', $book->is_available) == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_available', $book->is_available) == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('is_available')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Book</button>
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
