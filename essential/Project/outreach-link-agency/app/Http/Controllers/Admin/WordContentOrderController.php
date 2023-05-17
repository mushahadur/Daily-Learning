<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentOrderModification;
use App\Models\WordContentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WordContentOrderController extends Controller
{
    public function index()
    {
        $contentorder = WordContentOrder::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.content_order.index', compact('contentorder'));
    }

    public function contentOrderShow($id)
    {
        $contentorder = WordContentOrder::with('word_content_order_detail')->where('id', $id)->first();
        $contentorderdetails = WordContentOrder::with('word_content_order_detail')->where('id', $id)->get();
        // dd($contentorderdetails->word_content_order_detail);
        return view('admin.pages.content_order.view', compact('contentorder', 'contentorderdetails'));
    }

    public function contentOrderEdit($id)
    {
        $contentorder = WordContentOrder::with('word_content_order_detail')->where('id', $id)->first();
        $contentorderdetails = WordContentOrder::with('word_content_order_detail')->where('id', $id)->get();
        $message = ContentOrderModification::with('word_content_order', 'user')->where('content_order_modifications.word_content_order_id', $contentorder->id)->get();
        // dd($contentorderdetails->word_content_order_detail);
        return view('admin.pages.content_order.edit', compact('contentorder', 'contentorderdetails', 'message'));
    }

    public function contentOrderUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $contentorder = WordContentOrder::find($id);
            $contentorder->status = $request->status;
            $contentorder->save();

            if ($request->messages) {
                $message = new ContentOrderModification();
                $message->messages = $request->messages;
                $message->user_id = Auth::id();
                $message->word_content_order_id = $contentorder->id;
                $message->save();
            }

            Alert::success('Content Order Update Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }
}
