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
                            <a href="/product/create"><button class="btn btn-success">Add</button></a>
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
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Is Ready?</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Gambar</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <i class="fa-solid fa-bowl-food px-2"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                </div>
                                            </div>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">@currency($item->harga)</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">
                                                @if ($item->is_ready === 1 )
                                                    Ready
                                                @else
                                                    Kosong
                                                @endif
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $item->categories->nama }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#picture{{$item->id}}">picture</a>
                                        </td>
                                        <td class="align-middle">
                                            @can('admin')
                                                <a href="/product/{{ $item->id }}/edit"><button
                                                        class="btn btn-warning">Edit</button></a>
                                                 <a href="" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct{{$item->id}}">Delete</a>
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


<!-- Modal picture-->
@foreach ($products as $item)
<div class="modal fade" id="picture{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Product {{$item->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="\img\{{$item->gambar}}" alt="" width="30%" height="30%">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div> 
@endforeach

<!-- Modal picture-->
@foreach ($products as $item)
<div class="modal fade" id="deleteProduct{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detele Product {{$item->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Yakin Delete Data ini? {{ $item->nama }}, data Akan Dihapus Permanen
        </div>
        <div class="modal-footer">
            <form action="product/{{$item->id}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
            </form>
        </div>
    </div>
    </div>
</div> 
@endforeach

@endsection
