<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function send() {
        $title = request()->title;
        $content = request()->content;

        Mail::send('mail.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('pedido@transferilhagrande.com', 'Christian Nwamba');

            $message->to('lf.pereirarj@gmail.com');

        });


        return response()->json(['message' => 'Request completed']);
    }
}
