@props(['borrow'])


<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
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
