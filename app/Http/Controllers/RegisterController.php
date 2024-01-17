<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index(){
        return view('frontend.register-user');
    }


    public function register(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');

    }
}
