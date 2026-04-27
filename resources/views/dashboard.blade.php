<x-auth-layout title="Dashboard">
    <div class="flex justify-between items-center mb-6">
        <h1>Welcome to the dashboard</h1>

        {{-- <form action="{{ route('dashboard') }}" method="GET" class="flex gap-2 items-center">
            <label for="date" class="font-bold">Select Date:</label>
            <input type="date" name="date" id="date" value="{{ $selected_date }}" 
                   onchange="this.form.submit()"
                   class="border border-gray-300 rounded px-2 py-1">
        </form> --}}
    </div>

    <div style="display:flex; flex-direction:column; gap:2em;">
        {{-- items --}}
        <div>
            <h3 class="font-bold mb-2">Item Statistics</h3>
            <ul class="list-disc list-inside">
                {{-- <form action="{{ route('dashboard') }}" method="GET" class="flex gap-2 items-center">
                    <label for="date" class="font-bold">Select Date:</label>
                    <input type="date" name="date" id="date" value="{{ $selected_date }}"
                        onchange="this.form.submit()" class="border border-gray-300 rounded px-2 py-1">
                </form> --}}
                <li>Total Items: {{ new App\Models\Item()->getTotalItems() }}</li>
                <li>Most sold: {{ new App\Models\OrderItem()->mostOrderedItem()->name ?? 'N/A' }}
                    @if (new App\Models\OrderItem()->mostOrderedItem())
                        ({{ new App\Models\OrderItem()->mostOrderedItem()->total_quantity }} units)
                    @endif
                </li>
            </ul>
        </div>

        {{-- users --}}
        @can('viewAny', App\Models\User::class)
            <div>
                <h3 class="font-bold mb-2">User Statistics</h3>
                <ul class="list-disc list-inside">
                    <li>Admins: {{ new App\Models\User()->getTotalAdmins() }}</li>
                    <li>Employees: {{ new App\Models\User()->getTotalEmployee() }}</li>
                </ul>
            </div>
        @endcan

        {{-- orders --}}
        @can('viewAny', App\Models\Order::class)
            <div>
                {{-- <h3 class="font-bold mb-2">Order Statistics ({{ \Carbon\Carbon::parse($selected_date)->format('M d, Y') }})</h3> --}}
                <ul class="list-disc list-inside">
                    <li>Total orders: {{ new App\Models\Order()->getTotal() }}</li>
                    <li>Served orders: {{ new App\Models\Order()->getTotalServed() }}</li>
                    <li>Pending orders: {{ new App\Models\Order()->getTotalPending() }}</li>
                    <li>Sales: TZS {{ new App\Models\Order()->getTotalSales() }}/=</li>
                </ul>
            </div>
        @endcan
    </div>
</x-auth-layout>
