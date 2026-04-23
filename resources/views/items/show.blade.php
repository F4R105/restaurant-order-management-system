<x-auth-layout title="Item details">
    <div>
    <table>
        <thead>
            <tr>
                <th colspan="2">Item details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <td>Unit price</td>
                <td>{{ $item->unit_price }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <a href="{{ route('items.edit', $item) }}">Edit item</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <form action="{{ route('items.destroy', $item) }}" method="post"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete item</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
</x-auth-layout>
