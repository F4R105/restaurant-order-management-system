<nav class="bg-white border-b border-zinc-200 shadow-xs mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-0">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-stretch sm:h-16 gap-4 sm:gap-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-8 w-full sm:w-auto">
                <!-- Brand logo/name -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-lg font-bold tracking-tight text-zinc-900">
                        Restaurant System<span class="text-amber-500">.</span>
                    </span>
                </div>

                <!-- Navigation Links -->
                <div class="flex flex-wrap items-center gap-x-5 gap-y-1 sm:h-full">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center sm:h-full px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'border-amber-500 text-zinc-900 font-semibold' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                        Dashboard
                    </a>

                    @can('viewAny', App\Models\Item::class)
                        <a href="{{ route('items.index') }}"
                            class="inline-flex items-center sm:h-full px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-150 {{ request()->routeIs('items.*') ? 'border-amber-500 text-zinc-900 font-semibold' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                            Items
                        </a>
                    @endcan

                    @can('viewAny', App\Models\Order::class)
                        <a href="{{ route('orders.index') }}"
                            class="inline-flex items-center sm:h-full px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-150 {{ request()->routeIs('orders.index') || request()->routeIs('orders.show') ? 'border-amber-500 text-zinc-950 font-semibold' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                            Orders
                            @can('serve-order')
                                @if((new App\Models\Order)->getTotalPending() > 0)
                                    <span class="ml-1.5 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                        {{ (new App\Models\Order)->getTotalPending() }}
                                    </span>
                                @endif
                            @endcan
                        </a>
                    @endcan

                    @can('viewAny', App\Models\User::class)
                        <a href="{{ route('users.index') }}"
                            class="inline-flex items-center sm:h-full px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-150 {{ request()->routeIs('users.*') ? 'border-amber-500 text-zinc-900 font-semibold' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                            Users
                        </a>
                    @endcan

                    @can('create', App\Models\Order::class)
                        <a href="{{ route('orders.create') }}"
                            class="inline-flex items-center sm:h-full px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-150 {{ request()->routeIs('orders.create') ? 'border-amber-500 text-zinc-900 font-semibold' : 'border-transparent text-zinc-500 hover:text-zinc-700' }}">
                            <livewire:cart-counter />
                        </a>
                    @endcan
                </div>
            </div>

            <!-- Right side: Profile & Logout -->
            <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end border-t border-zinc-100 sm:border-t-0 pt-3 sm:pt-0">
                <div class="text-left">
                    <a href="{{ route('users.edit', Auth::user()) }}" 
                       class="block text-sm font-medium text-zinc-700 hover:text-amber-600 transition-colors">
                        {{ auth()->user()->getFullName() }}
                    </a>
                    <span class="block text-xs text-zinc-400 font-normal">
                        {{ ucfirst(auth()->user()->getRole()) }}
                    </span>
                </div>
                
                <div class="hidden sm:block h-6 w-px bg-zinc-200"></div>

                <x-logout-button />
            </div>
        </div>
    </div>
</nav>

