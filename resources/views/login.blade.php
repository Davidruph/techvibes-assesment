<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
    <div class="row justify-content-center pt-5 pb-5">
        <div class="col-lg-6">
            <h4 class="text-danger text-center pb-3 pt-2">Login to Account</h4>
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
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3 px-5 pt-5">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        <small><span class="text-danger">@error('email'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5">
                        <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput2" name="password">
                        <small><span class="text-danger">@error('password'){{ $message }}@enderror</span></small>
                    </div>
                    <div class="mb-3 px-5 pb-5">
                        <input type="submit" class="btn btn-danger w-100" name="login" value="Login">
                    </div>
                </form>
                <a href="/register" class="text-center text-decoration-none mb-3">Register</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>