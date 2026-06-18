<x-auth-layout title="Orders List">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Orders List</h1>
        <p class="mt-1 text-sm text-zinc-500">Track and manage customer orders.</p>
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200">
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Order Items</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Total Price</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Created At</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-center">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    @foreach ($order->orderItems as $item)
                                        <span class="text-sm text-zinc-800 font-medium">
                                            {{ $item->name }} <span class="text-zinc-400 font-normal">x{{ $item->quantity }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-semibold text-zinc-900">
                                TZS {{ number_format($order->price, 0) }}/=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                                {{ $order->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                @if ($order->served_at)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        Served ({{ $order->served_at->format('H:i') }})
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('orders.show', $order) }}" 
                                   class="text-amber-600 hover:text-amber-700 font-semibold transition-colors">
                                    View Order
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</x-auth-layout>

