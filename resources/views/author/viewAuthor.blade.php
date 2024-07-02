<x-app-layout>
    <x-slot name="title">
        Daftar Penulis
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Penulis buku') }}
        </h2>
    </x-slot>

    <x-toast></x-toast>

    <x-th-author :authors="$authors"></x-th-author>
</x-app-layout>
