<x-main-layout title="Login">
    <div class="min-h-screen flex flex-col items-center justify-center bg-zinc-50 px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-md w-full relative">
            <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="h-1.5 bg-amber-500"></div>
                
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold tracking-tight text-zinc-950">
                            Sign In<span class="text-amber-500">.</span>
                        </h2>
                        <p class="mt-2.5 text-sm text-zinc-500">
                            Restaurant Order Management System
                        </p>
                    </div>
                    
                    <form class="space-y-5" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium text-zinc-700 mb-1.5">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter your username" value="{{ old('username') }}" required
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-zinc-700 mb-1.5">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required
                                class="block w-full px-3.5 py-2.5 bg-white border border-zinc-300 rounded-xl shadow-xs placeholder-zinc-400 focus:outline-hidden focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm transition-all duration-200">
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-amber-600 hover:bg-amber-500 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-amber-600 transition-all duration-200 cursor-pointer shadow-xs">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($errors->any())
                <div id="error-container" class="absolute left-0 right-0 top-full mt-4 transition-all duration-300 ease-in-out opacity-100 transform translate-y-0">
                    <x-form-errors />
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('#username, #password');
            const errorContainer = document.getElementById('error-container');
            
            if (errorContainer) {
                const hideErrors = (e) => {
                    // Only dismiss if the input event comes from the focused input (user typing/interaction)
                    // and not page-load browser autofill
                    if (document.activeElement !== e.target) {
                        return;
                    }
                    
                    errorContainer.style.opacity = '0';
                    errorContainer.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        errorContainer.style.display = 'none';
                    }, 300);
                    
                    inputs.forEach(input => {
                        input.removeEventListener('input', hideErrors);
                    });
                };

                inputs.forEach(input => {
                    input.addEventListener('input', hideErrors);
                });
            }
        });
    </script>
</x-main-layout>



