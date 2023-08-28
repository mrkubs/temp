@extends('admin')
@section('content')
    <script>
        const confirmAction = () => {
            const response = confirm("Are you sure you want to do that?");

            if (response) {
                alert("Ok was pressed");
            } else {
                alert("Cancel was pressed");
            }
        }
    </script>
    <div class="dashboard-content px-3 pt-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="text-uppercase font-weight-bold text-xxs">{{ $title }} Table</h3>
                            </div>
                            <div class="col-2">
                                @can('admin')
                                    <a data-bs-toggle="modal" data-bs-target="#createUser" class="btn btn-success">Add</a>

                                    <!-- Modal Add-->
                                    <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="user" method="POST">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <label for="name">Nama User</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="name" value="{{ old('name') }}">
                                                            @error('name')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="nohp">No Handphone</label>
                                                            <input type="number"
                                                                class="form-control @error('nohp') is-invalid @enderror"
                                                                name="nohp" id="nohp" value="{{ old('nohp') }}">
                                                            @error('nohp')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text"
                                                                class="form-control @error('alamat') is-invalid @enderror"
                                                                name="alamat" id="alamat" value="{{ old('alamat') }}">
                                                            @error('alamat')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="email">Email</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" id="email" value="{{ old('email') }}"
                                                                required>
                                                            @error('email')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="password">Password</label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" id="password" value="{{ old('password') }}"
                                                                required>
                                                            @error('password')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="password_confirmation">Konfirmasi password</label>
                                                            <input type="password"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                name="password_confirmation" id="password_confirmation"
                                                                value="{{ old('password_confirmation') }}" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="level">Level</label>
                                                            <select class="form-control @error('level') is-invalid @enderror"
                                                                name="level" id="level">
                                                                <option value="">~ pilih level ~</option>
                                                                <option value="admin"
                                                                    {{ old('level') == 'admin' ? 'selected' : '' }}>admin
                                                                </option>
                                                                <option value="kasir"
                                                                    {{ old('level') == 'kasir' ? 'selected' : '' }}>kasir
                                                                </option>
                                                                <option value="manager"
                                                                    {{ old('level') == 'manager' ? 'selected' : '' }}>manager
                                                                </option>
                                                            </select>
                                                            @error('level')
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-success mt-3">Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('delete'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif
                        @if ($errors->all())
                            <div class="alert alert-danger text-center" role="alert">
                                There is an error in the form!
                            </div>
                        @endif
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-5">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <i class="fa-solid fa-user border-radius-lg px-2"></i>

                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                    </div>
                                                </div>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->email }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a data-bs-toggle="modal" data-bs-target="#viewUser{{ $user->id }}"
                                                    class="btn btn-primary">View </a>

                                                <!-- Modal View-->
                                                <div class="modal fade" id="viewUser{{ $user->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail User
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>ID</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->id }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Name</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alamat</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->alamat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>No HP</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->nohp }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Level</td>
                                                                        <td>:</td>
                                                                        <td>{{ $user->level }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @can('admin')
                                                    <a data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}"
                                                        class="btn btn-warning">Edit</a>

                                                    <!-- Modal Edit-->
                                                    <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User
                                                                        {{ $user->name }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="user/{{ $user->id }}" method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="form-group mb-3">
                                                                            <label for="name">Nama User</label>
                                                                            <input type="text"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="name" id="name"
                                                                                value="{{ $user->name }}">
                                                                            @error('name')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="nohp">No Handphone</label>
                                                                            <input type="number"
                                                                                class="form-control @error('nohp') is-invalid @enderror"
                                                                                name="nohp" id="nohp"
                                                                                value="{{ $user->nohp }}">
                                                                            @error('nohp')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="alamat">Alamat</label>
                                                                            <input type="text"
                                                                                class="form-control @error('alamat') is-invalid @enderror"
                                                                                name="alamat" id="alamat"
                                                                                value="{{ $user->alamat }}">
                                                                            @error('alamat')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="email">Email</label>
                                                                            <input type="email"
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                name="email" id="email"
                                                                                value="{{ $user->email }}" required>
                                                                            @error('email')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="password">Password</label>
                                                                            <input type="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                name="password" id="password">
                                                                            <small>* <i>Leave blank if you don't want to change
                                                                                    the password</i></small>
                                                                            @error('password')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="password_confirmation">Konfirmasi
                                                                                password</label>
                                                                            <input type="password"
                                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                                name="password_confirmation"
                                                                                id="password_confirmation">
                                                                            <small>* <i>Leave blank if you don't want to change
                                                                                    the password</i></small>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="level">Level</label>
                                                                            <select
                                                                                class="form-control @error('level') is-invalid @enderror"
                                                                                name="level" id="level">
                                                                                <option value="">~ pilih level ~</option>
                                                                                <option value="admin"
                                                                                    {{ $user->level == 'admin' ? 'selected' : '' }}>
                                                                                    admin
                                                                                </option>
                                                                                <option value="kasir"
                                                                                    {{ $user->level == 'kasir' ? 'selected' : '' }}>
                                                                                    kasir
                                                                                </option>
                                                                                <option value="manager"
                                                                                    {{ $user->level == 'manager' ? 'selected' : '' }}>
                                                                                    manager
                                                                                </option>
                                                                            </select>
                                                                            @error('level')
                                                                                <div id="validationServer03Feedback"
                                                                                    class="invalid-feedback">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-warning mt-3">Update</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- delete --}}
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteUser{{ $user->id }}"><button
                                                            class="btn btn-danger">Delete</button></a>

                                                    {{-- modal delete --}}
                                                    <div class="modal fade" id="deleteUser{{ $user->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detele
                                                                        User {{ $user->nama }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure Delete this Data? {{ $user->name }}, data
                                                                    will
                                                                    Permanently Deleted
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="user/{{ $user->id }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="submit" class="btn btn-danger btn-sm"
                                                                            value="Delete">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
