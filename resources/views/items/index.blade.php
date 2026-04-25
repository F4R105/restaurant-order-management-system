<x-auth-layout title="Items">
    <a href="{{ route('items.create') }}">Add new item</a>
    <a href="{{ route('orders.create') }}">Create new order</a>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Unit price</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>
                        <a href="{{ route('items.show', $item) }}">View item</a>
                    </td>
                    <td>
                        <a href="{{ route('items.edit', $item) }}">Edit item</a>
                    </td>
                    <td>
                        <form action="{{ route('items.destroy', $item) }}" method="post"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete item</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-auth-layout>
