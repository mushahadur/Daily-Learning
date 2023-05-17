<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('user')->latest()->get();
        // dd($invoices);
        return view('admin.pages.invoice.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('user', 'invoiceable')->findOrFail($id);
        if (isset($invoice->invoiceable->total_price)) {
            $invoice->price = $invoice->invoiceable->total_price;
        }
        return view('admin.pages.invoice.show', compact('invoice'));
    }
}
