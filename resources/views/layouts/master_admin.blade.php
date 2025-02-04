<x-app-layout>
    <x-slot name="navbar">
    @include('management.navbar')
    </x-slot>
    <x-slot name="header">
        @yield('header')
    </x-slot>

    <x-slot name="body">
    @yield('body')
    </x-slot>
</x-app-layout>
