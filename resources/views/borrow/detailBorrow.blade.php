@props(['borrow'])

<x-app-layout>
    <x-slot name="title">
        Peminjaman
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Peminjaman') }}
        </h2>
    </x-slot>
    <br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Verifikasi Peminjaman Oleh
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Verifikasi Peminjaman Oleh
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $borrow->borrow_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $borrow->member->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $borrow->book->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $borrow->return_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $borrow->user->name }}
                    </td>

                </tr>

            </tbody>

        </table>
    </div>

    <s-toast></s-toast>
</x-app-layout>
