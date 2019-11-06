<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact(Request $request){
        Contact::create($request->all());
        return redirect('contact')->with('message-success','Phản hồi của bạn đã được ghi nhận!');
    }
    public  function listContact(){
        $contacts = Contact::all();
        return view('admin.contact.list')->with('contacts',$contacts);
    }
}
