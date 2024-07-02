<x-app-layout>
    <x-slot name="title">
        Peminjaman
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Peminjaman') }}
        </h2>
    </x-slot>
    <br>

    <s-toast></s-toast>
    <x-th-borrow :borrows="$borrows"></x-th-borrow>
</x-app-layout>
