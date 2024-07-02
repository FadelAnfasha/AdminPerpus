<x-app-layout>
    <x-slot name="title">
        Ubah Rak Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ubah Informasi Rak Buku') }}
        </h2>
    </x-slot>
    <br>
    <x-update-bookshelf-form :bookshelf="$bookshelf" />
</x-app-layout>
