<x-auth-layout title="Items">
    <div>
        <h1 class="font-bold">Items List</h1>

        @can('create', App\Models\Item::class)
            <a href="{{ route('items.create') }}" class="hover:text-blue-500">Add new item</a>
        @endcan

        <table class="border">
            <thead>
                <tr>
                    <th class="border border-gray-400">Item</th>
                    <th class="border border-gray-400">Unit price</th>
                    <th colspan="4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="border border-gray-400"><a href="{{ route('items.show', $item) }}"
                                class="hover:text-blue-500">{{ $item->name }}</a></td>
                        <td class="border border-gray-400">TZS {{ number_format($item->unit_price, 0) }}/=</td>
                        <td class="border border-gray-400">
                            <a href="{{ route('items.show', $item) }}" class="hover:text-blue-500">View Item</a>
                        </td>
                        @can('create', App\Models\Order::class)
                            <td class="border border-gray-400">
                                <form action="{{ route('cart.add', $item) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="hover:text-blue-500 hover:cursor-pointer">Add to
                                        cart</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-auth-layout>
