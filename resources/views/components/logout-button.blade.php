<form action="{{ route('auth.logout') }}" method="post" class="inline-block">
    @csrf
    <button type="submit" class="inline-flex items-center justify-center rounded-xl border border-amber-200 bg-amber-50 px-3 py-2 text-sm font-semibold text-amber-700 transition-colors hover:bg-amber-100 hover:text-amber-800 focus:outline-hidden focus:ring-2 focus:ring-amber-200">
        Logout
    </button>
</form>