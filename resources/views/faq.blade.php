
@extends('layouts.app')

@section('title', 'Frequently Asked Questions')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content text-center">
        <h2>Frequently Asked Questions</h2>
        <div class="page_link">
          <a href="{{ route('landing-page') }}">Home</a>
          <a href="{{ route('faq') }}">Frequently Asked Questions</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Area =================-->
<section class="cat_product_area mt-4">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="accordion" id="faqExample">
                <div class="card">
                    <div class="card-header p-2" id="headingOne">
                        <h5 class="mb-0">
                            <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Q: How does 9jastore.com operates?
                            </p>
                          </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                        <div class="card-body">
                            <b>Answer:</b> 9jastore enable users to buy products and services at best discount prices, we research, analyze and sort out products and best prices from popular vendors such as Amazon, Alibaba, Jumia, Konga, e.t.c to give you the best quality and best price as possible.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingTwo">
                        <h5 class="mb-0">
                        <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Q: How long does it for products to get delivered?
                        </p>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                        <div class="card-body">
                            9jastore.com process deliveries within 1 to 14 days depending on your location but we make sure that your ordered item get to you in time without hassle.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingThree">
                        <h5 class="mb-0">
                            <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Q. Can I track my order?
                            </p>
                          </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            Yes, you can definitely track your orders, contact 090xxxx on WhatsApp to track your order.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingFour">
                        <h5 class="mb-0">
                            <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              Q. Why does product prices changes?
                            </p>
                          </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqExample">
                        <div class="card-body">
                            We make diligent research to get you the best prices on any product available and product prices are volatile due to season changes, sales period e.t.c, so prices can change due to seasons.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header p-2" id="headingFive">
                        <h5 class="mb-0">
                            <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              Q. Is there any limits to orders I can make daily?
                            </p>
                          </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqExample">
                        <div class="card-body">
                            There is no maximum of orders a user can place daily.
                    </div>
                </div>

                <div class="card">
                    <div class="card-header p-2" id="headingSix">
                        <h5 class="mb-0">
                            <p class="h6 text-dark collapsed"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                              Q. Do 9jastore.com operate a refund policy?
                            </p>
                          </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqExample">
                        <div class="card-body">
                            Our range of services are created to ensure optimum levels of convenience and customer satisfaction with refund policy. We offer a 7-day free return policy. Thank
                        </div>
                    </div>
                </div>

            </div>

                <h5 class="text-center mt-4 mb-5">Thank you and we hope you enjoy your experience with us.</h5>
        </div>
    </div>
  </div>
</section>
<!--================End Category Area =================-->
@endsection
