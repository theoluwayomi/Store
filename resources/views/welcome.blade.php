@extends('layouts.app')

@section('title', '9jastore')
@section('content')
<!--================Home Banner Area =================-->
<section class="section_top">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/banner/banner.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner/banner.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner/banner.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner/banner.jpg') }}" alt="Fourth slide">
        </div>
      </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Hot Deals Area =================-->
<section class="hot_deals_area ">
    <div class="container-fluid" style="background-color: #dbf3fb;">
        <div class="row">
            <div class="col-12 py-3">
                <p style="line-height: 1.5em; font-size: 1.2em;">9jastore enable users to buy products and services at best discount prices, we research, analyze and sort out products and best prices from popular vendors such as Amazon, Alibaba, Jumia, Konga, e.t.c to give you the best quality and best price as possible.</p>
            </div>
        </div>
    </div>
</section>
<!--================End Hot Deals Area =================-->

<!--================Feature Product Area =================-->
<section class="feature_product_area mt-5">
    @include('partials.message')
    <div class="main_box">
        <div class="container-fluid">
            <div class="row">
                <div class="main_title">
                    <h2>Featured Products</h2>
                    <p>Top trending products on 9jastore</p>
                </div>
            </div>
            <div class="row">
                @php
                $i = 1;
                @endphp
                @foreach($products as $product)
                <div class="col-6 col col{{$i++}}">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            @if(!$product->inStock())
                            <div class="tag">
                                <span class="badge badge-danger">Sold Out</span>
                            </div>
                            @endif
                            <img class="img-fluid" src="{{ productImage($product->image) }}" alt="">
                            <div class="p_icon">
                                <form method="post" action="{{ route('cart.store', $product) }}">
                                    @csrf
                                    <button type="submit" class="btn">
                                        <i class="lnr lnr-cart"></i>
                                    </buttom>
                                </form>
                            </div>
                        </div>
                        <a href="{{ route('product', $product->slug) }}">
                            <h4 class="product_name">{{ $product->name }}</h4>
                        </a>
                        <h6 class="normal_product_price"><del>&#8358;{{ presentPrice($product->normalPrice) }}</del></h6>
                        <h5 class="product_price">&#8358;{{ presentPrice($product->price) }}</h5>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<!--================End Feature Product Area =================-->

@endsection
