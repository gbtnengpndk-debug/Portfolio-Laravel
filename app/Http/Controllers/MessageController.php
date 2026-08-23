<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\NewMessageMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $message = Message::create($validated);

Mail::to('dhikzzportfolio@gmail.com')
    ->send(new NewMessageMail($message));

return back()->with('success', 'Pesan berhasil dikirim!');
    }
}