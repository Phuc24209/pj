<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    //
    function sendmail()
    {
        $data = [
            'key1' => 'value1'
        ];
        Mail::to('laravelpro.unitop@gmail.com')->send(new DemoMail($data));
    }
}
