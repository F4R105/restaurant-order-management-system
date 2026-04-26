<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    public function add(Item $item)
    {
        if(!Gate::allows('create-order')) return back()->with('error', 'Access denied');

        $cart = session()->get('order_cart', []);
        
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
        
        session()->put('order_cart', $cart);
        
        return redirect()->route('items.index')->with('success', "{$currentQuantity}x {$item->name} added in cart.");
    }
}
