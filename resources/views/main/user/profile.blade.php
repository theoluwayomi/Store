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
									<a href="#edit-profile">Edit</a>
								</div>
						</figure>
						<hr>
						<p>
							<i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
							 <br>
							{{ $user->shippingaddress->address }}&nbsp 
							<a href="{{ route('shipping') }}" class="btn-link">Edit</a>
						</p>

						

						<article class="card-group" id="edit-profile">
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
						

				<article class="card  my-3 ">
					<div class="card-body">
						<h5 class="card-title mb-4">Edit Details </h5>	

						<form action="{{ route('profile.update') }}" method="post">
							@method('patch')
                    		@csrf
							<div class="row">
								<div class="col-md-6 mt-10">
									<input type="text" name="lastname" value="{{ $user->lastname }}" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
									 required class="single-input">
								</div>
								<div class="col-md-6 mt-10">
									<input type="text" name="firstname" value="{{ $user->firstname }}" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
									 required class="single-input">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mt-10">
									<input type="text" name="username" value="{{ $user->username }}" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'"
									 required class="single-input">
								</div>
								<div class="col-md-6 mt-10">
									<input type="email" name="email" value="{{ $user->email }}" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
									 required class="single-input">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mt-10">
									<input type="text" name="mobilenumber" value="{{ $user->mobilenumber }}" placeholder="Mobile number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile number'"
									 autocomplete="none" class="single-input">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6 mt-10">
									<input type="password" name="old_password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
									  class="single-input">
								</div>
								<div class="col-md-6 mt-10">
									<input type="password" name="password" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'"
									  class="single-input">
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-6 mt-10">
									<input type="password" name="password_confirmation" placeholder="Confirm New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm New Password'"
									  class="single-input">
								</div>
							</div>
							<div class="mt-10">
								<button type="submit" value="submit" class="btn submit_btn">Save Changes</button>
							</div>
						</form>
					</div> <!-- card-body .// -->
				</article> <!-- card.// -->

					</div> <!-- card-body .// -->
				</article> <!-- card.// -->

			</div> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection