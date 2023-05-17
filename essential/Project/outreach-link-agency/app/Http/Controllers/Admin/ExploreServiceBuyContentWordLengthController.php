<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ServiceBuyContentWordLength;
use App\Http\Requests\Admin\ExploreServiceBuyContentWordLengthRequest;

class ExploreServiceBuyContentWordLengthController extends Controller
{
    public function index()
    {
        $word_lengths = ServiceBuyContentWordLength::with('buyContent', 'buyContent.serviceType')->get();
        // dd($word_lengths);
        return view('admin.pages.explore_service_buy_content_word_length.index', get_defined_vars());
    }

    public function edit($id)
    {
        $word_length = $this->findById($id);
        return Response::json($word_length);
    }

    public function update(ExploreServiceBuyContentWordLengthRequest $request, $id)
    {
        $word_length = $this->findById($id);
        if (!empty($word_length)) {
            $word_length->price = $request->price;
            $word_length->update();
        }
        Alert::success('Congratulation', 'Price Successfully Updated');
        return redirect()->back();
    }

    public function findById($id)
    {
        return ServiceBuyContentWordLength::findOrFail($id);
    }
}
