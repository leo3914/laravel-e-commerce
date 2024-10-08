@extends('layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/cover1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/cover2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- ...........shop............ -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form>
                    <input type="" class="form-control" placeholder="Search here..." name="">
                </form>
            </div>
        </div>

        <div class="row mt-5 py-5">

            @foreach ($products as $product)
                <div class="col-sm-2">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('images/' . explode(',', $product->product_photo)[0]) }}" class="card-img-top"
                            alt="..." height="200px">
                        <div class="card-body text-center bg-light">
                            @if ($product->created_at->format('Y-m-d') >= date('Y-m-d', strtotime('-5days')))
                                <span class="badge bg-warning rounded-pill">New</span>
                            @endif
                            @if ($product->discount_price)
                                <span class="badge bg-success rounded-pill text-xxl">
                                    {{ round(100 - $product->discount_price/$product->price * 100, 2) }} % off
                                </span>
                            @endif
                            <span class="badge bg-danger rounded-pill">Best Seller</span>
                            <h6 class="card-title">{{ $product->name }}</h6>
                            @if ($product->discount_price)
                                <small><del>{{ $product->price }}</del> MMK</small>
                                <p class="card-text fw-bold"><small>{{ number_format($product->discount_price) }}
                                        MMK</small></p>
                            @else
                                <p class="card-text"><small>{{ $product->price }}</small></p>
                            @endif
                            <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary btn-sm">Buy Item</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="border container-fluid py-5 text-center bg-light mt-5">
        <b>Copyright by Lobelia Students</b>
    </div>
@endsection
