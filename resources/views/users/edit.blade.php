<x-auth-layout title="Edit user">
    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('patch')

        @can('edit-user-details')
            <div>
                <div>
                    <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                </div>
                <div>
                    <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                </div>
                <div>
                    <input type="text" name="phone number" id="phone_number" value="{{ $user->phone_number }}">
                </div>
                <div>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div>
                    <select name="role" id="role">
                        <option value="employee" {{ $user->role === 'employee' && 'selected' }}>Employee</option>
                        <option value="admin" {{ $user->role === 'admin' && 'selected' }}>Admin</option>
                    </select>
                </div>
            </div>
        @endcan

        <div>
            <div>
                <input type="text" name="username" id="username" value={{ $user->username }}>
            </div>
            <div>
                <input type="password" name="current_password" id="current_password" placeholder="Current Password">
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm password">
            </div>
        </div>

        <div>
            <button type="submit" class="hover:text-blue-500 cursor-pointer">Update user</button>
        </div>
    </form>
</x-auth-layout>
