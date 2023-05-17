<?php

namespace App\Http\Controllers\Customer;

use App\Models\WordContent;
use Illuminate\Http\Request;
use App\Models\ExploreCountry;
use App\Models\WordContentOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\ContaintRequest;
use App\Models\WordContentOrderDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index()
    {
        $content = WordContent::all();
        return view('customer.pages.content.buy', compact('content'));
    }

    public function redirect(Request $request, $id)
    {
        $quantity = Crypt::encrypt($request->quantity);
        return redirect()->route('content-order.show', [$id, 'quantity' => $quantity]);
    }

    public function create(Request $request, $id)
    {
        $content = WordContent::where('id', $id)->first();
        try {
            $quantity = Crypt::decrypt($request->quantity);
            // Continue processing decrypted data
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle decryption exception
            toast('Quantity is invalid', 'error');
            return redirect()->back();
        }
        return view('customer.pages.content.order', compact('content', 'quantity'));
    }

    public function store(Request $request, $id)
    {

        $validatedData = $request->validate([
            'anchor_text.*' => 'required',
            'landing_page.*' => ['required', 'url'],
        ], [
            'anchor_text.*.required' => 'This field is required.',
            'landing_page.*.required' => 'This field is required.',
            'landing_page.*.url' => 'This landing page must be url (https://example.com)',
        ]);

        // dd($request->all());

        try {

            $content = WordContent::where('id', $id)->first();
            $quantity = $request->quantity;
            $price = $content->price;
            $totalPrice = $quantity * $price;

            $wordContentOrder = new WordContentOrder([
                'reference_id' => time() . rand(10 * 45, 100 * 98),
                'word_content_id' => $request->id,
                'user_id' => auth()->user()->id,
                'total_price' => $totalPrice,
                'quantity' => $request->quantity,
                'payment_status' => 'Not Paid',
            ]);

            $saved = $wordContentOrder->save();

            if ($saved) {
                for ($i = 0; $i < $quantity; $i++) {
                    $Wordcontentcrderdetails = new WordContentOrderDetail();

                    $Wordcontentcrderdetails->word_content_order_id = $wordContentOrder->id;
                    $Wordcontentcrderdetails->topic = $request->topic[$i];
                    $Wordcontentcrderdetails->anchor_text = $request->anchor_text[$i];
                    $Wordcontentcrderdetails->landing_page = $request->landing_page[$i];
                    $Wordcontentcrderdetails->instruction = $request->instruction[$i];

                    $Wordcontentcrderdetails->save();
                }
            }
            Alert::success('Congratulation', 'Content order Save Successfully');
            return redirect()->route('content-order.checkout', $wordContentOrder->id);
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function checkout($id)
    {
        $content = WordContentOrder::with('word_content')->where('id', $id)->first();
        $content->price = $content->total_price;
        $country_list = ExploreCountry::all();
        $paymentable_area = 'content_order';
        return view('customer.pages.content.checkout', compact('content', 'country_list', 'paymentable_area'));
    }
}
