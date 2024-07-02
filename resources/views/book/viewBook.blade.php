<x-app-layout>
    <x-slot name="title">
        Daftar Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku-buku') }}
        </h2>
    </x-slot>

    <x-toast></x-toast>

    <x-th-book :books="$books"></x-th-book>
</x-app-layout>
