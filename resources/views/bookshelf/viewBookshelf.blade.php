<x-app-layout>
    <x-slot name="title">
        Daftar Rak Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Rak buku') }}
        </h2>
    </x-slot>

    <x-toast></x-toast>
    <x-th-bookshelf :bookshelves="$bookshelves"></x-th-bookshelf>
</x-app-layout>
