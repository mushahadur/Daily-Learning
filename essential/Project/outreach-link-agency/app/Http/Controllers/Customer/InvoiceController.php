<?php

namespace App\Http\Controllers\Customer;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        // dd($invoices);
        return view('customer.pages.invoice.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('user', 'invoiceable')->findOrFail($id);
        if (isset($invoice->invoiceable->total_price)) {
            $invoice->price = $invoice->invoiceable->total_price;
        }
        return view('customer.pages.invoice.show', compact('invoice'));
    }
}
