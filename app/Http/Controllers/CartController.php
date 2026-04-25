<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Item $item)
    {
        $cart = session()->get('order_cart', []);
        
        $found = false;
        foreach ($cart as &$cartItem) {
            if ($cartItem['item_id'] == $item->id) {
                $cartItem['quantity']++;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            $cart[] = [
                'item_id' => $item->id,
                'quantity' => 1,
            ];
        }
        
        session()->put('order_cart', $cart);
        
        return redirect()->route('items.index')->with('success', "{$item->name} added to current order.");
    }
}
