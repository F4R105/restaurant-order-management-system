<x-main-layout title="Login">
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        @error('password')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button type="submit" class="hover:text-blue-500 cursor-pointer">Login</button>
    </form>
</x-main-layout>
