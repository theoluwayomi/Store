<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('category');
        }

        $shipping = auth()->user()->shippingaddress;

        return view('main.checkout')->with([
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'shipping' => $shipping,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check race condition when there are less items available to purchase
        // if ($this->productsAreNoLongerAvailable()) {
        //     return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        // }
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'companyname' => 'string|max:255|nullable',
            'mobilenumber' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|max:1000',
            'postalcode' => 'string|max:10|nullable',
        ]);

        $input = $request->all();

        Auth::user()->shippingaddress->fill($input)->save();

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        // Charge User from their Store Credit if not redirect them back with the proper error message
        $is_successful = $this->chargeUser();

        if(!$is_successful) {
            return back()->with('error_message', 'Insufficient store credit. Your payment was unsuccessful!');
        }

        $order = $this->addToOrdersTables($request, null);
        // Mail::send(new OrderPlaced($order));

        // decrease the quantities of all the products in the cart
        $this->decreaseQuantities();

        Cart::instance('default')->destroy();
        // return $order;
        return redirect()->route('confirmation', compact('order'))->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        
    }

    protected function chargeUser() {
        $users_wallet = auth()->user()->wallet;
        if ($users_wallet->isSufficient(getNumbers()->get('newTotal'))) {
            $users_wallet->debit(getNumbers()->get('newTotal'));
            $users_wallet->save();
            return true;
        } else {
            return false;
        }
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
