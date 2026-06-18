<x-auth-layout title="User details">
    <div class="mb-8">
        <a href="{{ route('users.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to users
        </a>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-zinc-955 tracking-tight">{{ $user->getFullName() }}</h1>
                <p class="mt-1 text-sm text-zinc-500">Detailed account profile information.</p>
            </div>
            @can('create', App\Models\User::class)
                <a href="{{ route('users.create') }}" 
                   class="inline-flex items-center justify-center px-4 py-2 border border-zinc-300 text-sm font-semibold rounded-xl text-zinc-700 bg-white hover:bg-zinc-50 transition shadow-xs cursor-pointer">
                    Add new user
                </a>
            @endcan
        </div>
    </div>

    <div class="max-w-2xl bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="h-1.5 bg-amber-500"></div>
        <div class="p-8">
            <div class="space-y-6">
                <!-- Profile details grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-zinc-100">
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">First Name</span>
                        <span class="mt-1 block text-base font-semibold text-zinc-900">{{ $user->first_name }}</span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Last Name</span>
                        <span class="mt-1 block text-base font-semibold text-zinc-900">{{ $user->last_name ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Username</span>
                        <span class="mt-1 block text-base font-semibold text-zinc-900">{{ $user->username }}</span>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Role</span>
                        <span class="mt-1 block text-sm font-semibold">
                            @if ($user->role === 'admin' || $user->role === 'super_admin')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                    {{ ucfirst($user->getRole()) }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-800">
                                    {{ ucfirst($user->getRole()) }}
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="sm:col-span-2 border-t border-zinc-100 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Phone Number</span>
                            <span class="mt-1 block text-base font-semibold text-zinc-900">{{ $user->phone_number }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-zinc-400 uppercase tracking-wider">Email Address</span>
                            <span class="mt-1 block text-base font-semibold text-zinc-900">{{ $user->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-4 pt-2">
                    <a href="{{ route('users.edit', $user) }}" 
                       class="inline-flex items-center justify-center px-4 py-2.5 border border-zinc-300 text-sm font-semibold rounded-xl text-zinc-700 bg-white hover:bg-zinc-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-zinc-500 transition-all duration-200 shadow-xs cursor-pointer">
                        Edit Profile
                    </a>

                    @can('create', App\Models\User::class)
                        <form action="{{ route('users.destroy', $user) }}" method="post"
                              onsubmit="return confirm('Are you sure you want to delete this user?')" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-rose-600 hover:bg-rose-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 transition-all duration-200 shadow-xs cursor-pointer">
                                Delete User
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

