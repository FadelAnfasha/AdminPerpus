@props(['books', 'members', 'userId'])

<!-- Form -->
<form id="store-borrow-form" action="{{ route('store-borrow') }}" method="POST" class="max-w-md mx-auto">
    @csrf

    <div class="relative z-0 w-full my-5 group">
        <label for="book_id" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Judul Buku</label>
        <select id="book_id" name="book_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
            @foreach ($books as $book)
                <option value="{{ $book['id'] }}">{{ $book['title'] }}</option>
            @endforeach
        </select>
        @error('book_id')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="relative z-0 w-full my-5 group">
        <label for="member_id" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Nama
            Peminjam</label>
        <select id="member_id" name="member_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
            @foreach ($members as $member)
                <option value="{{ $member['id'] }}">{{ $member['name'] }}</option>
            @endforeach
        </select>
        @error('member_id')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div id="date-range-picker" date-rangepicker class="flex items-center">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input id="borrowDate" name="borrowDate" type="text"
                class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Tanggal Pinjam" datepicker datepicker-buttons datepicker-autoselect-today>
            @error('borrowDate')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <span class="mx-4 text-gray-700">s/d</span>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input id="returnDate" name="returnDate" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tanggal Kembali" datepicker datepicker-buttons>
            @error('returnDate')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <input type="hidden" name="user_id" id="user_id" value="{{ $userId }}">
    @error('user_id')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
    <br>

    <button type="submit"
        class="text-white bg-green-400 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#member_id').select2({
            placeholder: "Cari Nama Peminjam",
            allowClear: true
        });

        $('#book_id').select2({
            placeholder: "Cari Judul Buku",
            allowClear: true
        });
    });
</script>
