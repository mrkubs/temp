<head>
    <link rel="stylesheet" href="/assets/css/category-style.css">
</head>
@extends('admin')
@section('content')
    <div class="dashboard-content px-3 pt-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-1 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-2">
                            <h6 class="font-weight-bold text-xxs ps-3">Category List</h6>
                            @can('admin')
                                <div class="card-body p-1 px-4"><a href="/account/add"><button
                                            class="btn btn-success">Add</button></a></div>
                            @endcan
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
                    <div class="card-body p-3 pb-5">
                        @foreach ($categories as $category)
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $category->nama }}</td>
                                        @can('admin')
                                            <td>
                                                <a href="/category/{{ $category->id }}/edit"><button
                                                        class="btn btn-warning">Edit</button></a>
                                                <a href="/category/delete/{{ $category->id }}" onclick="confifmAction()"><button
                                                        class="btn btn-danger">Delete</button></a>
                                            </td>
                                        @endcan
                                    </tr>
                                </tbody>
                        @endforeach
                        </table>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 px-5">
                                        Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <i class="fa-solid fa-user px-2"></i>
                                                </div>
                                                <div class="d-flex px-2 py-1">
                                                    <h6 class="mb-0 text-sm"></h6>
                                                </div>
                                            </div>
                                        <td class="d-flex justify-content-between">

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
@endsection
