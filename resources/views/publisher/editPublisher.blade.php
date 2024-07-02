<x-app-layout>
    <x-slot name="title">
        Ubah Penerbit
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ubah Informasi Penerbit') }}
        </h2>
    </x-slot>
    <br>
    <x-update-publisher-form :publisher="$publisher" />
</x-app-layout>
