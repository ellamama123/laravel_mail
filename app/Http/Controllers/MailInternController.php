<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailInternController extends Controller
{
   //Gửi mail phỏng vấn
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new \App\Mail\MailIntern($request));
        $history = History::create($request->all());
    }

    public function previewMailIntern(Request $request){
        $template = Template::find($request->id);
        return $template->content;
    }
}
