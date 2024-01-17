<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class RegisterAdminController extends Controller
{
    public function index(){
        return view('backend.register-admin');
    }


    public function register(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $admin = Admin::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect('/email/verify');

    }
}
