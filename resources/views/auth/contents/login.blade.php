@extends('auth.auth')

@section('login')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-7">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-md-6 ">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="/assets/images/logo-no-background.png" style="width: 230px;" alt="logo"
                                    class="img-fluid">
                            </div>
                            <div class="row d-flex justify-content-center">
                                @if (session()->has('logError'))
                                    <div class="d-flex alert alert-danger col-6 mt-3 mb-2 py-2 justify-content-center"
                                        role="alert">
                                        {{ session('logError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="close"></button>
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success col-6 mt-3 mb-2 py-2 justify-content-center"
                                        role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="close"></button>
                                    </div>
                                @endif
                            </div>
                            <form action="/login" method="post">
                                @csrf
                                <div class="text-center my-4 text-white">
                                    <p>Please login to your account</p>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label text-white">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Address" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label text-white">Password</label>
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
                                        class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                                        in</button>
                                </div>
                                <div class="text-center mb-1 pb-1">
                                    <a class="text-secondary" href="/forget-password">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-flex ">
                        <img src="/assets/images/login-img.jpg" alt="background-image" class="login-card-img rounded-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
