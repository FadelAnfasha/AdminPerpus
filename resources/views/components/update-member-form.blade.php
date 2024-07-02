@props(['member'])

<form id="member-update-form" action="{{ route('update-member', $member->id) }}" method="POST" class="max-w-md mx-auto"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Nama -->
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-emerald-500 focus:outline-none focus:ring-0 focus:border-emerald-600 peer"
            placeholder=" " required />
        <label for="name"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-emerald-600 peer-focus:dark:text-emerald-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        @error('name')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <!-- Gender -->
    <input type="hidden" name="gender" id="gender" value="{{ old('gender', $member->gender) }}" />

    <!-- Alamat -->
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="address" id="address" value="{{ old('address', $member->address) }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-emerald-500 focus:outline-none focus:ring-0 focus:border-emerald-600 peer"
            placeholder=" " required />
        <label for="address"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-emerald-600 peer-focus:dark:text-emerald-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
        @error('address')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <!-- Nomor Telefon -->
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber', $member->phoneNumber) }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-emerald-500 focus:outline-none focus:ring-0 focus:border-emerald-600 peer"
            placeholder=" " required />
        <label for="phoneNumber"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-emerald-600 peer-focus:dark:text-emerald-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
            Telefon</label>
        @error('phoneNumber')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <!-- Foto -->
    <div class="relative z-0 w-full mb-5 group">
        @if (isset($member) && $member->photo)
            <img id="image-preview" src="{{ asset('storage/image/profilepic/' . $member->photo) }}" alt="Profile Photo"
                class="w-32 h-32 rounded-full object-cover mb-4"
                style="width: 150px; height: 150px; object-fit: cover; border-radius:50%" />
        @else
            <img id="image-preview" class="hidden w-full h-auto mt-5 rounded"
                style="height: 150px; width:150px; border-radius: 50%" />
        @endif
        <input type="file" name="photo" id="photo" class="hidden" />
        <label for="photo" id="photo-label"
            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-emerald-500 focus:outline-none focus:ring-0 focus:border-emerald-600 peer cursor-pointer">
            <span id="file-chosen"
                class="text-gray-500">{{ isset($member) && $member->photo ? $member->photo : 'Pilih file' }}</span>
        </label>
        <label for="photo"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-emerald-600 peer-focus:dark:text-emerald-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto</label>
        @error('photo')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit"
        class="text-white bg-green-400 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</form>
