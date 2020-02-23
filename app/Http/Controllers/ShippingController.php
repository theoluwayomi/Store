<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use Auth;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $shipping = $user->shippingaddress;
        return view('main.user.shipping')->with([
            'shipping' => $shipping,
            'user' => $user,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'companyname' => 'string|max:255|nullable',
            'mobilenumber' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|max:1000',
            'postalcode' => 'string|max:10',
        ]);

        $input = $request->all();

        Auth::user()->shippingaddress->fill($input)->save();
            
        return back()->with('success_message', 'Shipping details updated successfully!');
    }
}
