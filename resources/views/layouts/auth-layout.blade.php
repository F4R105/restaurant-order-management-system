@props(['title' => 'Dashboard'])

<x-main-layout title="{{ $title }}">
    <div class="min-h-screen bg-zinc-50 text-zinc-900 font-sans antialiased pb-12">
        <x-navbar />
        <x-toaster />

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</x-main-layout>

