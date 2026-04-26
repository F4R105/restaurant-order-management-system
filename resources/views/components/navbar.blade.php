<nav
    style="border-bottom: 2px solid black; padding: 10px; margin-bottom: 20px; display: flex; align-items: center; gap: 20px;">
    <h4 class="font-bold">Restaurant system</h4>
    <ul style="list-style: none; display: flex; gap: 15px; margin: 0; padding: 0;">
        <li>
            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-500' }}">
                Dashboard
            </a>
        </li>
        @can('viewAny', App\Models\Item::class)
            <li>
                <a href="{{ route('items.index') }}"
                    class="{{ request()->routeIs('items.*') ? 'text-blue-500' : 'text-gray-500' }}">
                    Items
                </a>
            </li>
        @endcan
        @can('viewAny', App\Models\Order::class)
            <li>
                <a href="{{ route('orders.index') }}"
                    class="{{ request()->routeIs('orders.index') || request()->routeIs('orders.show') ? 'text-blue-500' : 'text-gray-500' }}">
                    Orders
                </a>
            </li>
        @endcan
        @can('viewAny', App\Models\User::class)
            <li>
                <a href="{{ route('users.index') }}"
                    class="{{ request()->routeIs('users.*') ? 'text-blue-500' : 'text-gray-500' }}">
                    Users
                </a>
            </li>
        @endcan
        @can('create', App\Models\Order::class)
            <li>
                <a href="{{ route('orders.create') }}"
                    class="{{ request()->routeIs('orders.create') ? 'text-blue-500' : 'text-gray-500' }}">
                    <livewire:cart-counter />
                </a>
            </li>
        @endcan
    </ul>
    <div style="margin-left: auto;">
        <div>
            <a href="{{ route('users.edit', Auth::user()) }}" class="hover:text-blue-500">{{ auth()->user()->getFullName() }} as {{ auth()->user()->getRole() }}</a>
        </div>
        <x-logout-button />
    </div>
</nav>
