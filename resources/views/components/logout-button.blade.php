<form action="{{ route('auth.logout') }}" method="post">
    @csrf
    <button type="submit" class="cursor-pointer text-red-500">Logout</button>
</form>