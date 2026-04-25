<div>
    <form wire:submit="submit">

        <div>
            @if (count($orderItems) > 0)
                <table class="table-auto border-collapse border border-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-gray-400">Item Name</th>
                            <th class="border border-gray-400">Unit Price</th>
                            <th class="border border-gray-400">Quantity</th>
                            <th class="border border-gray-400">Subtotal</th>
                            <th class="border border-gray-400">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $index => $orderItem)
                            @php
                                $item = $items[$orderItem['item_id']] ?? null;
                            @endphp
                            <tr wire:key="order-item-{{ $index }}">
                                <td class="border border-gray-400">{{ $item ? $item->name : 'Unknown Item' }}</td>
                                <td class="border border-gray-400">TZS
                                    {{ $item ? number_format($item->unit_price, 0) : '0' }}/=</td>
                                <td class="border border-gray-400">
                                    <input type="number" wire:model.live="orderItems.{{ $index }}.quantity"
                                        min="1" style="width: 60px;">
                                    @error("orderItems.{$index}.quantity")
                                        <br><span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="border border-gray-400">
                                    TZS
                                    {{ $item && isset($orderItem['quantity']) ? number_format($item->unit_price * $orderItem['quantity'], 0) : '0' }}/=
                                </td>
                                <td class="border border-gray-400">
                                    <button type="button" wire:click="removeItem({{ $index }})" class="hover:text-orange-600">Remove</button>
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
                                        foreach ($orderItems as $oi) {
                                            $it = $items[$oi['item_id']] ?? null;
                                            if ($it) {
                                                $total += $it->unit_price * ($oi['quantity'] ?? 0);
                                            }
                                        }
                                        echo 'TZS ' . number_format($total, 0) . '/=';
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
            @if (count($orderItems) > 0)
                <button type="submit" class="hover:text-blue-500 cursor-pointer">Create Order</button>
            @endif
        </div>
    </form>
</div>
