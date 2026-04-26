<x-auth-layout title="Add item">
    <form action="{{ route('items.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Item name" value="{{ old('name') }}" required>
        <input type="number" name="unit_price" id="unit_price" placeholder="Unit price" value="{{ old('unit_price') }}"
            required>
        @error('unit_price')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit" class="hover:text-blue-500 cursor-pointer">Add item</button>
    </form>
</x-auth-layout>
