<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailThankController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to('syshit8@gmail.com')->send(new \App\Mail\MyTestMail());
    }
}
