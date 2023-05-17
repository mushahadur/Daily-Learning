<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\WordContentOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ContentOrderModification;
use RealRashid\SweetAlert\Facades\Alert;

class ContentOrderController extends Controller
{
    public function contentOrder(Request $request)
    {

        $query_paramiter = $request->query('status');
        $count = WordContentOrder::where('user_id', Auth::id())
            ->groupBy('status')
            ->select('status', DB::raw('count(*) as count'))
            ->pluck('count', 'status');
        $totalCount = WordContentOrder::where('user_id', Auth::id())->whereNotIn('status', ['N/A'])->count();

        if (is_null($query_paramiter)) {
            $contentorder = WordContentOrder::with('contentOrderModification')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        } else {
            $contentorder = WordContentOrder::with('contentOrderModification')->where('user_id', Auth::id())->where('status', $query_paramiter)->orderBy('created_at', 'DESC')->get();
        }

        return view('customer.pages.content.index', compact('contentorder', 'count', 'totalCount'));
    }

    public function contentOrderShow($id)
    {
        $contentorder = WordContentOrder::with('word_content', 'user', 'word_content_order_detail')->where('id', $id)->first();
        $contentorderdetails = WordContentOrder::with('word_content', 'user', 'word_content_order_detail')->where('id', $id)->get();
        return view('customer.pages.content.view', compact('contentorder', 'contentorderdetails'));
    }

    public function message($id)
    {
        $contentorder = WordContentOrder::with('word_content', 'user', 'word_content_order_detail', 'contentOrderModification.user')->where('user_id', Auth::id())->where('id', $id)->first();
        $contentorderdetails = WordContentOrder::with('word_content', 'user', 'word_content_order_detail')->where('id', $id)->get();
        return view('customer.pages.content.message', compact('contentorder', 'contentorderdetails'));
    }

    public function contentStatusUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $exploreserviceorder = WordContentOrder::find($id);
            $exploreserviceorder->status = 'Completed';
            $exploreserviceorder->save();

            Alert::success('Content Order Accept Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function contentModificationUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $exploreserviceorder = WordContentOrder::find($id);
            $exploreserviceorder->status = 'Modification';
            $exploreserviceorder->save();


            $message = new ContentOrderModification();
            $message->messages = $request->messages;
            $message->user_id = Auth::id();
            $message->word_content_order_id = $id;
            $message->save();

            Alert::success('Your modification message send Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }
}
