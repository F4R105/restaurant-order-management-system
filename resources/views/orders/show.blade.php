<x-auth-layout title="Order Details">
    <div class="mb-8">
        <a href="{{ route('orders.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Orders
        </a>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Order #{{ $order->id }}</h1>
                <p class="mt-1 text-sm text-zinc-500">Order metadata and line item statistics.</p>
            </div>
            
            <div>
                @if ($order->served_at)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                        Served
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                        Pending
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <!-- Metadata Card -->
        <div class="bg-white border border-zinc-200 rounded-2xl p-6 shadow-sm space-y-4">
            <h3 class="text-base font-bold text-zinc-900 border-b border-zinc-100 pb-3">Metadata</h3>
            <div class="space-y-3">
                <div>
                    <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Created By</span>
                    <span class="mt-0.5 block text-sm font-medium text-zinc-800">{{ $order->created_by }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Created At</span>
                    <span class="mt-0.5 block text-sm font-medium text-zinc-800">{{ $order->created_at->format('M d, Y H:i:s') }}</span>
                </div>
                <div class="border-t border-zinc-100 pt-3">
                    <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Served By</span>
                    <span class="mt-0.5 block text-sm font-medium text-zinc-800">{{ $order->served_by ?? 'Pending' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Served At</span>
                    <span class="mt-0.5 block text-sm font-medium text-zinc-800">{{ $order->served_at?->format('M d, Y H:i:s') ?? 'Pending' }}</span>
                </div>
            </div>
            
            <div class="border-t border-zinc-100 pt-4 flex flex-col gap-3">
                @can('serve-order')
                    @if (!$order->isServed())
                        <form action="{{ route('orders.update', $order) }}" method="post" onsubmit="return confirm('Are you sure you want to serve this order?')" class="w-full">
                            @csrf
                            @method('patch')
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                                Serve Order
                            </button>
                        </form>
                    @endif
                @endcan

                @if ($order->isServed())
                    <a href="{{ route('orders.invoice', $order) }}" target="_blank" 
                       class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-zinc-300 text-sm font-semibold rounded-xl text-zinc-700 bg-white hover:bg-zinc-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-zinc-500 transition-all duration-200 shadow-xs cursor-pointer">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print Invoice
                    </a>
                @endif

                @if (!$order->isServed())
                    @can('delete', $order)
                        <form action="{{ route('orders.destroy', $order) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this order?')" class="w-full">
                            @csrf
                            @method('delete')
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-rose-600 hover:bg-rose-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 transition-all duration-200 shadow-xs cursor-pointer">
                                Delete Order
                            </button>
                        </form>
                    @endcan
                @endif
            </div>
        </div>

        <!-- Order Items Card -->
        <div class="lg:col-span-2 bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100 bg-zinc-50/50">
                <h3 class="text-base font-bold text-zinc-900">Order Items</h3>
            </div>
            
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50/50 border-b border-zinc-200">
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-zinc-500">Item Name</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Unit Price</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-center">Quantity</th>
                        <th class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200">
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-zinc-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-zinc-500 text-right">TZS {{ number_format($item->unit_price, 0) }}/=</td>
                            <td class="px-6 py-4 text-sm text-zinc-500 text-center">{{ $item->quantity }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-zinc-900 text-right">TZS {{ number_format($item->unit_price * $item->quantity, 0) }}/=</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-zinc-50/50 border-t border-zinc-200">
                        <td colspan="3" class="px-6 py-4 text-right text-sm font-bold text-zinc-700">Total Amount</td>
                        <td class="px-6 py-4 text-right text-lg font-extrabold text-zinc-900">TZS {{ number_format($order->price, 0) }}/=</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @if (session('order_served'))
        <script>
            window.open("{{ route('orders.invoice', session('order_served')) }}", '_blank');
        </script>
    @endif 
</x-auth-layout>

