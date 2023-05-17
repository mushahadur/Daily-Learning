<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyContactUS;
use App\Models\ContactUS;
use Illuminate\Support\Facades\Auth;

class ReplyContactController extends Controller
{
    function reply(Request $request, $id){

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
