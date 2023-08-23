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
                    <div class="card-header p-1 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-uppercase font-weight-bold text-xxs ps-3">Users Table</h6>
                            <div class="card-body p-1 px-4 py-3"><a href="/account/add"><button
                                        class="btn btn-success">Add</button></a></div>
                        </div>
                        <div class="col-5">
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
                        </div>
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
                                                <a href="/account/{{ $user->id }}"> <button
                                                        class="btn btn-primary">View</button></a>
                                                <a href="/account/{{ $user->id }}/edit"><button
                                                        class="btn btn-warning">Edit</button></a>
                                                <a href="/account/delete/{{ $user->id }}"
                                                    onclick="confifmAction()"><button
                                                        class="btn btn-danger">Delete</button></a>
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
