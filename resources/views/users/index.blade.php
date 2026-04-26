<x-auth-layout title="Users">
    <div>
        <h1 class="font-bold">Users List</h1>

        @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}" class="hover:text-blue-500">Add new user</a>
        @endcan

        <table class="border">
            <thead>
                <tr>
                    <th class="border border-gray-400">User</th>
                    <th class="border border-gray-400">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-400"><a href="{{ route('users.show', $user) }}"
                                class="hover:text-blue-500">{{ $user->getFullName() }}</a></td>
                        <td class="border border-gray-400">{{ $user->getRole() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-auth-layout>
