<x-auth-layout title="Order Details">
    <div>
        <h1>Order #{{ $order->id }}</h1>
        <p><a href="{{ route('orders.index') }}">Back to Orders</a></p>

        <div style="margin-bottom: 20px;">
            <p><strong>Created By:</strong> {{ $order->created_by }}</p>
            <p><strong>Served By:</strong> {{ $order->served_by ?? 'Pending' }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($order->price, 2) }}</p>
        </div>

        <h3>Order Items</h3>
        <table border="1" cellpadding="5" style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->unit_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right"><strong>Total:</strong></td>
                    <td><strong>${{ number_format($order->price, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-auth-layout>
