<x-auth-layout title="Item details">
    <div>
        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th colspan="2">Item details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-400">Name</td>
                    <td class="border border-gray-400">{{ $item->name }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Unit price</td>
                    <td class="border border-gray-400">{{ $item->unit_price }}</td>
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
