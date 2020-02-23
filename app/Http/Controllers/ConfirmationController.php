<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        $order = Order::where('id', $request->order)->first();

        return view('main.confirmation', compact('order'));
    }
}
