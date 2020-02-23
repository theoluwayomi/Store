<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: <a href="tel:+2349032251515">09032251515</a> </p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						@guest
						<li>
							<a href="{{ route('login') }}">
								Login/Register
							</a>
						</li>
						@else
						<li>
							<a href="{{ route('profile') }}">
								My Account
							</a>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ route('landing-page') }}">
						<img src="img/logo.jpg" alt="" class="main_logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="{{ route('landing-page') }}">Home</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="{{ route('category') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
										<ul class="dropdown-menu">
											@foreach(listCategories() as $category)
											<li class="nav-item">
												<a class="nav-link" href="{{ route('category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
											</li>
											@endforeach
										</ul>
									</li>
									@guest
									<li class="nav-item">
										<a class="nav-link" href="{{ route('login') }}">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('register') }}">Register</a>
									</li>
									@else
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Store Credit</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('buy') }}">Buy Store Credit</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{ route('sell') }}">Sell Store Credit</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{ route('transfer') }}">Transfer Store Credit</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('verify') }}">Verify User</a>
									</li>
									@endguest
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									@guest()
									@else
									<li class="nav-item">
										<a href="javascript:{}" class="icons">
											<span style="font-size: 70%;">{{ presentPrice(Auth::user()->wallet->balance) }}SC</span>
										</a>
									</li>
									<hr>
									<li class="nav-item submenu dropdown">
										<a href="" class="nav-link dropdown-toggle icons" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-caret-down"></i></a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('profile') }}">Dashboard</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
											</li>
										</ul>
									</li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									    {{ csrf_field() }}
									</form>
									@endguest
									<hr>
								</ul>
							</div>
						</div>
					</div>
					<a href="{{ route('cart') }}" class="icons">
						<i class="lnr lnr lnr-cart" style="position: relative;">
							@if (Cart::instance('default')->count() > 0)
							<span class="badge badge-info" style="position: absolute; top: -12px; right: -10px;">{{ Cart::instance('default')->count() }}</span>
							@endif
						</i>
					</a>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->