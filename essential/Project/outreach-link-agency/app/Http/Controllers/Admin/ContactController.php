<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUS;
use App\Models\ReplyContactUS;

class ContactController extends Controller
{
    public function index(){
            $data = ContactUS::with('user')->get();
            return view('admin.pages.contact.index',['contacts'=> $data]);
    }

    public function show($id){
        $contact = ContactUS::with('user','reply')->where('id', $id)->first();
        return view('admin.pages.contact.show', compact("contact"));
    }
}
