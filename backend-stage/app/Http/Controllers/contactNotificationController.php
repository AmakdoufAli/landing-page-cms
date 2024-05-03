<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactNotificationController extends Controller
{
    public function sendContactNotificationMail(Request $request){

        $mailTo = 'amakdoufali6@gmail.com';

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string|max:15',
            'message' => 'required|string|max:2000',
        ]);

        $data['mailTo'] = $mailTo;
        $data['date_time'] = date('d/m/y');

        $contact = new ContactNotification();
        $contact->nom = $data['nom'];
        $contact->email = $data['email'];
        $contact->telephone = $data['telephone'];
        $contact->message = $data['message'];
        $contact->save();

        Mail::to($mailTo)->send(new contactMail($data));

        return "Email sent successfully!";
    }
}
