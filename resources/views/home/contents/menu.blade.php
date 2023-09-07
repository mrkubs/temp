@extends('index')

@section('content')
    @include('home.partials.navpart')


    <!-- Team Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
                <h1 class="mb-3">Our Menu</h1>
                <div class="row g-4 mb-3">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <form action="/search" method="get">
                            @csrf
                            <div class="d-flex my-2">
                                <div class="d-flex col-sm-6 px-2">
                                    <select name="category" class="form-select">
                                        @foreach ($cate as $category)
                                            <option value="{{ $category->id }}"
                                                {{ collect(request()->category)->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->nama }}
                                            </option>
                                        @endforeach
                                        <option value="" selected="">Category</option>

                                    </select>
                                    <button type="submit" class="btn btn-secondary mx-1">Filter</button>
                                </div>
                                <div class="d-flex col-sm-6 px-2">
                                    <input name="name" type="text" class="form-control" placeholder="Search Menu"
                                        value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                                    <button type="submit" class="btn btn-secondary mx-1 ">Search</button>
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
    </div>
    <!-- Team End -->
@endsection
