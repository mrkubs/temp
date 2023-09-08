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
                                    <a href="" type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#createCategories">Add</a>
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
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($categories as $item)
                                        <tr class="text-center">
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                            <td>
                                                <a href="" type="button" class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#picture{{ $item->id }}">picture</a>
                                                @can('admin')
                                                    <a href="" type="button" class="btn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editCategories{{ $item->id }}">Edit</a>
                                                    <a href="" type="button" class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteCategories{{ $item->id }}">Delete</a>
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

    <!-- Modal Delete-->
    @foreach ($categories as $item)
        <div class="modal fade" id="deleteCategories{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detele Categories {{ $item->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin Delete Data ini? {{ $item->nama }}, data Akan Dihapus Permanen
                    </div>
                    <div class="modal-footer">
                        <form action="categories/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Category Edit-->
    @foreach ($categories as $item)
        <div class="modal fade" id="editCategories{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Categories {{ $item->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="categories/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Nama Categories</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="title" value="{{ old('nama', $item->nama) }}">
                                @error('nama')
                                    <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoryGambar" class="form-label">Gambar</label>
                                <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                    id="categoryGambar" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Category Add-->
    <div class="modal fade" id="createCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="categories" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Nama Categories</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="title" value="{{ old('nama') }}">
                            @error('nama')
                                <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoryGambar" class="form-label">Gambar</label>
                            <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                id="categoryGambar" name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Category picture-->
    @foreach ($categories as $item)
        <div class="modal fade" id="picture{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image Category {{ $item->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="\img\categories\{{ $item->gambar }}" alt="" width="30%" height="30%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
