<?php

namespace App\Http\Controllers;

use Auth;
use App\Transfer;
use App\Wallet;
use App\User;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transfers = Transfer::where('sender', $user->id)
                        ->orWhere('recipient', $user->id)
                        ->orderBy('created_at', 'desc')->simplePaginate(20);
        // return dd($transfers[0]->sender);
        return view('main.storecredit.transfer_storecredit', compact('user', 'transfers'));
    }

    public function transfer(Request $request) {
        $sender = Auth::user();
        $recipient = User::where('username', $request->username)->first();
        
        
        if (is_null($recipient) || $request->username == $sender->username) {
            return back()->with('error_message', 'Error occured. The user you are trying to transfer to is invalid.');
        }
        $wallet = Wallet::where('user_id', $sender->id)->first();
        
        $unit = floatval($request->unit);
        $main_unit = $unit;

        if (!$wallet->is_sufficient($main_unit)) {
            return back()->with('error_message', 'Transfer Failed. You do not have enough unit to transfer. Thank you.');
        }

        if (!$wallet->can_transfer($main_unit)) {
            return back()->with('error_message', 'Transfer Failed. The minimum transfer allowed is 100SC. Thank you!');
        }

        $transfer = Transfer::create([
            'amount' => $unit,
            'sender' => $sender->id,
            'recipient' => $recipient->id,
        ]);
        
        $wallet->debit($main_unit);
        $wallet->save();

        $r_wallet = Wallet::where('user_id', $recipient->id)->first();
        $r_wallet->credit($transfer->amount);
        $r_wallet->save();

        return back()->with('success_message', 'You have successfully transfer '.$unit.'SC to '.$recipient->username.'. Thank you.');
    }
}
