@extends('layouts.app')

@section('title', 'Checkout')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay"></div>
		<div class="container">
			<div class="banner_content text-center">
				<h2>Product Checkout</h2>
				<div class="page_link">
					<a href="{{ route('landing-page') }}">Home</a>
					<a href="{{ route('checkout') }}">Checkout</a>
				</div>
			</div>
		s</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area mt-4">
	@include('partials.message')
	<div class="container">
		<div class="billing_details">
			<div class="row">
				<div class="col-lg-8">
					<h3><strong>Checkout Now</strong></h3>
					<h3>Shipping Details</h3>
					<p class="title">Your shipping details will be automatically filled if you have it updated already at the <a href="{{ route('shipping') }}">profile page</a></p>
					<div class="alert alert-warning">
						<p>You are free to make changes</p>
					</div>
					<form class="row contact_form" id="checkoutform" action="{{ route('checkout.store')}}" method="post" novalidate="novalidate">
						@csrf
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="first" name="firstname"  placeholder="First Name*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name*'" value="{{ $shipping->firstname }}">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="last" name="lastname"placeholder="Last Name*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name*'" value="{{ $shipping->lastname }}">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="company" name="companyname" placeholder="Company" value="{{ $shipping->companyname }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company'">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="number" name="mobilenumber" placeholder="Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'" value="{{ $shipping->mobilenumber }}">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="{{ $shipping->email }}">
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="address" name="address" placeholder="Address*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address*'" value="{{ $shipping->address }}">
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="city" name="city" placeholder="City*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City*'" value="{{ $shipping->city }}">
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="state" name="state" placeholder="State*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State*'" value="{{ $shipping->state }}">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="zip" name="postalcode" placeholder="Postcode/ZIP" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postcode/ZIP'" value="{{ $shipping->postalcode }}">
						</div>
					</form>
				</div>
				<div class="col-lg-4">
					<div class="order_box">
						<h2>Your Order</h2>
						<ul class="list">
							<li>
								<a href="#">
									<strong>
									Product
										<span>Total</span>
									</strong>
								</a>
							</li>
							@foreach (Cart::content() as $item)
							<li>
								<a href="#">{{ substr($item->model->name, 0, 15) }}
									<span class="middle">x {{ $item->qty }}</span>
									<span class="last">&#8358;{{ $item->model->presentPrice() }}</span>
								</a>
							</li>
							@endforeach
							
						</ul>
						<ul class="list list_2">
							<li>
								<a href="#">Subtotal
									<span>&#8358;{{ presentPrice($newSubtotal) }}</span>
								</a>
							</li>
							<li>
								<a href="#">Total
									<span>&#8358;{{ presentPrice($newSubtotal) }}</span>
								</a>
							</li>
						</ul>
						<a class="main_btn" href="javascript:{}" onclick="document.getElementById('checkoutform').submit()">Proceed</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Checkout Area =================-->
@endsection