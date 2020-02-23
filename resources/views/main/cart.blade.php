@extends('layouts.app')

@section('title', 'Shopping Cart')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area section_top">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Shopping Cart</h2>
				<div class="page_link">
					<a href="{{ route('landing-page') }}">Home</a>
					<a href="{{ route('cart') }}">Cart</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area pt-4">
	<div class="container">
		<div class="cart_inner">
			
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						@if (Cart::count() > 0)

            			<h6 class="h5 alert alert-warning text-dark">{{ Cart::count() }} item(s) in Shopping Cart</h6>
            			@php
            			$i = 1;
            			@endphp
            			@foreach (Cart::content() as $item)
						<tr>
							<td>
								<div class="media">
									<div class="d-flex">
										<img style="max-height: 98px;" src="{{ productImage($item->model->image) }}" alt="">
									</div>
									<div class="media-body">
										<p>{{ $item->model->name }}</p>
									</div>
								</div>
							</td>
							<td>
								<h5>&#8358;{{ presentPrice($item->price) }}</h5>
							</td>
							<td>
								<div>
									<select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
	                                @for ($i = 1; $i < 5 + 1 ; $i++)
	                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
	                                @endfor
                            		</select>
		                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
		                                {{ csrf_field() }}
		                                {{ method_field('DELETE') }}

		                                <button data-toggle="tooltip" title="Remove" type="submit" class="btn btn-sm"><i class="fa fa-times text-danger"></i></button>
		                            </form>
								</div>
							</td>
							<td>
								<h5>&#8358;{{ presentPrice($item->total) }}</h5>
							</td>
						</tr>
						@php $i++; @endphp
						@endforeach
						<tr class="bottom_button">
							<td>
								
							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Tax</h5>
							</td>
							<td>
								<h5>&#8358;{{ presentPrice($newTax) }}</h5>
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Total</h5>
							</td>
							<td>
								<h5>&#8358;{{ presentPrice($newSubtotal) }}</h5>
							</td>
						</tr>
						@else
						<tr>
							<td colspan="4"><h3 class="text-center">No items in Cart!</h3></td>
						</tr>
		                
		                @endif
						<tr class="out_button_area">
							<td>

							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="checkout_btn_inner">
									<a class="gray_btn" href="{{ route('category') }}">Continue Shopping</a>
									<a class="main_btn" href="{{ route('checkout') }}">Proceed to checkout</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</section>
<!--================End Cart Area =================-->

@endsection

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
            	element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                    	// alert(response.data);
                        // console.log(response.data);
                        window.location.href = '{{ route('cart') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart') }}'
                    });
                })
            })
        })();
    </script>

@endpush