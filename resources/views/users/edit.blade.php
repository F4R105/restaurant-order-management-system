<x-auth-layout title="Edit user">
    <div class="mb-8">
        <a href="{{ route('users.show', $user) }}" class="inline-flex items-center text-sm font-medium text-zinc-500 hover:text-zinc-800 transition-colors mb-3">
            <svg class="w-4.5 h-4.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to user details
        </a>
        <h1 class="text-3xl font-bold text-zinc-950 tracking-tight">Edit Profile</h1>
    </div>

        @can('updateSensitiveInfo', $user)
            <div>
                <div>
                    <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                </div>
                <div>
                    <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                </div>
                <div>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
                </div>
                <div>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                @if (!auth()->user()->role === 'Admin')
                    <div>
                        <select name="role" id="role">
                            <option value="Chef Cooker" selected="{{ $user->role === 'Chef Cooker' }}">Employee</option>
                            <option value="Waiter" selected="{{ $user->role === 'Waiter' }}">Admin</option>
                        </select>
                    </div>
                @endcan

                <div class="space-y-5 border-t border-zinc-100 pt-6">
                    <h3 class="text-base font-bold text-zinc-900 border-b border-zinc-100 pb-3">Security & Credentials</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium text-zinc-700 mb-1.5">Username</label>
                            <input type="text" name="username" id="username" value="{{ $user->username }}" required
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-zinc-700 mb-1.5">New Password</label>
                            <input type="password" name="password" id="password" placeholder="Leave blank to keep current"
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 mb-1.5">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Leave blank to keep current"
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-zinc-100">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 shadow-xs cursor-pointer">
                        Update User
                    </button>
                </div>
                
                <x-form-errors />
            </form>
        </div>
    </div>
</x-auth-layout>

