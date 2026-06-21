<x-auth-layout title="Item categories">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Item categories List</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage your restaurant menu items and pricing.</p>
        </div>

        @can('create', App\Models\ItemCategory::class)
            <a href="{{ route('item-categories.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Add new item category
            </a>
        @endcan
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200">
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Item Category</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200">
                    @foreach ($itemCategories as $itemCategory)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{-- <a href="{{ route('item-categories.show', $itemCategory) }}" --}}
                                <a href="#"
                                   class="font-semibold text-zinc-900 hover:text-amber-600 transition-colors">
                                    {{ $itemCategory->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-zinc-700">
                                {{ $itemCategory->is_active ? 'Active' : 'Inactive' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-3">
                                    {{-- <a href="{{ route('item-categories.show', $itemCategory) }}" 
                                       class="text-amber-600 hover:text-amber-700 transition-colors font-semibold">
                                        View Item Category
                                    </a> --}}
                                    @can('delete', $itemCategory)
                                        <form action="{{ route('item-categories.destroy', $itemCategory) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-semibold rounded-lg transition-colors duration-150 cursor-pointer"
                                                    onclick="return confirm('Are you sure you want to delete this item category? This action cannot be undone.')">
                                                Delete
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

