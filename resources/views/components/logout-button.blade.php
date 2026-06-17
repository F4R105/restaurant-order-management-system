<form action="{{ route('auth.logout') }}" method="post" class="inline-block">
    @csrf
    <button type="submit" class="cursor-pointer text-sm font-medium text-zinc-500 hover:text-red-600 transition-colors py-1.5 px-3 rounded-lg hover:bg-red-50 focus:outline-hidden focus:ring-2 focus:ring-red-200">
        Logout
    </button>
</form>