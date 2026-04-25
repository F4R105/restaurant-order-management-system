<nav style="border-bottom: 2px solid black; padding: 10px; margin-bottom: 20px; display: flex; align-items: center; gap: 20px;">
    <h4 class="font-bold">Restaurant system</h4>
    <ul style="list-style: none; display: flex; gap: 15px; margin: 0; padding: 0;">
        <li>
            <a href="{{ route('dashboard') }}" 
            class="{{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-500' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('items.index') }}" 
            class="{{ request()->routeIs('items.*') ? 'text-blue-500' : 'text-gray-500' }}">
                Items
            </a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}" 
            class="{{ request()->routeIs('orders.index') || request()->routeIs('orders.show') ? 'text-blue-500' : 'text-gray-500' }}">
                Orders
            </a>
        </li>
        <li>
            <a href="{{ route('orders.create') }}" 
            class="{{ request()->routeIs('orders.create') ? 'text-blue-500' : 'text-gray-500' }}">
                <livewire:cart-counter />
            </a>
        </li>
    </ul>
    <div style="margin-left: auto;">
        <div>
            <span>{{ auth()->user()->fullName() }} as {{ auth()->user()->role }}</span>
        </div>
        <x-logout-button />
    </div>
</nav>
