@if (session('success'))
    <div id="toast-success" class="transition-all duration-300 ease-out opacity-0 -translate-y-2">
        <div class="rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 shadow-sm flex items-center justify-between gap-3 min-w-[18rem] max-w-xs">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-emerald-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('toast-success').style.opacity='0'; document.getElementById('toast-success').classList.add('-translate-y-2'); setTimeout(() => document.getElementById('toast-success').remove(), 300);" class="text-emerald-500 hover:text-emerald-700 cursor-pointer p-1 rounded-full hover:bg-emerald-100 transition-colors">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
    <script>
        const toast = document.getElementById('toast-success');
        if (toast) {
            requestAnimationFrame(() => {
                toast.classList.remove('opacity-0', '-translate-y-2');
                toast.classList.add('opacity-100', 'translate-y-0');
            });
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-2');
                toast.classList.remove('opacity-100', 'translate-y-0');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
    </script>
@endif

@if (session('error'))
    <div id="toast-error" class="transition-all duration-300 ease-out opacity-0 -translate-y-2">
        <div class="rounded-full border border-rose-200 bg-rose-50 px-4 py-2 shadow-sm flex items-center justify-between gap-3 min-w-[18rem] max-w-xs">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-rose-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <p class="text-sm font-medium text-rose-800">{{ session('error') }}</p>
            </div>
            <button onclick="document.getElementById('toast-error').style.opacity='0'; document.getElementById('toast-error').classList.add('-translate-y-2'); setTimeout(() => document.getElementById('toast-error').remove(), 300);" class="text-rose-500 hover:text-rose-700 cursor-pointer p-1 rounded-full hover:bg-rose-100 transition-colors">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
    <script>
        const toast = document.getElementById('toast-error');
        if (toast) {
            requestAnimationFrame(() => {
                toast.classList.remove('opacity-0', '-translate-y-2');
                toast.classList.add('opacity-100', 'translate-y-0');
            });
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-2');
                toast.classList.remove('opacity-100', 'translate-y-0');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
    </script>
@endif