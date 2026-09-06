<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('wp.contacto');
    }

    public function send(Request $request)
    {
        // Champs du thème (WPForms) ou champs simples.
        $f = (array) $request->input('wpforms.fields', []);
        $payload = [
            'name'    => $request->input('name', $f[1] ?? null),
            'email'   => $request->input('email', $f[2] ?? null),
            'subject' => $request->input('subject', $f[4] ?? null),
            'message' => $request->input('message', $f[3] ?? null),
            'phone'   => $request->input('phone'),
        ];

        $data = validator($payload, [
            'name'    => ['required', 'string', 'max:150'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:40'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:3000'],
        ])->validate();

        ContactMessage::create($data);

        try {
            Mail::to(config('mail.admin_address'))->send(new ContactMail(new ContactMessage($data)));
        } catch (\Throwable $e) {
            Log::error('Email de contacto: '.$e->getMessage());
        }

        return back()->with('status', 'Gracias por tu mensaje. Te responderemos lo antes posible.');
    }
}
