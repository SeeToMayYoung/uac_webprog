<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'fow1' => 'required',
            'fow2' => 'required',
            'fow3' => 'required',
            'phone' => 'required|regex:/[0-9]{9,12}/',
            'linkedin' => 'required',
            'above18' => 'required|accepted',
            'payment' => 'required'
        ]);

        if($request->input('payment') < $request->input('random_value')){
            return redirect()->back()->with('paymentError','Payment Underpaid');
        }

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        return redirect('/login')->with('registerSuccess','Successfully Registered');
    }
}
