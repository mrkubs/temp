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
                        <div class="col-10"><h3 class="text-uppercase font-weight-bold text-xxs">{{$title}} Table</h3></div>
                        <div class="col-2">
                            @can('admin')
                            <a href="" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCategories">Add</a>
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
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-5">
                                        Nama</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                </div>
                                            </div>
                                        <td class="align-middle">
                                            @can('admin')
                                                <a href="" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCategories{{$item->id}}">Edit</a>
                                                <a href="" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategories{{$item->id}}">Delete</a>
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
<div class="modal fade" id="deleteCategories{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detele Categories {{$item->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Yakin Delete Data ini? {{ $item->nama }}, data Akan Dihapus Permanen
        </div>
        <div class="modal-footer">
            <form action="categories/{{$item->id}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
            </form>
        </div>
    </div>
    </div>
</div> 
@endforeach

<!-- Modal Edit-->
@foreach ($categories as $item)
<div class="modal fade" id="editCategories{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Categories {{$item->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="categories/{{ $item->id }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="title">Nama Categories</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="title" value="{{ old("nama", $item->nama) }}">
                    @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning mt-3">Update</button>
            </form>
        </div>
    </div>
    </div>
</div> 
@endforeach


<!-- Modal Add-->
<div class="modal fade" id="createCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="categories" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Categories</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="title" value="{{ old("nama") }}">
                    @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Add</button>
            </form>
        </div>
    </div>
    </div>
</div> 

@endsection
