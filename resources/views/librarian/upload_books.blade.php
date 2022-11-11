@include('librarian.include.header')

<div class="container">
   
    <div class="row justify-content-center pt-3 pb-5">
        
        <div class="col-lg-8">
            <a href="/librarian" class="btn btn-success w-auto float-right"><i class="fa fa-plus"></i> View Books</a>
            <h4 class="text-danger text-center pb-3 pt-2">Upload a new Book</h4>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card shadow">
                <form action="/librarian/upload-books" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 px-5 pt-5">
                        <label for="formFile" class="form-label">Cover Page Image</label>
                        <input class="form-control @error('cover_page_image') is-invalid @enderror" type="file" name="cover_page_image">
                        <small><span class="text-danger">@error('cover_page_image'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput0" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput0" name="title" value="{{ old('title') }}">
                        <small><span class="text-danger">@error('title'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="exampleFormControlInput1" name="isbn" value="{{ old('isbn') }}" placeholder="978-3-16-148410-0">
                       <small> <span class="text-danger">@error('isbn'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Revision Number</label>
                        <input type="number" class="form-control @error('revision_number') is-invalid @enderror" id="exampleFormControlInput2" name="revision_number" value="{{ old('revision_number') }}">
                        <small><span class="text-danger">@error('revision_number'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Published Date</label>
                        <input type="date" class="form-control @error('published_date') is-invalid @enderror" id="exampleFormControlInput2" name="published_date" value="{{ old('published_date') }}">
                        <small><span class="text-danger">@error('published_date'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Publisher</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="exampleFormControlInput2" name="publisher" value="{{ old('publisher') }}">
                        <small><span class="text-danger">@error('publisher'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="exampleFormControlInput2" name="author" value="{{ old('author') }}">
                        <small><span class="text-danger">@error('author'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Genre of the book</label>
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="exampleFormControlInput2" name="genre" value="{{ old('genre') }}">
                        <small><span class="text-danger">@error('genre'){{ $message }}@enderror</span></small>
                    </div>
                    
                    <div class="mb-3 px-5 pb-4">
                        <input type="submit" class="btn btn-danger w-100" name="upload_book" value="Upload Book">
                    </div>
                </form>
                <a href="/librarian" class="text-center text-decoration-none mb-3">View Books</a>
            </div>
        </div>
    </div>
</div>

@include('librarian.include.footer')