<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class InvoiceController extends Controller
{
    public function download(Order $order)
    {
        Gate::authorize('view', $order);

        $order->load('orderItems');

        $pdf = Pdf::loadView('orders.invoice', compact('order'));

        return $pdf->stream("invoice-{$order->id}.pdf");
    }
}
