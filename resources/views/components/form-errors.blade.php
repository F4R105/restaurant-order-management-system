<div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-700">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
