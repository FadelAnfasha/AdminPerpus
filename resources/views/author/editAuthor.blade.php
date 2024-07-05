<x-app-layout>
    <x-slot name="title">
        Ubah Penulis
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ubah Informasi Penulis') }}
            </h2>
            <a href="{{ route('show-author') }}" class="py-2 px-4">
                <button type="button"
                    class="text-yellow-500 hover:text-white border border-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-500 dark:focus:ring-yellow-800">
                    Kembali
                </button>
            </a>
        </div>
    </x-slot>
    <br>
    <x-update-author-form :author="$author" />
</x-app-layout>
