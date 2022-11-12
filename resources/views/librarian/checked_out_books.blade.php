@include('librarian.include.header')

<div class="container">
    <div class="row justify-content-center pt-5">
        <h1 class="pb-3 text-center display-5">Checked out Books</h1>
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover" id="dataTable">
                        <thead class="thead-dark">
                          <tr>
                            <th cope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Borrowed by</th>
                            <th scope="col">Checked out date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($book_data as $listing)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $listing->book }}</td>
                                <td>{{ $listing->name }}</td>
                                <td>{{ $listing->check_out_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('librarian.include.footer')