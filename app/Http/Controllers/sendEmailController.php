<?php

namespace App\Http\Controllers;

use App\Mail\MailTrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class sendEmailController extends Controller
{
    public function index(){
        Mail::to('ajiihhhh@gmail.com')->send(new MailTrap());
    }
}
