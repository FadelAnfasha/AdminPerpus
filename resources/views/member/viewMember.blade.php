<x-app-layout>
    <x-slot name="title">
        Anggota
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Anggota Terdaftar') }}
        </h2>
    </x-slot>

    <x-toast></x-toast>

    <x-th-member :members="$members"></x-th-member>
</x-app-layout>
