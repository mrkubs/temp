@extends('index')

@section('content')
    @include('home.partials.navpart')


    <!-- Team Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
                <h1 class="mb-5">Our Menu</h1>
                <div class="row g-4 mb-3">
                    <div class="col-sm-12">
                        <form action="/category-filter" method="get">
                            @csrf
                            <div class="d-flex">
                                <select name="gender" class="form-select">
                                    <option value="female"
                                        selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">
                                        Female
                                    </option>
                                    <option value="male"
                                        selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">
                                        Male
                                    </option>
                                    <option value="" selected="">Select</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-secondary ">Filter</button>
                            </div>
                            <div class="d-flex">
                                <input name="name" type="text" class="form-control" placeholder="Search Menu"
                                    value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-secondary ">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded overflow-hidden mb-2">
                                <img class="img-fluid" src="\img\{{ $product->gambar }}" alt="">
                            </div>
                            <h5 class="mb-0">{{ $product->nama }}</h5>
                            <small>Rp.{{ $product->harga }}</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fa fa-info"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
