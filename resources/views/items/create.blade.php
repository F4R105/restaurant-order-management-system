<x-auth-layout title="Add item">
    <div class="mb-8">
        <a href="{{ route('items.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to items
        </a>
        <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Add New Item</h1>
    </div>

    <div class="max-w-xl bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="h-1.5 bg-amber-500"></div>
        <div class="p-8">
            <form action="{{ route('items.store') }}" method="post" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-700 mb-1.5">Item Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Grilled Chicken Wings" value="{{ old('name') }}" required
                        class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                </div>

                <div>
                    <label for="unit_price" class="block text-sm font-medium text-zinc-700 mb-1.5">Unit Price (TZS)</label>
                    <input type="number" name="unit_price" id="unit_price" placeholder="e.g. 15000" value="{{ old('unit_price') }}" required
                        class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    @error('unit_price')
                        <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                        Add Item
                    </button>
                </div>

                <x-form-errors />
            </form>
        </div>
    </div>
</x-auth-layout>

