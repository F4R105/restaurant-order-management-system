<x-auth-layout title="Orders List">
    <div>
        <h1 class="font-bold">Orders List</h1>

        @if(session('success'))
            <div style="color: green; margin: 10px 0;">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Order Items</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Served At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            @foreach($order->orderItems as $item)
                                {{ $item->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </td>
                        <td>${{ number_format($order->price, 2) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $order->served_at ? $order->served_at->format('Y-m-d H:i') : 'Pending' }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}">View Order</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            {{ $orders->links() }}
        </div>
    </div>
</x-auth-layout>
