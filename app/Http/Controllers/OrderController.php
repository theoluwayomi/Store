<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders; // n + 1 issues

        $orders = auth()->user()->orders()->orderBy('created_at', 'desc')->with('products')->paginate(10); // fix n + 1 issues

        return view('main.user.orders')->with([
        	'orders' => $orders,
        	'user' => auth()->user(),
            'orderNo' => getDetails()->get('orders'),
            'pendingOrders' => getDetails()->get('pendingOrders'),
            'spent' => getDetails()->get('spent'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }

        $products = $order->products;

        return view('main.user.order')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }
}
