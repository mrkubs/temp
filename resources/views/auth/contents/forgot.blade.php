@extends('auth.auth')

@section('login')
    <main class="login-form my-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card justify-content-between">
                        <div class="card-header text-white text-center">Reset Password</div>
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <form action="{{ route('forget.password.post') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email_address"
                                        class="text-white col-md-3 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col d-flex pt-3 justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
