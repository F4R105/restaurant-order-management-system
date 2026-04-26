@props(['title' => 'Dashboard'])

<x-main-layout title="{{ $title }}">
    <x-navbar />
    <x-toaster />

    {{ $slot }}
</x-main-layout>
