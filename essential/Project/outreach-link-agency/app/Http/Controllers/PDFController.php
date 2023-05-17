<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function __invoke($id)
    {
        $invoice = Invoice::with('user', 'invoiceable')->findOrFail($id)->toArray();
        // dd($invoice);
        if (isset($invoice["invoiceable"]["total_price"])) {
            $invoice["price"] = $invoice["invoiceable"]["total_price"];
        }
        $publicPath = base_path('public');

        // Set the path to the image file
        $imagePath = 'img/webjourney.jpg';

        // Generate the URL to the image file
        $imageUrl = $publicPath . '/' . $imagePath;
        $invoice['image_url'] =  $imageUrl;
        // dd($invoice);
        $pdf = PDF::loadView('components.download-pdf', $invoice)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('invoice.pdf');
    }
}
