@extends('layouts.app')

@section('title', 'Single Product')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Single Product Page</h2>
				<div class="page_link">
					<a href="{{ route('landing-page')}}">Home</a>
					<a href="{{ route('category')}}">Category</a>
					<a href="{{ route('product', $product->slug)}}">{{ $product->name }}</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area pt-4">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_product_img">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">

							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
								<img src="{{ productImage($product->image) }}" width="60" height="60" alt="">
							</li>
							@php
							$i = 1;
							@endphp
							@foreach(productImages($product->images)->all() as $image)
							<li data-target="#carouselExampleIndicators" data-slide-to="{{ $i++ }}">
								<img src="{{ productImage($image) }}" width="60" height="60" alt="{{ productImage($image) }}">
							</li>
							@endforeach
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="{{ productImage($product->image) }}" alt="First slide">
							</div>
							@foreach(productImages($product->images)->all() as $image)
							<div class="carousel-item">
								<img class="d-block w-100" src="{{ productImage($image) }}" alt="Second slide">
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{ $product->name }}</h3>
					<h2>&#8358; {{ presentPrice($product->price) }} <del class="h6 text-danger">&#8358; {{ presentPrice($product->normalPrice) }}</del></h2>
					<ul class="list">
						<li>
							<a class="active" href="#">
								<span>Category</span> : {!! $category !!}</a>
						</li>
						<li>
							<a href="#">
								<span>Availibility</span> : {!! $stockLevel !!}</a>
						</li>
					</ul>
					<p>{{ $product->details }}</p>
					<hr>
					<div class="card_area">
						<form method="post" action="{{ route('cart.store', $product) }}">
							@csrf
							<button class="{{ (!$product->inStock()) ? 'btn btn-danger' : 'main_btn'}}" type="submit" {{ (!$product->inStock()) ? 'disabled' : ''}}>{{ (!$product->inStock()) ? 'Sold Out!' : 'Add to Cart'}}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area mt-4 pb-5">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane active text-dark" id="home" role="tabpanel" aria-labelledby="home-tab">
				{!! $product->description !!}
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

@endsection