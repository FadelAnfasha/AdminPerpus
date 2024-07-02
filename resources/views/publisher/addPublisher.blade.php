<x-app-layout>
    <x-slot name="title">
        Tambah Penerbit
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Penerbit Buku') }}
        </h2>
    </x-slot>
    <br>
    <x-add-publisher-form></x-add-author-form>
</x-app-layout>
