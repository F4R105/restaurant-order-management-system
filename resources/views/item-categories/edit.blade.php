<x-auth-layout title="Edit item category">
    <div class="mb-8">
        <a href="{{ route('item-categories.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to item categories
        </a>
        <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Edit Item Category</h1>
    </div>

    <div class="max-w-xl bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="h-1.5 bg-amber-500"></div>
        <div class="p-8">
            <form action="{{ route('item-categories.update', $itemCategory) }}" method="post" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-700 mb-1.5">Category Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Grilled Chicken Wings" value="{{ old('name', $itemCategory->name) }}" required
                        class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                </div>

                <div>
                    <label for="is_active" class="block text-sm font-medium text-zinc-700 mb-1.5">Status</label>
                    <select name="is_active" id="is_active" required
                        class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        <option value="1" {{ old('is_active', $itemCategory->is_active) === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $itemCategory->is_active) === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                        Update Item Category
                    </button>
                </div>

                <x-form-errors />
            </form>
        </div>
    </div>
</x-auth-layout>

