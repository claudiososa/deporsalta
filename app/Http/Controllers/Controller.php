<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailContact;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendMail(Request $request){
        Mail::to('vicomser.claudio@gmail.com')->send(new SendMailContact($request));
        return redirect('/contacto');
    }
}
