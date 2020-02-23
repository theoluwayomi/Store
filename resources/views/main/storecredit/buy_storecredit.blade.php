@extends('layouts.app')

@section('title', 'Buy Store Credit')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Buy Store Credit</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('buy') }}">Buy Store Credit</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<section class="section-content mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 px-0">
                <div class="box my-0">
                    <div class="row justify-content-center">
                        <div class="col-10 px-0">
                            <h3><strong>BUY STORE CREDIT FROM SELLERS</strong></h3>
                            @include('partials.balance')
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center px-3 px-md-0">
                        <div class="col-md-5">
                            <h5 class="py-4 text-dark"><strong>The best way to buy Store Credit directly is to buy directly from sellers.</strong></h5>
                            <h5 class="text-uppercase"><strong>BUY STORE CREDIT DIRECTLY FROM SELLERS OR THROUGH BROKER</strong></h5>

                            <p class="">All you have to do is to find a seller and tell him/her to chat with you on WhatsApp with their Store Credit WhatsApp number.</p>
                            <p>Store Credit WhatsApp number is the number a user used to register on store credit.com. As a buyer, you are strongly advised to VERIFY whether the seller you are dealing with has 
                            enough Store Credit (up to the amount you wish to buy from him/her). Make sure the seller transfer the Store Credit before paying him or her.</p>
                            <p>To verify a seller authenticity, login into your account, click on VERIFY USER, and insert the seller’s WhatsApp number.</p>
                            
                            <h5 class="text-uppercase mt-5"><strong>Note this important rules <span class="text-danger">*</span></strong></h5>
                            <p><i class="fa fa-arrow-right text-dark"></i><span class="text-danger text-bold"> Do not pay any seller without getting your Store Credit first. The seller must transfer Store Credit before payment</span></p>
                            <p><i class="fa fa-arrow-right text-dark"></i><span class="text-danger text-bold"> Do not pay any seller without verifying his/her store credit details and balance.</span></p>
                            <p><i class="fa fa-arrow-right text-dark"></i><span class="text-danger text-bold"> Do not pay any seller if his/her account details does not match his bank account details on the website.</span></p>
                            <p><i class="fa fa-arrow-right text-dark"></i> <span class="text-danger text-bold">Do not pay any seller if he/she is not chatting with you with his or her Store Credit WhatsApp number.</span></p>
                            <p><i class="fa fa-arrow-right text-dark"></i><span class="text-danger text-bold"> Only pay a seller through his/her account details on the website.</span></p>
                            <p><i class="fa fa-arrow-right text-dark"></i><span class="text-danger text-bold"> Do not pay seller that his/her store credit balance is below what you intend to buy.</span></p>
                        </div>
                        
                        <div class="col-md-5 mx-2">
                            <hr class="text-hide">
                            <div class="row form-group">
                                <p>To get a seller, directly join any of the below Store Credit group on Telegram or WhatsApp stating the amount of Store Credit you want to buy.
                                 Any seller who has up to that amount and want to sell will reply your message on the group. Then you can go on to chat privetly. 
                                 <br> <span class="text-danger text-bold">Send the seller your WhatsApp number and tell
                                  him/her to chat you up on WhatsApp with his/her Store Credit WhatsApp number, verify the 
                                  number on the website before you begin transaction.<br>After the seller has transferred the TC, send the seller the payment immediately.</span></p>
                                <div class="card col-12 my-2 mx-0 py-5 px-4 mb-5">
                                    <h5 class="text-center"><strong>Store Credit member’s group on Telegram <i class="fa fa-telegram text-info"></i></strong></h5>
                                    <div class="p-3 mb-2 bg-info text-white"><p class="text-center"><a href="https://t.me/store creditgroup" class="text-light">(CLICK HERE TO JOIN STORE CREDIT MEMBER’S GROUP)</a></p></div>
                                    <p class="text-center">Link : https://t.me/store creditgroup</p>
                                    <h5 class="text-center"><strong>Store Credit member’s group on WhatsApp <i class="fa fa-whatsapp text-success"></i></strong></h5>
                                    <div class="p-3 mb-2 bg-success text-white"><p class="text-center">Contact <a href="https://wa.me/+2349034728150" class="text-light">09034728150</a> on WhatsApp for current group links.</p></div>
                                </div>
                                
                                <div class="alert alert-danger">
                                    <p>As a buyer, you  must abide with these rules in order to avoid getting scammed by fraudsters 
                                    and do not try to defraud a seller or else your account will be permanently blocked by Store Credit.com.</p>
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