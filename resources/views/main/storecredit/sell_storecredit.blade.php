@extends('layouts.app')

@section('title', 'Sell Store Credit')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Sell Store Credit</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('sell') }}">Sell Store Credit</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content mt-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-0">
                <div class="box my-0">
                    <div class="row justify-content-center">
                        <div class="col-10 px-0">
                            <h3><strong>SELL STORE CREDIT TO BUYERS DIRECTLY</strong></h3>
                            @include('partials.balance')
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center px-3 px-md-0">
                        <div class="col-md-5">
                            <h5 class="py-4 text-dark"><strong>The best way to sell your store credit is by selling directly to buyers.</strong></h5>
                            <h5 class="text-uppercase"><strong>SELL STORE CREDIT DIRECTLY TO BUYERS</strong></h5>

                            <p>To sell to buyers directly join any of the below Store Credit community on Telegram or WhatsApp, 
                            you can ask for any buyers in the group by stating the unit of store credit you want to sell and 
                            tell any prospective buyer to chat with you privately.<br> <span class="text-danger">Send the 
                            buyer your WhatsApp number and tell him or her to chat you up on WhatsApp with his or her 
                            Store Credit WhatsApp number, verify the number on the website before you begin transaction.</span>
                            </p>
                        </div>
                        
                        <div class="col-md-5 mx-2">
                            <hr class="text-hide">
                            <div class="row form-group">
                                
                                <div class="card col-12 my-2 mx-0 py-5 px-4 mb-5">
                                    <h5 class="text-center"><strong>Store Credit member’s group on Telegram <i class="fa fa-telegram text-info"></i></strong></h5>
                                    <div class="p-3 mb-2 bg-info text-white"><p class="text-center"><a  href="https://t.me/store creditgroup" class="text-light">(CLICK HERE TO JOIN STORE CREDIT MEMBER’S GROUP)</a></p></div>
                                    <p class="text-center">Link : https://t.me/store creditgroup</p>
                                    <h5 class="text-center"><strong>Store Credit member’s group on WhatsApp <i class="fa fa-whatsapp text-success"></i></strong></h5>
                                    <div class="p-3 mb-2 bg-success text-white"><p class="text-center">Contact <a href="https://wa.me/+2349034728150" class="text-light">+2349034728150</a> on WhatsApp for current group links.</p></div>
                                </div>
                                
                                <div class="alert alert-danger">
                                    <p>As a seller you must abide with these rules in order to avoid getting scammed by fraudsters. Do not try to 
                                    defraud a buyer or your account will be permanently blocked by 9jastore.com.</p>
                                </div>

                                <h5>You can also report any issues to <a href="mailto:support@9jastore.com">support@9jastore.com</a></h5>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
@endsection