@include('librarian.include.header')

<div class="container">
    <div class="row justify-content-center pt-3 pb-5">
        <a href="/librarian/upload-books" class="btn btn-success w-auto ms-auto me-3"><i class="fa fa-plus"></i> Add a Book</a>
        <h1 class="pb-3 text-center display-5">Book Listings</h1>
        <div class="col-lg-12">
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
            
                    <table class="table table-hover" id="dataTable">
                        <thead class="thead-dark">
                          <tr>
                            <th cope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Revision Number</th>
                            <th scope="col">Published Date</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Author</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($books_data as $listing)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $listing->title }}</td>
                                <td>{{ $listing->isbn }}</td>
                                <td>{{ $listing->revision_number }}</td>
                                <td>{{ $listing->published_date }}</td>
                                <td>{{ $listing->publisher }}</td>
                                <td>{{ $listing->author }}</td>
                                <td>{{ $listing->genre }}</td>
                                <td><img src="{{ asset('books/image/'.$listing->cover_page_image) }}" width="50" height="50" class="img-fluid"></td>
                                <td>
                                    <a href="/librarian/books/edit/{{ $listing->id }}" class="me-3 text-decoration-none">
                                      <i class="fa fa-edit text-primary"></i>
                                    </a>
                                    <a href="/librarian/books/delete/{{ $listing->id }}">
                                      <i class="fa fa-trash text-danger text-decoration-none" onclick="return confirm('Are you sure you want to delete this book details?')"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
               
        </div>
    </div>
</div>

@include('librarian.include.footer')