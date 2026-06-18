<x-auth-layout title="Items">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Items List</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage your restaurant menu items and pricing.</p>
        </div>

        @can('create', App\Models\Item::class)
            <a href="{{ route('items.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Add new item
            </a>
        @endcan
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200">
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Item Name</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Unit Price</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200">
                    @foreach ($items as $item)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('items.show', $item) }}"
                                   class="font-semibold text-zinc-900 hover:text-amber-600 transition-colors">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-zinc-700">
                                TZS {{ number_format($item->unit_price, 0) }}/=
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('items.show', $item) }}" 
                                       class="text-amber-600 hover:text-amber-700 transition-colors font-semibold">
                                        View Item
                                    </a>
                                    @can('create', App\Models\Order::class)
                                        <form action="{{ route('orders.cart.add', $item) }}" method="GET" class="inline">
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-semibold rounded-lg transition-colors duration-150 cursor-pointer">
                                                Add to cart
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth-layout>

