@props(['title' => 'Dashboard'])

<x-main-layout title="{{ $title }}">
    <x-navbar />

    {{ $slot }}
</x-main-layout>
