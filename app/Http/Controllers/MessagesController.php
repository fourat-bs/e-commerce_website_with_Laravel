<?php
namespace App\Http\Controllers;

use App\mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller

{
	 public function contact(){
        return view('pages.contact');
    }
    public function thanks(){
        return view('pages.emailr');
    }
    public function submit(Request $request)
     {
     
     $this->validate($request,[
     'name' => 'required',
     'email' => 'required|email',
     'subject' =>'required',
     'message' => 'required',

     ]);
     $data = array(

     'name' =>$request->name,
     'email' =>$request->email,
     'subject' =>$request->subject,
     'message' =>$request->message
 );
    
       
     Mail::to('mohamedfouratb@gmail.com')->send(new Message($data));
     
     return redirect('/r');
    }
}