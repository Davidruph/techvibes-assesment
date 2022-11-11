<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
            <div class="col-lg-6">
                <h4 class="text-danger text-center pb-3 pt-2">Register new Account</h4>
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
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 px-5 pt-5">
                            <label for="exampleFormControlInput0" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput0" placeholder="Jane Doe" name="name" value="{{ old('name') }}">
                            <small><span class="text-danger">@error('name'){{ $message }}@enderror</span></small>
                        </div>
                        <div class="mb-3 px-5">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                           <small> <span class="text-danger">@error('email'){{ $message }}@enderror</span></small>
                        </div>
                        <div class="mb-3 px-5">
                            <label for="exampleFormControlInput2" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput2" name="password">
                            <small><span class="text-danger">@error('password'){{ $message }}@enderror</span></small>
                        </div>
                        <div class="mb-3 px-5">
                            <label for="formFile" class="form-label">Profile Image</label>
                            <input class="form-control @error('profile_image') is-invalid @enderror" type="file" name="profile_image">
                            <small><span class="text-danger">@error('profile_image'){{ $message }}@enderror</span></small>
                        </div>
                        <div class="mb-3 px-5 pb-4">
                            <input type="submit" class="btn btn-danger w-100" name="register" value="Register">
                        </div>
                    </form>
                    <a href="/login" class="text-center text-decoration-none mb-3">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>