@extends('index')

@section('content')
    @include('home.partials.navpart')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-10">
                    @foreach (session('cart') as $id => $product)
                        <form action="/order/{{ $product['id'] }}" method="POST">
                            @csrf
                    @endforeach
                    @if (session()->has('deleted'))
                        <div class="alert alert-success text-center fade show" role="alert">
                            {{ session('deleted') }}

                        </div>
                    @endif
                    @if (session()->has('failed'))
                        <div class="alert alert-danger text-center fade show" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Details</h3>
                        <!--<div>
                                                                                                                                                                <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                                                                                                                                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                                                                                                                                            </div>-->
                    </div>
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $product)
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="\img\{{ $product['image'] }}" class="img-fluid rounded-3"
                                                alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">{{ $product['name'] }}</p>
                                            <p> <span class="text-muted">
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity"
                                                value="{{ $product['quantity'] }}" type="number"
                                                class="form-control form-control-sm" />

                                            <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <input type="text" class="form-control" name="price"
                                                value="@currency($product['price'])" readonly="readonly">
                                            <h5 class="mb-0"> </h5>
                                        </div>
                                        <div class="actions col-md-1 col-lg-1 col-xl-1 text-end">
                                            <button class="btn text-danger btn-sm delete-cart"
                                                data-product-id="{{ $id }}"><i
                                                    class="fas fa-trash fa-lg"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                            <div class="form-outline flex-fill mx-1">
                                <label class="form-label" for="form1">Name</label>
                                <input type="text" id="form1" name="nama" class="form-control form-control-lg"
                                    required />

                            </div>
                            <div class="form-outline flex-fil mx-1">
                                <label class="form-label" for="form1" @required(true)>Phone Number</label>
                                <input type="text" id="form1" name="number" class="form-control form-control-lg"
                                    required />

                            </div>
                            <div class="form-outline flex-fill mx-1">
                                <label class="form-label" for="form1" @required(true)>Table Number</label>
                                <select id="disabledSelect" class="form-control form-control-lg" required
                                    placeholder="Select Table" name="nomeja">
                                    <option value="">Select Table</option>
                                    <option value="table1">Table 01</option>
                                    <option value="table2">Table 02</option>
                                    <option value="table3">Table 03</option>
                                    <option value="table4">Table 04</option>
                                    <option value="table5">Table 05</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <!--<div class="card-body p-4 d-flex flex-row">
                                                                                                                                <div class="form-outline flex-fill">
                                                                                                                                    <input type="text" id="form1" class="form-control form-control-lg" />
                                                                                                                                    <label class="form-label" for="form1">Discound code</label>
                                                                                                                                </div>
                                                                                                                                <div class="">
                                                                                                                                    <button type="button" class="btn btn-outline-success btn-lg ms-3">Apply</button>
                                                                                                                                </div>

                                                                                                                            </div>-->
                    </div>

                    <div class="card d-flex">
                        <div class="card-body d-flex  justify-content-center">
                            <button type="submit" class="btn btn-warning btn-block btn-lg">Add to Cart</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-cart').click(function(e) {
                e.preventDefault();

                var productId = $(this).data('product-id');

                if (confirm("Do you really want to delete?")) {
                    $.ajax({
                        url: '/delete-cart-product/' + productId,
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            } else {
                                alert('Failed to delete item.');
                            }
                        },
                        error: function(xhr) {
                            alert('Error: ' + xhr.statusText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
