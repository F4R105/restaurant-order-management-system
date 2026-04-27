<x-auth-layout title="Edit item">
    <form action="{{ route('items.update', $item) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" id="name" placeholder="Item name" value="{{ $item->name }}" required>
        <input type="number" name="unit_price" id="unit_price" placeholder="Unit price" value="{{ $item->unit_price }}"
            required>
        @error('unit_price')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit" class="hover:text-blue-500 cursor-pointer">Update item</button>
        <x-form-errors />
    </form>
</x-auth-layout>
