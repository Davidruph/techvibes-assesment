@include('readers.include.header')

<div class="container">
        <div class="col-lg-12">
            @if ($books)
                <h5 class="lead fw-bold text-danger pt-3">Search Results: ({{ count($books) }} Results)</h5>
                <div class="row row-cols-1 row-cols-md-3 g-4 pt-5">
                    @foreach ($books as $listing)
                        <div class="col">
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
            @else
            <h5 class="lead fw-bold text-danger pt-3">Search Results: ({{ count($books) }} Results)</h5>
            @endif
        </div>
</div>

@include('readers.include.footer')