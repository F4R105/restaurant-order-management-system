<x-auth-layout>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>
</x-auth-layout>
