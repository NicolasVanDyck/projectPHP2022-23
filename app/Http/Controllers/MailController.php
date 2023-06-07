<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function submitForm(Request $request)
    {
        $customMessages = [
            'voornaam.required' => 'Het voornaam veld is verplicht.',
            'voornaam.min' => 'Het voornaam veld moet minimaal :min tekens bevatten.',
            'achternaam.required' => 'Het achternaam veld is verplicht.',
            'achternaam.min' => 'Het achternaam veld moet minimaal :min tekens bevatten.',
            'email.required' => 'Het e-mail veld is verplicht.',
            'email.email' => 'Het e-mailadres moet een geldig e-mailadres zijn.',
            'bericht.required' => 'Het bericht veld is verplicht.',
            'bericht.min' => 'Het bericht veld moet minimaal :min tekens bevatten.',

        ];

        $request->validate([
            'voornaam' => 'required|min:2',
            'achternaam' => 'required|min:2',
            'email' => 'required|email',
            'dropdown' => 'required',
            'bericht' => 'required|min:10',
        ], $customMessages);

        $voornaam = $request->input('voornaam');
        $achternaam = $request->input('achternaam');
        $email = $request->input('email');
        $dropdown = $request->input('dropdown');
        $bericht = $request->input('bericht');

        Mail::to('hello@example.com')->send(new HelloMail($voornaam, $achternaam, $email,$dropdown ,$bericht));

        return redirect()->back()->with('success', 'Email met succes verstuurd!');
    }
}
