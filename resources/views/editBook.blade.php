<x-app-layout>
    <x-slot name="title">
        Ubah Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ubah Informasi Buku') }}
        </h2>
    </x-slot>
    <br>
    <x-update-book-form :book="$book" :authors="$authors" :publishers="$publishers" :bookshelves="$bookshelves" />
</x-app-layout>
