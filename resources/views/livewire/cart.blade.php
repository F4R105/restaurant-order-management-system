<div class="bg-white border border-zinc-200 rounded-2xl shadow-sm p-6">
    <form wire:submit="submit" class="space-y-6">
        @if (count($orderItems) <= 0)
            <div class="rounded-2xl border border-dashed border-zinc-300 bg-zinc-50 p-6 text-center">
                <p class="text-sm text-zinc-600">Your cart is empty right now.</p>
                <a href="{{ route('items.index') }}"
                   class="inline-flex items-center mt-4 text-sm font-semibold text-amber-600 hover:text-amber-700 transition-colors">
                    Browse items
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200">
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Item Name</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Unit Price</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Quantity</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Subtotal</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200">
                        @foreach ($orderItems as $index => $orderItem)
                            @php
                                $item = $items[$orderItem['item_id']] ?? null;
                            @endphp
                            <tr class="hover:bg-zinc-50/70 transition-colors">
                                <td class="px-6 py-4 align-top">
                                    <div class="font-medium text-zinc-900">{{ $item ? $item->name : 'Unknown Item' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-zinc-700">
                                    TZS {{ $item ? number_format($item->unit_price, 0) : '0' }}/=
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <input type="number"
                                               wire:model.live="orderItems.{{ $index }}.quantity"
                                               min="1"
                                               class="w-20 rounded-xl border border-zinc-200 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                        >
                                    </div>
                                    @error("orderItems.{$index}.quantity")
                                        <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-semibold text-zinc-900">
                                    TZS {{ $item && isset($orderItem['quantity']) ? number_format($item->unit_price * $orderItem['quantity'], 0) : '0' }}/=
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button type="button"
                                            wire:click="removeItem({{ $index }})"
                                            class="text-rose-600 hover:text-rose-700 transition-colors">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-zinc-50 border-t border-zinc-200">
                            <td colspan="3" class="px-6 py-4 text-right text-sm font-semibold text-zinc-700">Total</td>
                            <td colspan="2" class="px-6 py-4 text-right text-lg font-bold text-zinc-950">
                                @php
                                    $total = 0;
                                    foreach ($orderItems as $oi) {
                                        $it = $items[$oi['item_id']] ?? null;
                                        if ($it) {
                                            $total += $it->unit_price * ($oi['quantity'] ?? 0);
                                        }
                                    }
                                @endphp
                                TZS {{ number_format($total, 0) }}/=
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6">
                <div class="text-sm text-zinc-500">
                    Adjust quantities and click Create Order to confirm.
                </div>
                <button type="submit"
                        class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-amber-600 text-sm font-semibold text-white hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200 shadow-xs">
                    Create Order
                </button>
            </div>
        @endif
    </form>
</div>
