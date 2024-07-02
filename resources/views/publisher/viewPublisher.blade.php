<x-app-layout>
    <x-slot name="title">
        Daftar Penerbit
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Penerbit Buku') }}
        </h2>
    </x-slot>

    <x-toast></x-toast>

    <x-th-publisher :publishers="$publishers"></x-th-publisher>
</x-app-layout>
