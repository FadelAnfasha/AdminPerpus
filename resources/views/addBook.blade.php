<x-app-layout>
    <x-slot name="title">
        Tambah Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah persediaan Buku') }}
        </h2>
    </x-slot>
    <br>
    <x-add-book-form :authors="$authors" :publishers="$publishers" :bookshelves="$bookshelves" />

</x-app-layout>
