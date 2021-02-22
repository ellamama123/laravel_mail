<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailOfferController extends Controller
{
    //Gửi mail nhận việc
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new \App\Mail\MailOffer($request));
        $history = History::create($request->all());
    }
}
