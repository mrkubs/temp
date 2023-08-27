@extends('admin')
@section('content')
    <div class="row px-5 pt-3 col-7 justify-content-center align-items-center">
        <div class="col-10">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

        </div>
        <div class="card my-1 mx-1">
            <div class="card-header p-1 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-uppercase font-weight-bold text-xxs ps-3">Add Account</h6>
                </div>
                <div class="card mx-2 my-3 ">
                    <form class="px-3 py-4" method="post" action="/account">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                            @error('password')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/account"><button type="button" class="btn btn-secondary">Back</button></a>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
