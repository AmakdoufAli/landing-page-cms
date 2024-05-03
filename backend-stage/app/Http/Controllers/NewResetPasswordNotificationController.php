<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewResetPasswordNotificationController extends Controller
{
    public function sendEmailNotification(Request $request){
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        $data = [
            "url" => "url",
            "email" => "aliamakdouf5@gmail.com",
            "subject" => "dfgfgdfg",
            "bodyMessage" => "dfgdfgdfgdfg"
        ];
        Mail::send('emails.reset', $data=$data, function($message) use ($data){
            $message->from($data['amakdoufali6@gmail.com']);
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
    }
}
