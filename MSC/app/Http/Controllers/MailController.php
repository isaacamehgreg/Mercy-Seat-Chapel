<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail(){

        $details = [
            'title' =>"Confirm Attendance",
            'body' =>'This is to confirm if you will be available for the sunday slot you select'
        ];
       
       Mail::to("isaacamehgreg@gmail.com")->send(new TestMail($details));

       return 'email sent';
   
    }
}
