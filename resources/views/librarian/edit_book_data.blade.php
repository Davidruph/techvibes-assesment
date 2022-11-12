@include('librarian.include.header')

<div class="container">
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Edit Book Details</li>
        <li class="breadcrumb-item"><a href="/librarian">Go Back</a></li>
    </ol>
    <div class="row justify-content-center pt-5 pb-5">
        <div class="col-lg-8">
            <h4 class="text-danger text-center pb-3 pt-2">Update Book Details</h4>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" single_book-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" single_book-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card shadow">
                <form action="/librarian/books/update/{{ $single_book->id }}" method="post">
                    @csrf
                    
                    <div class="mb-3 px-5 pt-5">
                        <label for="exampleFormControlInput0" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput0" name="title" value="{{ $single_book->title }}">
                        <small><span class="text-danger">@error('title'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="exampleFormControlInput1" name="isbn" value="{{ $single_book->isbn }}" placeholder="978-3-16-148410-0">
                       <small> <span class="text-danger">@error('isbn'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Revision Number</label>
                        <input type="number" class="form-control @error('revision_number') is-invalid @enderror" id="exampleFormControlInput2" name="revision_number" value="{{ $single_book->revision_number }}">
                        <small><span class="text-danger">@error('revision_number'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Published Date</label>
                        <input type="date" class="form-control @error('published_date') is-invalid @enderror" id="exampleFormControlInput2" name="published_date" value="{{ $single_book->published_date }}">
                        <small><span class="text-danger">@error('published_date'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Publisher</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="exampleFormControlInput2" name="publisher" value="{{ $single_book->publisher }}">
                        <small><span class="text-danger">@error('publisher'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="exampleFormControlInput2" name="author" value="{{ $single_book->author }}">
                        <small><span class="text-danger">@error('author'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Genre of the book</label>
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="exampleFormControlInput2" name="genre" value="{{ $single_book->genre }}">
                        <small><span class="text-danger">@error('genre'){{ $message }}@enderror</span></small>
                    </div>
                    
                    <div class="mb-3 px-5 pb-4">
                        <input type="submit" class="btn btn-danger w-100" name="update_book" value="Update Book Details">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('librarian.include.footer')