<nav class="border-b border-accent-100 bg-white/95 shadow-sm sticky top-0 z-40 mb-6">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="text-accent-600 hover:text-accent-700 transition">
            <h4 class="text-lg font-semibold tracking-tight">Enea Restaurant</h4>
        </a>

        <ul class="flex flex-wrap items-center gap-3 sm:gap-5 m-0 p-0 list-none">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'text-accent-600' : 'text-slate-500 hover:text-accent-800' }}">
                    Dashboard
                </a>
            </li>
            @can('viewAny', App\Models\Item::class)
                <li>
                    <a href="{{ route('items.index') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('items.*') ? 'text-accent-600' : 'text-slate-500 hover:text-accent-700' }}">
                        Items
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\Order::class)
                <li>
                    <a href="{{ route('orders.index') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('orders.index') || request()->routeIs('orders.show') ? 'text-accent-600' : 'text-slate-500 hover:text-accent-700' }}">
                        Orders
                        @can('serve-order')
                            <span class="ml-1 inline-flex items-center rounded-full bg-accent-50 px-2 py-0.5 text-[11px] font-semibold text-accent-700">
                                {{ (new App\Models\Order)->getTotalPending() }}
                            </span>
                        @endcan
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\User::class)
                <li>
                    <a href="{{ route('users.index') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('users.*') ? 'text-accent-600' : 'text-slate-500 hover:text-accent-700' }}">
                        Users
                    </a>
                </li>
            @endcan
            @can('viewAny', App\Models\ItemCategory::class)
                <li>
                    <a href="{{ route('item-categories.index') }}"
                        class="text-sm font-medium transition {{ request()->routeIs('item-categories.*') ? 'text-accent-600' : 'text-slate-500 hover:text-accent-700' }}">
                        Item Categories
                    </a>
                </li>
            @endcan
            @can('create', App\Models\Order::class)
                <li class="relative">
                    <a href="{{ route('orders.create') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-accent-200 bg-accent-50 px-3 py-2 text-sm font-semibold text-accent-700 transition hover:bg-accent-100 hover:text-accent-800 {{ request()->routeIs('orders.create') ? 'shadow-sm' : '' }}">
                        <span>Cart</span>
                        <livewire:cart-counter />
                    </a>

                    <div class="absolute top-full left-1/2 z-50 mt-2 -translate-x-1/2 w-fit min-w-[18rem] max-w-xs">
                        <x-toaster />
                    </div>
                </li>
            @endcan
        </ul>

        <div class="ml-auto flex items-center gap-3 text-sm text-slate-600">
            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 text-slate-700">
                {{ auth()->user()->getFullName() }} as {{ auth()->user()->role }}
            </div>
            <div>
                <x-logout-button />
            </div>
        </div>
    </div>
</nav>

