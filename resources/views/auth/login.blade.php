<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/assets/css/style-login.css">
</head>


<body>
    <section class="h-100 gradient-form" style="background-color: #a79898;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-md-6 ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="/assets/images/logo-no-background.png" style="width: 230px;"
                                            alt="logo">
                                    </div>
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="row justify-content-center">
                                            @if (session()->has('logError'))
                                                <div class="alert alert-danger col-6 mt-3 mb-2 py-2 justify-content-center"
                                                    role="alert">
                                                    {{ session('logError') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="close"></button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-center my-4">
                                            <h5>Please login to your account</h5>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Username</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email Address" value="{{ old('email') }}" autofocus>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="***********">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <button name="submit" type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="button">Log
                                                in</button>
                                        </div>
                                        <div class="text-center mb-1 pb-1">
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="/assets/images/login-img.jpg" alt="background-image" class="login-card-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</body>
