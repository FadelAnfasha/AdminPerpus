<x-app-layout>
    <x-slot name="title">
        Ubah Penulis
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ubah Informasi Penulis') }}
        </h2>
    </x-slot>
    <br>
    <x-update-author-form :author="$author" />
</x-app-layout>
