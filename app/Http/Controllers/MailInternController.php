<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailInternController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new \App\Mail\MailIntern($request));
    }
}
