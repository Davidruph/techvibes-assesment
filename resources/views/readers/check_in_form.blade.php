@include('readers.include.header')

<div class="container">
    <div class="row justify-content-center pt-5 pb-5">
        <div class="col-lg-6">
            <h4 class="text-danger text-center pb-3 pt-2">Return a book</h4>
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
                <form action="/reader/return-book" method="post">
                    @csrf
                    <div class="pt-5">
                        <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput0" placeholder="Jane Doe" name="name" value="{{ $data->name }}">
                        <small><span class="text-danger">@error('name'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="px-5">
                        <input type="hidden" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ $data->email }}">
                       <small> <span class="text-danger">@error('email'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Select Book</label>
                        <select name="book" class="form-select">
                            <option value="">Select a Book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->title }}">{{ $book->title . ','. ' ' . 'by'. ' ' . $book->author }}</option>
                            @endforeach
                        </select>
                        <small><span class="text-danger">@error('book'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Check in date</label>
                        <input type="date" name="check_in_date" class="form-control @error('check_in_date') is-invalid @enderror">
                        <small><span class="text-danger">@error('check_in_date'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5 pb-4">
                        <input type="submit" class="btn btn-danger w-100" name="check_in" value="Check In">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('readers.include.footer')