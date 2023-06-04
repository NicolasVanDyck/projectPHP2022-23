<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\HelloMail;

public function sendEmail(Request $request)
{
    // Validate and process the form data

    // Retrieve form data
    $voornaam = $request->input('voornaam');
    $achternaam = $request->input('achternaam');
    $email = $request->input('email');
    $bericht = $request->input('bericht');

    // Create and send the email
    Mail::to('your-email@example.com')->send(new HelloMail($voornaam, $achternaam, $email, $bericht));

    return redirect()->back()->with('success', 'Email sent successfully!');
}
