<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

<form class="w-full max-w-lg" method="POST" action="{{route('insurers.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="bg-white p-1">
        <div class="w-full mb-4">
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Name</label>
                <input name="name" value="{{old('name')}}" class="w-full @error('name') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
            </div>
            @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mb-3">
                <label for="email" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Email</label>
                <input name="email" value="{{old('email')}}" class="w-full @error('email') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="email">
            </div>
            @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mb-3">
                <label for="phone_number" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Phone Number</label>
                <input name="phone_number" value="{{old('phone_number')}}" class="w-full @error('phone_number') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
            </div>
            @error('phone_number')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mb-3">
                <label for="logo" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Logo</label>
                <input name="logo" value="{{old('logo')}}" class="w-full @error('logo') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="file">
            </div>
            @error('logo')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror

        </div>

    </div>
    <div class="sm:flex sm:flex-row-reverse justify-between	">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Save
            </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button @click="open = false" type="reset" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Cancel
            </button>
        </span>
    </div>
</form>
