<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
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
            'username' => 'required|string|max:255|unique:users,email,',
            'mobilenumber' => 'required|string|max:11',
            'email' => 'required|string|email|max:255',
            'oldpassword' => 'sometimes|nullable|string|min:6',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'oldpassword');

        if (! $request->filled('password')) {
            $user->fill($input)->save();
            
            return back()->with('success_message', 'Profile updated successfully!');
        }
        if (Hash::check($request->oldpassword, $user->password)) {
        	$user->password = bcrypt($request->password);
        	$user->fill($input)->save();
        } else {
        	return back()->with('error_message', 'Password incorrect!');
        }

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
