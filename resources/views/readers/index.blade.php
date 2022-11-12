@include('readers.include.header')

<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-lg-8">

            <p class="lead  text-center pb-3"><small>You can search for books based on one or more of the following fields: <br> <b><i>Title, ISBN, Publisher, date added to library</i></b></small></p>
            <form action="/reader/search" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control @error('search_field') is-invalid @enderror" aria-label="Search" aria-describedby="basic-addon2" name="search_field">
                    <span class="input-group-text bg-transparent border-left-0" id="basic-addon2"><button type="submit" class="btn btn-success" name="search_btn"><i class="fa fa-search"></i> Search Books</button></span>
                </div>
                <small><span class="text-danger">@error('search_field'){{ $message }}@enderror</span></small>
            </form>     
        </div>
    </div>

    <div class="col-lg-12">
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-5 pb-5">
            @foreach ($books as $listing)
                <div class="col-lg-3">
                    <div class="card h-100">
                        <img src="{{ asset('books/image/'.$listing->cover_page_image) }}" class="card-img-top" height="250">
                        <div class="card-body">
                            <h5 class="card-title">{{ $listing->title }}</h5>
                            <p class="card-text"><td>By {{ $listing->author }}</td></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('readers.include.footer')