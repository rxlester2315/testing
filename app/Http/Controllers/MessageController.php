<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

     public function index()
    {
        // Retrieve messages
        $messages = Message::all();
        return view('user.messages', compact('messages'));
    }


      public function store(Request $request)
    {
        // Validation
        $request->validate([
            'user_id' => 'required',
            'content' => 'required',
        ]);

        // Create message
        Message::create($request->all());

        // Redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}