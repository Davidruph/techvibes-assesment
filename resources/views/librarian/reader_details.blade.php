@include('librarian.include.header')

<div class="container">
    <div class="row justify-content-center pt-5">
        <h1 class="pb-3 text-center display-5">User Details</h1>
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover" id="dataTable">
                        <thead class="thead-dark">
                          <tr>
                            <th cope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">profile Image</th>
                            <th scope="col">Date and time Registered</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_data as $listing)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $listing->name }}</td>
                                <td>{{ $listing->email }}</td>
                                <td><img src="{{ asset('readers/image/'.$listing->profile_image) }}" width="50" height="50" class="rounded-circle ms-2"></td>
                                <td>{{ $listing->created_at }}</td>
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