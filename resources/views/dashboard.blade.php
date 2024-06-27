<x-app-layout>
    <x-slot name="title">
        Administrasi
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang di menu Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-600 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-4 gap-4">
                        <x-cards :content="'Buku'" :img="asset('image/cards/book-icon.png')" :href="'book'" />
                        <x-cards :content="'Penulis'" :img="asset('image/cards/addauthor-icon.png')" :href="'author'" />
                        <x-cards :content="'Penerbit'" :img="asset('image/cards/publish-icon.png')" :href="'publisher'" />
                        <x-cards :content="'Rak Buku'" :img="asset('image/cards/bookshelf-icon.png')" :href="'bookshelf'" />
                    </div>
                    <br>
                    <div class="grid grid-cols-4 gap-4">
                        <x-cards :content="'Peminjaman'" :img="asset('image/cards/borrow-icon.png')" :href="'borrow'" />
                        <x-cards :content="'Anggota'" :img="asset('image/Cards/members-icon.png')" :href="'member'" />
                        <x-cards :content="'Data Peminjaman'" :img="asset('image/cards/display-icon.png')" :href="'borrowing'" />
                        <x-cards :content="'Data Pengembalian'" :img="asset('image/cards/return-icon.png')" :href="'return'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
