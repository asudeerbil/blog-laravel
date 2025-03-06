<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'topic'=>'required|string|max:255',
            'message'=>'required|string',

        ]);

        Mail::to("asudeerbill@gmail.com")->send(new ContactMail(
            $request->name,
            $request->email,
            $request->topic,
            $request->message
        ));

        return back()->with('success','Mail send successfully');
    }
}
