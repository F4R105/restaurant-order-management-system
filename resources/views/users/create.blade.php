<x-auth-layout title="Add user">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div>
            *<input type="text" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}"
                required>
        </div>
        <div>
            <input type="text" name="last_name" id="last_name" placeholder="Last name" value="{{ old('last_name') }}">
        </div>
        <div>
            *<input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}"
                required>
        </div>
        <div>
            *<input type="text" name="phone number" id="phone_number" placeholder="07** *** ***"
                value="{{ old('phone_number') }}" required>
        </div>
        <div>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div>
            *<select name="role" id="role">
                <option value="Waiter">Waiter</option>
                <option value="Chef Cooker">Chef Cooker</option>
            </select>
        </div>
        <div>
            *<input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div>
            *<input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirm password">
        </div>
        <div>
            <button type="submit" class="hover:text-blue-500 cursor-pointer">Add user</button>
        </div>
        <x-form-errors />
    </form>
</x-auth-layout>
