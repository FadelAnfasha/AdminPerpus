<x-app-layout>
    <x-slot name="title">
        Pinjam Buku
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah data pinjaman buku') }}
        </h2>
    </x-slot>
    <br>
    <x-toast></x-toast>
    <x-add-borrow-form :books="$books" :members="$members" :userId="$userId" />
</x-app-layout>
