<x-auth-layout title="Dashboard">
    <h1>Welcome to the dashboard</h1>

    {{-- items --}}
    <ul class="list-disc list-inside">
        <li>Items: 6</li>
        <li>Most sold: Chapati</li>
    </ul>

    {{-- users --}}
    <ul class="list-disc list-inside">
        <li>Admins: 3</li>
        <li>Employees: 5</li>
    </ul>

    {{-- orders (daily) --}}
    <ul class="list-disc list-inside">
        <li>Total orders: 9</li>
        <li>Served orders: 4</li>
        <li>Pending orders: 5</li>
        <li>Sales: TZS 5000/=</li>
    </ul>
</x-auth-layout>
