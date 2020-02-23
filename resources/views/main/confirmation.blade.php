@extends('layouts.app')

@section('title', 'Confirmation')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Order Confirmation</h2>
				<div class="page_link">
					<a href="{{ route('landing-page') }}">Home</a>
					<a href="{{ route('confirmation') }}">Confirmation</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Order Details Area =================-->
<section class="order_details py-4">
	@include('partials.message')
	<div class="container">
		<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
		<div class="row order_d_inner ">
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Order Info</h4>
					<ul class="list">
						<li>
							<a href="#">
								<span>Order number</span> : ORD-{{ $order->id }}</a>
						</li>
						<li>
							<a href="#">
								<span>Date</span> : {{ presentDate($order->created_at) }}</a>
						</li>
						<li>
							<a href="#">
								<span>Total</span> : {{ presentPrice($order->billing_total) }}SC</a>
						</li>
						<li>
							<a href="#">
								<span>Payment method</span> : Store Credit</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Shipping Address</h4>
					<ul class="list">
						<li>
							<a href="#">
								<span>Address</span> : {{ auth()->user()->shippingaddress->address }}</a>
						</li>
						<li>
							<a href="#">
								<span>City</span> : {{ auth()->user()->shippingaddress->city }}</a>
						</li>
						<li>
							<a href="#">
								<span>State</span> : {{ auth()->user()->shippingaddress->state }}</a>
						</li>
						<li>
							<a href="#">
								<span>Postcode </span> : {{ isset(auth()->user()->shippingaddress->postalcode) ? auth()->user()->shippingaddress->postalcode : 'Nil' }}</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->
@endsection