<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function mail(Type $var = null)
    {
        return view('mail.mails');
    }
    public function sentmail(Request $req)
    {
        if($this->isOnline())
        {
            $mail_data =[
                'recipient' => 'nafizahmed273273@gmail.com',
                'fromEmail' => $req->email,
                'fromName' => $req->name,
                'subject' => $req->subject,
                'body' => $req->message

            ];

            /*Mail::send('sentMail',$mail_data,funtion($message) use ($mail_data){
                $message->to($mail_data[recipient])
                ->from($mail_data[fromEmail])
                ->subject($mail_data[subject]);

            });*/

            return redirect()->back()->with('sucess','Email');
        }
    }
}
