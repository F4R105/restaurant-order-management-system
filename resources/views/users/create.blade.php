<x-auth-layout title="Add user">
    <div class="mb-8">
        <a href="{{ route('users.index') }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to users
        </a>
        <h1 class="text-3xl font-bold text-zinc-955 tracking-tight">Add New User</h1>
    </div>

    <div class="max-w-2xl bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="h-1.5 bg-amber-500"></div>
        <div class="p-8">
            <form action="{{ route('users.store') }}" method="post" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-zinc-700 mb-1.5">First Name *</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-zinc-700 mb-1.5">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last name" value="{{ old('last_name') }}"
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-zinc-700 mb-1.5">Username *</label>
                        <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-zinc-700 mb-1.5">Phone Number *</label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="07** *** ***" value="{{ old('phone_number') }}" required
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-zinc-700 mb-1.5">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Email address" value="{{ old('email') }}"
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-zinc-700 mb-1.5">Role *</label>
                        <select name="role" id="role"
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-zinc-700 mb-1.5">Password *</label>
                        <input type="password" name="password" id="password" placeholder="Password" required
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 mb-1.5">Confirm Password *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required
                            class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                    </div>
                </div>

                <div class="pt-4 border-t border-zinc-100">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                        Add User
                    </button>
                </div>
                
                <x-form-errors />
            </form>
        </div>
    </div>
</x-auth-layout>

