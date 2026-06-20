<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Order::class);

        $orders = Order::with('orderItems')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Order::class);

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Order::class);
        // This is handled by Livewire, but we keep it for consistency or fallback
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        Gate::authorize('view', $order);

        $order->load('orderItems');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        Gate::authorize('edit', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        Gate::authorize('update', $order);

        if ($order->isServed()) return back()->with('error', 'Order already served!..');

        $updated = $order->update([
            'served_by' => $request->user()->getFullName(),
            'served_at' => Carbon::now()
        ]);

        if (!$updated) return back()->with('error', 'Failed to serve order');

        return back()->with([
            'success' => 'Order served successfully',
            'order_served' => $order->id
        ]);
    }

    public function invoice(Order $order)
    {
        Gate::authorize('view', $order);

        $order->load('orderItems');

        $pdf = Pdf::loadView('orders.invoice', compact('order'));

        return $pdf->stream("invoice-{$order->id}.pdf");
    }

    public function addToCart(Item $item)
    {
        Gate::authorize('create', Order::class);

        $cart = session()->get('order_cart_' . Auth::id(), []);

        $currentQuantity = 0;
        $found = false;
        foreach ($cart as &$cartItem) {
            if ($cartItem['item_id'] == $item->id) {
                $cartItem['quantity']++;
                $currentQuantity = $cartItem['quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $currentQuantity = 1;
            $cart[] = [
                'item_id' => $item->id,
                'quantity' => $currentQuantity,
            ];
        }

        session()->put('order_cart_' . Auth::id(), $cart);

        return redirect()->route('items.index')->with('success', "{$currentQuantity}x {$item->name} added in cart.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Gate::authorize('delete', $order);

        if ($order->isServed()) return back()->with('error', 'Order already served!..');

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted');
    }
}
