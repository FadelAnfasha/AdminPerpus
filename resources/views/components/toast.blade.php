<div x-data="{ show: {{ session('success') ? 'true' : 'false' }} }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
    :class="{
        'fixed top-4 right-4 p-4 text-sm rounded-lg shadow-lg': true,
        'text-green-800 bg-green-300 dark:bg-green-800 dark:text-green-400 border border-green-600': '{{ session('type') }}'
        === 'stored',
        'text-blue-800 bg-blue-300 dark:bg-blue-800 dark:text-blue-400 border border-blue-600': '{{ session('type') }}'
        === 'updated',
        'text-red-800 bg-red-300 dark:bg-red-800 dark:text-red-400 border border-red-600': '{{ session('type') }}'
        === 'deleted',
    }"
    role="alert">
    <span class="font-medium">
        {{ session('type') === 'deleted' ? 'Deleted:' : 'Success:' }}
    </span> {{ session('success') }}
</div>
