<!--================ start footer Area  =================-->
	<footer class="footer-area pt-5 bg-dark text-white">
		<div class="container mb-0">
			<div class="row mb-0">
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title text-info">About Us</h6>
						<p class="">9jastore enable users to buy products and services at best discount prices, we research, analyze and sort out products and best prices from popular vendors such as Amazon, Alibaba, Jumia, Konga, e.t.c to give you the best quality and best price as possible.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget ">
						<h6 class="footer_title text-info">Quick Links</h6>
						<ul class="list instafeed d-flex flex-wrap">
							<li>
								<a href="{{ route('faq') }}">Frequently Asked Questions</a>
							</li>
							<li>
								<a href="{{ route('terms') }}">Terms and Condition</a>
							</li>
							<li>
								<a href="{{ route('policy') }}">Privacy Policy</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title text-info">Categories</h6>
							@foreach (listCategories() as $category)
							<div class="f_social">
								<a href="{{ route('category', ['category' => $category->slug]) }}">
									{{ $category->name }}
								</a>
							</div>
				            @endforeach
					</div>
				</div>
			</div>
			<hr>
			<div class="row footer-bottom d-flex justify-content-between align-items-center pb-3 pt-0">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 9jastore
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->