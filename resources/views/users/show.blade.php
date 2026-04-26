<x-auth-layout title="User details">
    <div>
        @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}" class="hover:text-blue-500">Add new user</a>
        @endcan

        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th colspan="2">User details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-400">First name</td>
                    <td class="border border-gray-400">{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Last name</td>
                    <td class="border border-gray-400">{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Username</td>
                    <td class="border border-gray-400">{{ $user->username }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Phone number</td>
                    <td class="border border-gray-400">{{ $user->phone_number }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Email</td>
                    <td class="border border-gray-400">{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400">Role</td>
                    <td class="border border-gray-400">{{ $user->getRole() }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ route('users.edit', $user) }}">Edit item</a>
                    </td>
                </tr>
                @can('create', App\Models\User::class)
                    <tr>
                        <td colspan="2">
                            <form action="{{ route('users.destroy', $user) }}" method="post"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete user</button>
                            </form>
                        </td>
                    </tr>
                @endcan
            </tfoot>
        </table>
    </div>
</x-auth-layout>
