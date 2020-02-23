<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders;
        $pendingOrders = $orders->where('status', '!=', 'completed')->count();
        $deliveredOrders = $orders->where('status'. '=', 'completed');
        $spent = 0;

        foreach ($deliveredOrders as $order) {
            $spent += $order->billing_total;
        }
        return view('main.user.profile')->with([
            'user' => $user,
            'orderNo' => getDetails()->get('orders'),
            'pendingOrders' => getDetails()->get('pendingOrders'),
            'spent' => getDetails()->get('spent'),
        ]);
    }
}
