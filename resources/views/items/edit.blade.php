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
        <button type="submit">Update item</button>
    </form>
</x-auth-layout>
