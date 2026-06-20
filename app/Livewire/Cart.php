<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use Livewire\Attributes\On;

class Cart extends Component
{
    public $orderItems = [];
    public $createdBy = '';

    public function mount()
    {
        $this->createdBy = auth()->user()?->getFullName() ?? 'Guest';
        
        // Load existing cart from session
        $this->orderItems = session()->get('order_cart_' . auth()->id(), []);
    }

    #[On('cart-updated')]
    public function refreshCart()
    {
        $this->orderItems = session()->get('order_cart_' . auth()->id(), []);
    }

    public function addItem($itemId = null)
    {
        if (!$itemId) return;

        $found = false;
        foreach ($this->orderItems as &$orderItem) {
            if ($orderItem['item_id'] == $itemId) {
                $orderItem['quantity'] = ($orderItem['quantity'] ?? 1) + 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->orderItems[] = [
                'item_id' => $itemId,
                'quantity' => 1,
            ];
        }

        $this->syncSession();
        $this->dispatch('cart-updated');
    }

    public function removeItem($index)
    {
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
        $this->syncSession();
        $this->dispatch('cart-updated');
    }

    public function updatedOrderItems()
    {
        $this->syncSession();
        $this->dispatch('cart-updated');
    }

    protected function syncSession()
    {
        session()->put('order_cart_' . auth()->id(), $this->orderItems);
    }

    public function submit()
    {
        // Validate
        $this->validate([
            'orderItems' => 'required|array|min:1',
            'orderItems.*.item_id' => 'required|exists:items,id',
            'orderItems.*.quantity' => 'required|integer|min:1',
            'createdBy' => 'required|string',
        ]);

        // Calculate total price
        $totalPrice = 0;
        foreach ($this->orderItems as $orderItem) {
            $item = Item::find($orderItem['item_id']);
            $totalPrice += $item->unit_price * $orderItem['quantity'];
        }

        // Create order
        $order = Order::create([
            'price' => $totalPrice,
            'created_by' => $this->createdBy,
            'served_by' => null, 
        ]);

        // Create order items
        foreach ($this->orderItems as $orderItem) {
            $item = Item::find($orderItem['item_id']);
            OrderItem::create([
                'name' => $item->name,
                'unit_price' => $item->unit_price,
                'quantity' => $orderItem['quantity'],
                'order_id' => $order->id,
            ]);
        }

        // Clear session after successful order
        session()->forget('order_cart_' . auth()->id());
        $this->dispatch('cart-updated');

        return redirect()->route('orders.show', $order->id);
    }

    public function render()
    {
        $items = Item::all()->keyBy('id');
        return view('livewire.cart', compact('items'));
    }
}
