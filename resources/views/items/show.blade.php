<x-auth-layout title="Item details">
    <div class="mb-8">
        <a href="{{ route('items.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to items
        </a>
        <h1 class="text-3xl font-bold text-zinc-955 tracking-tight">Item Details</h1>
    </div>

    <div class="max-w-2xl bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="h-1.5 bg-amber-500"></div>
        <div class="p-8">
            <div class="space-y-6">
                <!-- Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-zinc-100">
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Item Name</span>
                        <span class="mt-1 block text-lg font-bold text-zinc-900">{{ $item->name }}</span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Unit Price</span>
                        <span class="mt-1 block text-lg font-bold text-zinc-900">TZS {{ number_format($item->unit_price, 0) }}/=</span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Category</span>
                        <span class="mt-1 block text-lg font-bold text-zinc-900">{{ $item->category->name }}</span>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="flex items-center gap-4 pt-2">
                    @can('update', $item)
                        <a href="{{ route('items.edit', $item) }}" 
                           class="inline-flex items-center justify-center px-4 py-2.5 border border-zinc-300 text-sm font-semibold rounded-xl text-zinc-700 bg-white hover:bg-zinc-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-zinc-500 transition-all duration-200 shadow-xs cursor-pointer">
                            Edit Item
                        </a>
                    @endcan
                    @can('delete', $item)
                        <form action="{{ route('items.destroy', $item) }}" method="post"
                              onsubmit="return confirm('Are you sure you want to delete this item?')" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-rose-600 hover:bg-rose-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 transition-all duration-200 shadow-xs cursor-pointer">
                                Delete Item
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

