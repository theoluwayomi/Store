@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Profile Page</h2>
				<div class="page_link">
					<a href="{{ route('landing-page') }}">Home</a>
					<a href="{{ route('profile') }}">Profile</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y mt-4">
	@include('partials.message')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="left_sidebar_area">
					@include('partials.profile_sidebar')
				</div>
			</div>

			<div class="login_form_inner py-3 col-md-9">
				
				<article class="card mb-3">
					<div class="card-body">
						
						<figure class="icontext d-flex justify-content-center">
								<div class="icon mx-3">
									<img height="50" class="rounded-circle img-sm border" src="{{ asset('storage/users/default.png') }}">
								</div>
								<div class="text">
									<strong>{{ $user->fullName() }}</strong> <br> 
									{{ $user->email }}<br> 
									<a href="{{ route('profile') }}#edit-profile">Edit</a>
								</div>
						</figure>
						<hr>
						<p>
							<i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
							 <br>
							{{ $user->shippingaddress->address }}&nbsp 
							<a href="{{ route('shipping') }}" class="btn-link">Edit</a>
						</p>
						
						<article class="card-group">
							<figure class="card bg">
								<div class="p-3">
									 <h5 class="card-title">{{ $orderNo }}</h5>
									<span>Orders</span>
								</div>
							</figure>
							<figure class="card bg">
								<div class="p-3">
									 <h5 class="card-title">{{ $pendingOrders }}</h5>
									<span>Awaiting delivery</span>
								</div>
							</figure>
							<figure class="card bg">
								<div class="p-3">
									 <h5 class="card-title">{{ presentPrice($spent) }} <strong>SC</strong></h5>
									<span>Spent so far</span>
								</div>
							</figure>
						</article>
						

					</div> <!-- card-body .// -->
				</article> <!-- card.// -->
				<p class="h6 text-black">View your order details and status below, note that you can also track your order, to track your order contact 09032251515 on WhatsApp immediately.</p>
				<article class="card  mb-3">
					        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">My Orders</h1>
                <hr>
            </div>

            <div class="container">
                @forelse ($orders as $order)
                <div class="container my-4 mx-2 card row">
                    <div class="order-header row" style="display: flex; background: #F6F6F6; border: 1px solid #DDDDDD;padding: 14px; align-items: center; justify-content:space-between;">
                        <div class="order-header-items" style="display: flex;">
                            <div class="mr-2">
                                <div class="text-uppercase font-weight-bold">Order Placed</div>
                                <div>{{ presentDate($order->created_at) }}</div>
                            </div>
                            <div class="mr-2">
                                <div class="text-uppercase font-weight-bold">Order ID</div>
                                <div>ORD-{{ $order->id }}</div>
                            </div>
                            <div class="mr-2">
                                <div class="text-uppercase font-weight-bold">Total</div>
                                <div>{{ presentPrice($order->billing_total) }}</div>
                            </div>
                        </div>
                        <div class="order-header-items">
                            <div class="text-uppercase font-weight-bold">Status</div>
                            <div class="my-0 alert alert-{{ $order->status == 'pending' ? 'warning' : ''}}{{ $order->status == 'processed' ? 'primary' : ''}}{{ $order->status == 'completed' ? 'success' : ''}} py-2 text-uppercase">{{ $order->status }}</div>
                        </div>
                    </div>
                    <div class="order-products row">
                    	@php

                    	@endphp
                        @foreach ($order->products as $product)
                            <div class="order-product-item col-md-4" style="display: flex;">
                                <div><img style="max-width: 140px;" src="{{ asset($product->image) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>{{ presentPrice($product->price) }}SC</div>
                                    <div>Quantity: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
                @empty
                <h6 class="text-center">Continue shopping and place orders!</h6>
                @endforelse
            </div>
            {{ $orders->links() }}
            <div class="spacer"></div>
        </div>
				</article> <!-- card.// -->

			</div> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection

@push('css')
<style type="text/css">
.my-orders .order-container {
  margin-bottom: 64px;
}

.my-orders .order-header {
  background: #F6F6F6;
  border: 1px solid #DDDDDD;
  padding: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.my-orders .order-products {
  background: white;
  border: 1px solid #DDDDDD;
  border-top: none;
  padding: 14px;
}

.my-orders .order-header-items {
  display: flex;
}

.my-orders .order-header-items div {
  margin-right: 14px;
}

.my-orders .order-product-item {
  display: flex;
  margin: 32px 0;
}

.my-orders .order-product-item img {
  max-width: 140px;
  margin-right: 24px;
}

</style>
@endpush