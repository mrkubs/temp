@extends('index')

@section('content')
    @include('home.partials.navpart')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-10">
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
                        <h3 class="fw-normal mb-0 text-black">Orders</h3>
                        <!--<div>
                                                                                                                                                                                                                                                                                                                                                                                <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                                                                                                                                                                                                                                                                                                                                                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                                                                                                                                                                                                                                                                                                                                                            </div>-->
                    </div>
                    @if (session('cart'))
                        @foreach ($order as $order)
                            @foreach ($order_details as $details)
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="\img\{{ $details->products->gambar }}" class="img-fluid rounded-3"
                                                    alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">{{ $details->products->nama }}</p>
                                                <p> <span class="text-muted">
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


                                                <input id="form1" min="0" name="quantity"
                                                    value="{{ $details->qty }}" type="number"
                                                    class="form-control form-control-sm text-center" readonly="readonly">


                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <input type="text" class="form-control" name="price"
                                                    value="@currency($details->total_harga)" readonly="readonly">
                                                <h5 class="mb-0"> </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="card mb-4">
                                <div class="card-body p-4 d-flex">
                                    <div class="form-outline flex-fill mx-1">
                                        <label for="staticEmail" class="form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="{{ $order->nama_pemesan }}">
                                        </div>
                                    </div>
                                    <div class="form-outline flex-fill mx-1 ">
                                        <label for="staticEmail" class="form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="{{ $order->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="form-outline flex-fill mx-1">
                                        <label class="form-label" for="form1">Table Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="{{ $order->nomeja }}">
                                        </div>

                                    </div>
                                    <div class="form-outline flex-fill mx-1 justify-content-center">
                                        <label class="form-label" for="form1">Total Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="@currency($order->total_harga)">
                                        </div>

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
                        @endforeach
                    @endif
                    <div class="card d-flex">
                        <div class="card-body d-flex  justify-content-center">
                            <button type="submit" class="btn btn-warning btn-block btn-lg">Checkout</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('script')
@endsection
