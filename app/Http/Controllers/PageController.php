<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function verify() {
    	return view('main.storecredit.verify_user');
    }

    public function search(Request $request) {
    	if (!isset($request->mobilenumber)) {
            return back()->with('error_message', 'Enter the mobile number of the user you wish to verify!');
        }
        $mobilenumber = str_replace(' ', '', $request->mobilenumber);
        $mobilenumber = str_replace('+234', '0', $request->mobilenumber);
        $user = User::where('mobilenumber', $mobilenumber)->first();
        if (!is_object($user)) {
            return back()->with('error_message', 'The user with the mobile number does not exist!');
        }
        
        return back()->with([
        	'user' => $user,
        	'success_message' => 'Find below the details of the user!'
        ]);
    }

    public function contact() {
        return view('main.contact');
    }

    public function faq() {
        return view('faq');
    }

    public function terms() {
        return view('terms');
    }

    public function policy() {
        return view('policy');
    }
}
