<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailThankController extends Controller
{
     //Gửi mail cảm ơn
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new \App\Mail\MyTestMail($request));
        History::create($request->all());
        $candidate = Candidate::find($request->id);
        if($candidate){
            $candidate->status = 1;
            $candidate->save();
        }
    }

    public function previewMail(Request $request){
        // $mail =  Mail::to($request->content);
        // dd($mail);
        echo 'alo';
    }
}
