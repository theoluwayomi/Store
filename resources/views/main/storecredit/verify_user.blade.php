@extends('layouts.app')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Verify User</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('verify') }}">Verify User</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="tracking_box_area mt-3">
    @include('partials.message')
    <div class="container">
        <div class="tracking_box_inner">
            <h4 class="text-left py-3"><strong>Verify Users</strong></h4>
            <p>Input the WhatsApp number without the international codes(e.g. +234) to verify buyer or seller authenticity.</p>
            <p><strong>It is very important to verify a buyer's or a seller's account before buying or selling store credit from/to them.</strong></p>
            <form class="row tracking_form" action="{{ route('verify.search') }}" method="post" novalidate="novalidate">
                @csrf
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile number">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Verify User</button>
                </div>
            </form>

            <div class="jumbotron text-center mt-4">
                @if(session()->has('user'))
                @php
                $user = session()->get('user');
                @endphp
                    @if(!is_bool($user))
                    <p><strong>Name</strong>: {{ $user->lastname }} {{ $user->firstname }} <i class="fa fa-check text-success"></i></p>
                    <p><strong>Email</strong>: {{ $user->email }}</p>
                    <p><strong>Mobile number</strong>: {{ $user->mobilenumber }}</p>
                    <p><strong>Balance</strong>: {{ $user->wallet->balance() }}SC</p>
                    @else
                    <h5 class="text-danger text-center"><strong>User could not be found. Check to make sure you did not add country code to the number</strong>!</h5>
                    @endif
                @else
                    <h5 class="text-danger text-center"><strong>Verify seller's or buyer's account before transacting with the person.<br>
                    <br>Make sure the seller or buyer is chatting with you with the WhatsApp number you want to verify.</strong></h5>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
