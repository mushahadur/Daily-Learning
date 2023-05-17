<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUS;
use App\Models\ReplyContactUS;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('customer.pages.contact.contact');
    }

    function store(Request $request){


        $request->validate([
            'subject'=>'required',
            'message'=>'required'
        ]);

        ContactUS::create([
            'subject' => $request ->subject,
            'message' => $request ->message,
            'user_id' => Auth::user()->id,
        ]);


        toast('Your Message Submitted','success');
        return redirect()->back();

    }

    function replyList(){
        $id = Auth::user()->id;
        $data = ContactUS::with('user','reply')->where('user_id', $id)->get();
        return view('customer.pages.contact.replyList', ['contacts'=> $data] );
    }

    public function reply($id){

        $contact = ContactUS::with('user','reply')->where('id', $id)->first();
        return view('customer.pages.contact.reply', compact("contact"));

    }

    function replyStore(Request $request, $id){

        $request->validate([
            'reply_message'=>'required',
        ]);

        ReplyContactUS::create([
            'message_id' => $id,
            'user_id' => Auth::user()->id,
            'reply' => $request->reply_message,
        ]);


        toast('Your Replay Submitted','success');
        return redirect()->back();
    }
}
