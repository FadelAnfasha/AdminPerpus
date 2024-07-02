<x-app-layout>
    <x-slot name="title">
        Tambah Rak Buku</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Rak Buku') }}
        </h2>
    </x-slot>
    <br>
    <x-add-bookshelf-form></x-add-bookshelf-form>
</x-app-layout>
