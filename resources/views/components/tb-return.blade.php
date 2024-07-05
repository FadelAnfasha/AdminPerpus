@props(['returns'])

<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $returns->borrow->borrow_date }}
    </td>
    <td class="px-6 py-4">
        {{ $returns->borrow->member->name }}
    </td>
    <td class="px-6 py-4">
        {{ $returns->book->title }}
    </td>
    <td class="px-6 py-4">
        {{ $returns->return_date }}
    </td>
    <td class="px-6 py-4">
        {{ $returns->user->name }}
    </td>

</tr>
