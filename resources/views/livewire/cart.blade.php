<div>
    <form wire:submit="submit">

        <div>
            @if(count($orderItems) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $index => $orderItem)
                            @php
                                $item = $items[$orderItem['item_id']] ?? null;
                            @endphp
                            <tr wire:key="order-item-{{ $index }}">
                                <td>{{ $item ? $item->name : 'Unknown Item' }}</td>
                                <td>TZS {{ $item ? number_format($item->unit_price, 2) : '0.00' }}/=</td>
                                <td>
                                    <input type="number" wire:model.live="orderItems.{{ $index }}.quantity" min="1" style="width: 60px;">
                                    @error("orderItems.{$index}.quantity") <br><span style="color: red;">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    TZS {{ ($item && isset($orderItem['quantity'])) ? number_format($item->unit_price * $orderItem['quantity'], 2) : '0.00' }}/=
                                </td>
                                <td>
                                    <button type="button" wire:click="removeItem({{ $index }})">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><strong>Total:</strong></td>
                            <td colspan="2">
                                <strong>
                                    @php
                                        $total = 0;
                                        foreach($orderItems as $oi) {
                                            $it = $items[$oi['item_id']] ?? null;
                                            if ($it) $total += $it->unit_price * ($oi['quantity'] ?? 0);
                                        }
                                        echo 'TZS ' . number_format($total, 2);
                                    @endphp
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <p>No items in your cart. <a href="{{ route('items.index') }}">Go to Menu</a></p>
            @endif
        </div>

        <div style="margin-top: 20px;">
            @if(count($orderItems) > 0)
                <button type="submit">Create Order</button>
            @endif
        </div>
    </form>
</div>
