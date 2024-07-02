<x-app-layout>
    <x-slot name="title">
        Anggota</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Anggota') }}
        </h2>
    </x-slot>
    <br>
    <x-add-member-form></x-add-member-form>
</x-app-layout>
