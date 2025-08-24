<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{

    public function sendMailFunction(Request $request){
        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');

        Mail::to($email)->send(new WelcomeMail($subject,$content));
        return redirect(route('indexPageName'))->with('success', 'Successfully email sent to ' . $email);
    }
}
