@props(['content', 'img', 'href'])

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-end px-4 pt-4">
    </div>
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3" src="{{ $img }}" alt="" />
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $content }}</h5>
        <div class="flex mt-4 md:mt-6">
            @if (!in_array($content, ['Data Peminjaman', 'Data Pengembalian']))
                <a href="{{ '/add' . $href }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-gray-500 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-gray-800">Tambah</a>
            @endif

            <a href="{{ '/view' . $href }}"
                class="py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-blue-500 rounded-lg hover:bg-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-800 dark:bg-blue-500 dark:text-white dark:hover:bg-blue-700">Lihat</a>

            {{-- <a href="#"
                class="py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border hover:bg-red-700 focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-800 dark:bg-red-500 dark:hover:bg-red-700">Hapus</a> --}}
        </div>
    </div>
</div>
