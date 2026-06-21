<x-auth-layout title="Dashboard">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Dashboard</h1>
        <p class="mt-1 text-sm text-zinc-500">Welcome to the restaurant order management portal.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1: Items -->
        <div class="bg-white border border-zinc-200 rounded-2xl p-6 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold uppercase tracking-wider text-zinc-400">Items</span>
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <span class="block text-2xl font-bold text-zinc-900">{{ new App\Models\Item()->getTotalItems() }}</span>
                        <span class="text-xs text-zinc-500">Total items registered</span>
                    </div>
                    
                    @if (new App\Models\OrderItem()->mostOrderedItem())
                        <div class="border-t border-zinc-100 pt-3">
                            <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Most Popular Item</span>
                            <div class="mt-1 flex items-center justify-between">
                                <span class="text-sm font-semibold text-zinc-800">{{ new App\Models\OrderItem()->mostOrderedItem()->name }}</span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                                    {{ new App\Models\OrderItem()->mostOrderedItem()->total_quantity }} units
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 2: Users -->
        @can('viewAny', App\Models\User::class)
            <div class="bg-white border border-zinc-200 rounded-2xl p-6 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold uppercase tracking-wider text-zinc-400">Staff members</span>
                        <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <span class="block text-lg font-bold text-zinc-900">{{ new App\Models\User()->getTotalStaff('Waiter') }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Waiters</span>
                            </div>
                            <div>
                                <span class="block text-lg font-bold text-emerald-600">{{ new App\Models\User()->getTotalStaff('Chef Cooker') }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Chef Cookers</span>
                            </div>
                            <div>
                                <span class="block text-lg font-bold text-amber-600">{{ new App\Models\User()->getTotalStaff('Cashier') }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Cashiers</span>
                            </div>
                        </div>

                        <div class="border-t border-zinc-100 pt-3">
                            <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">All staff</span>
                            <span class="block text-xl font-extrabold text-zinc-900 mt-0.5">
                                {{ new App\Models\User()->getTotalStaff() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <!-- Card 3: Orders -->
        @can('viewAny', App\Models\Order::class)
            <div class="bg-white border border-zinc-200 rounded-2xl p-6 shadow-xs flex flex-col justify-between md:col-span-2 lg:col-span-1">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-semibold uppercase tracking-wider text-zinc-400">Orders & Sales</span>
                        <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <span class="block text-lg font-bold text-zinc-900">{{ new App\Models\Order()->getTotal() }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Total</span>
                            </div>
                            <div>
                                <span class="block text-lg font-bold text-emerald-600">{{ new App\Models\Order()->getTotalServed() }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Served</span>
                            </div>
                            <div>
                                <span class="block text-lg font-bold text-amber-600">{{ new App\Models\Order()->getTotalPending() }}</span>
                                <span class="text-[10px] text-zinc-500 uppercase font-semibold">Pending</span>
                            </div>
                        </div>

                        <div class="border-t border-zinc-100 pt-3">
                            <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Gross Sales</span>
                            <span class="block text-xl font-extrabold text-zinc-900 mt-0.5">
                                TZS {{ number_format(new App\Models\Order()->getTotalSales()) }}/=
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</x-auth-layout>

