@props(['member'])

<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <img src="{{ asset('storage/image/profilepic/' . $member->photo) }}" alt="Profile Picture"
            style="width: 150px; height: 150px; object-fit: cover; border-radius:50%">
    </td>

    <td class="px-6 py-4">
        {{ $member->name }}
    </td>
    <td class="px-6 py-4">
        {{ $member->gender }}
    </td>
    <td class="px-6 py-4">
        {{ $member->address }}
    </td>
    <td class="px-6 py-4">
        {{ $member->phoneNumber }}
    </td>
    <td class="px-6 py-4">
        <a href="{{ route('edit-member', $member->id) }}">
            <button type="button"
                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                Ubah
            </button>
        </a>
        <form action="{{ route('delete-member', $member->id) }}" method="POST" style="display:inline-block;"
            onsubmit="return confirm('Are you sure you want to delete this member?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                Hapus
            </button>
        </form>
    </td>
</tr>
