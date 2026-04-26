<x-auth-layout title="Order Details">
    <div>
        <h1>Order #{{ $order->id }}</h1>
        <p><a href="{{ route('orders.index') }}" class="hover:text-blue-500">Back to Orders</a></p>

        <div style="margin-bottom: 20px;">
            <p><strong>Created By:</strong> {{ $order->created_by }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Served By:</strong> {{ $order->served_by ?? 'Pending' }}</p>
            <p><strong>Served At:</strong> {{ $order->served_at?->format('Y-m-d H:i:s') ?? 'Pending' }}</p>
            <p><strong>Total Price:</strong> TZS {{ number_format($order->price, 0) }}/=</p>
        </div>

        <h3>Order Items</h3>
        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-400">Item Name</th>
                    <th class="border border-gray-400">Unit Price</th>
                    <th class="border border-gray-400">Quantity</th>
                    <th class="border border-gray-400">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td class="border border-gray-400">{{ $item->name }}</td>
                        <td class="border border-gray-400">TZS {{ number_format($item->unit_price, 0) }}/=</td>
                        <td class="border border-gray-400">{{ $item->quantity }}</td>
                        <td class="border border-gray-400">TZS
                            {{ number_format($item->unit_price * $item->quantity, 0) }}/=</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right"><strong>Total:</strong></td>
                    <td class="border border-gray-400"><strong>TZS {{ number_format($order->price, 0) }}/=</strong>
                    </td>
                </tr>
                @can('delete', App\Models\Order::class)
                    @if (!$order->isServed())
                        <tr>
                            <td colspan="4">
                                <form action="{{ route('orders.destroy', $order) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="hover:text-blue-500 cursor-pointer">Delete order</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endcan
            </tfoot>
        </table>
    </div>

    @can('serve-order')
        @if (!$order->isServed())
            <div>
                <form action="{{ route('orders.update', $order) }}" method="post" onsubmit="confirm('Are you sure?..')">
                    @csrf
                    @method('patch')
                    <button type="submit" class="hover:text-blue-500 cursor-pointer">Serve order</button>
                </form>
            </div>
        @endif
    @endcan
</x-auth-layout>
