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
					</div> <!-- card-body .// -->
				</article> <!-- card.// -->
				<p class="h6 text-dark">Update your shipping details below, please note that your goods will be delivered to the specified address below.</p>
				<article class="card  mb-3">
					<div class="card-body">
						<h5 class="card-title mb-4">Edit Shipping Details </h5>
						<form class="row contact_form" action="{{ route('shipping.update') }}" method="post">
						@method('patch')
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
						<div class="col-md-12 mt-10">
							<button type="submit" value="submit" class="btn submit_btn">Save Changes</button>
						</div>
					</form>
					</div> <!-- card-body .// -->
				</article> <!-- card.// -->

			</div> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection