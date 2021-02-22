<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailThankController extends Controller
{
     //Gửi mail cảm ơn
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new \App\Mail\MyTestMail($request));
        $history = History::create($request->all());
    }
}
