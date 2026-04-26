<x-auth-layout title="Orders List">
    <div>
        <h1 class="font-bold">Orders List</h1>

        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-400">Order</th>
                    <th class="border border-gray-400">Total Price</th>
                    <th class="border border-gray-400">Created At</th>
                    <th class="border border-gray-400">Served At</th>
                    <th class="border border-gray-400">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="border border-gray-400">
                            <ul class="list-disc list-inside">
                                @foreach ($order->orderItems as $item)
                                    <li>{{ $item->name }} x{{ $item->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border border-gray-400">TZS {{ number_format($order->price, 0) }}/=</td>
                        <td class="border border-gray-400">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-400">
                            {{ $order->served_at ? $order->served_at->format('Y-m-d H:i') : 'Pending' }}</td>
                        <td class="border border-gray-400">
                            <a href="{{ route('orders.show', $order) }}" class="hover:text-blue-500">View Order</a>
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
