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
                @can('update', $item)
                    <tr>
                        <td colspan="2">
                            <a href="{{ route('items.edit', $item) }}" class="hover:text-blue-500">Edit item</a>
                        </td>
                    </tr>
                @endcan
                @can('delete', $item)
                    <tr>
                        <td colspan="2">
                            <form action="{{ route('items.destroy', $item) }}" method="post"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="hover:text-orange-600 cursor-pointer">Delete item</button>
                            </form>
                        </td>
                    </tr>
                @endcan
            </tfoot>
        </table>
    </div>
</x-auth-layout>
