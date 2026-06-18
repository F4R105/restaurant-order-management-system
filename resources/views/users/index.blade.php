<x-auth-layout title="Users">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-955 tracking-tight">Users List</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage user accounts and staff access permissions.</p>
        </div>

        @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Add new user
            </a>
        @endcan
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200">
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">User</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('users.show', $user) }}"
                                   class="font-semibold text-zinc-900 hover:text-amber-600 transition-colors">
                                    {{ $user->getFullName() }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                                @if ($user->role === 'admin' || $user->role === 'super_admin')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                        {{ ucfirst($user->getRole()) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-800">
                                        {{ ucfirst($user->getRole()) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth-layout>

