@extends('layouts.app')

@section('title', 'Categories')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Shop Category Page</h2>
				<div class="page_link">
					<a href="{{ route('landing-page') }}">Home</a>
					<a href="{{ route('category') }}">Category</a>
					<a href="{{ route('category', ['category' => request()->category]) }}">{{ $categoryName }}</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area mt-4">
	@include('partials.message')
	<div class="container-fluid">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				<div class="product_top_bar">
					<h3>{{ $categoryName }}</h3>
					<hr> 
					<div class="left_dorp">
						<select class="sorting" id="sorting">
							<option value="">Default</option>
							<option value="low_high" {{ isset(request()->sort) && (request()->sort == 'low_high') ? 'selected' : '' }}>Price: Low to High</option>
							<option value="high_low" {{ isset(request()->sort) && (request()->sort == 'high_low') ? 'selected' : '' }}>Price: High to Low</option>
						</select>
					</div>
					<div class="right_page ml-auto">
						{{ $products->links() }}
					</div>
				</div>
				<div class="latest_product_inner row">
                	@forelse($products as $product)
					<div class="col-lg-3 col-md-3 col-6">
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
								<h4>{{ $product->name }}</h4>
							</a>
                        	<h6 class="normal_product_price"><del>&#8358;{{ presentPrice($product->normalPrice) }}</del></h6>
                        <h5 class="product_price">&#8358;{{ presentPrice($product->price) }}</h5>
						</div>
					</div>
					@empty
					<h3 class="text-center ml-5">No Product found for this category!</h3>
					@endforelse
				</div>
			</div>
			<div class="col-lg-3">
				<div class="left_sidebar_area">
					<aside class="left_widgets cat_widgets">
						<div class="l_w_title">
							<h3>Browse Categories</h3>
						</div>
						<div class="widgets_inner">
							<ul class="list">
								<li class=""><a href="{{ route('category') }}">Featured Products</a></li>
								@foreach ($categories as $category)
				                    <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('category', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
				                @endforeach
							</ul>
						</div>
					</aside>
					
				</div>
			</div>
		</div>
		
		<div class="row mt-2">
			{{ $products->links() }}
		</div>
	</div>
</section>
<!--================End Category Product Area =================-->
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
        $("#sorting").change(function() {
            var option = $("#sorting option:selected").val();
            if (option.length) {

            	var arg = "<?php echo (isset(request()->category) or isset(request()->sort) or isset(request()->pg)) ?>";
            	

            	var address = "<?php echo url()->full(); ?>";
            	var clean_uri = address.substring(0, address.indexOf("?"));

            	if(arg) {
            		var category = "<?php echo request()->category; ?>";
            		if(category.length > 0) {
            			clean_uri += "?category="+category+"&";
            		} else {
            			clean_uri += "?";
            		}
            		clean_uri += "sort="+option+"&";
            		var pg = "<?php echo request()->pg; ?>";
            		if(pg.length > 0) {
            			clean_uri += "pg="+pg;
            		}
            	} else {
            		clean_uri += "?sort=" + option;
            	}

            	location = clean_uri;
            }
        });
    });
</script>
@endpush