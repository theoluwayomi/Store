@extends('layouts.app')

@section('title', 'Transfer Store Credit')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Transfer Store Credit</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('transfer') }}">Transfer Store Credit</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y mt-4">
    @include('partials.message')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-0">
                <div class="box my-0">
                    <div class="row justify-content-center">
                        <div class="col-10 px-0">
                            <h3><strong>Transfer Store Credit</strong></h3>
                            @include('partials.balance')
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <p class="lead" style="line-height: 2.0em;"> Transfer store credit to other shoppers and family and friends, note that 9jastore.com will not be responsible for the mismanagement of this feature.</p>
                            <hr>
                            <p><i class="fa fa-arrow-right text-primary"></i> Make sure you verify user, before you transfer to prospective buyer.</p>
                            <p><i class="fa fa-arrow-right text-primary"></i> The minimum Store Credit you can transfer for now is 100 SC.</p>
                        </div>
                        
                        <div class="card col-md-5 mx-2">
                            <hr class="text-hide">
                            <div class="row form-group">
                                <div class="col-12 my-2 mx-0">
                                    <form action="{{ route('transfer.store') }}" method="post">
                                        @csrf
                                        <input id="username" name="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Receiver Username'" placeholder="Receiver Username" class="px-0 single-input">
                                        <label for="unit" class="text-dark py-0 mb-0 mt-3">Amount of store credit to transfer</label>
                                        <input id="unit" name="unit" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unit'" placeholder="Amount" class="px-0 single-input">
                                        
                                        <br>
                                        
                                        <h6><strong>Total Balance: <span class="text-primary">{{ $user->wallet->balance() }} SC</span></strong></h6>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block text-light"><strong>Transfer Store Credit</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-10">
                            <h4 class="text-left">Transfer History</h4>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Date</th>
                                        <th>Unit</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @forelse($transfers as $transfer)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ presentDate($transfer->created_at) }}</td>
                                        <td>{{ presentPrice($transfer->amount) }} <strong>SC</strong></td>
                                        <td>
                                            <span class="text-{{ $transfer->is_mine() ? 'danger' : 'success'}}" style="font-size: 0.7em; font-weight: bold;"> {{ $transfer->is_mine() ? 'to' : 'from'}}</span>{{ $transfer->is_mine() ? App\User::find($transfer->recipient)->username : App\User::find($transfer->sender)->username }}
                                        </td>
                                        <td><i class="fa fa-arrow-{{ $transfer->is_mine() ? 'up' : 'down'}} text-{{ $transfer->is_mine() ? 'danger' : 'success'}}"></i></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th class="text-center text-primary" colspan="6">You have no transaction history for now!</th>
                                    </tr>
                                @endforelse
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
