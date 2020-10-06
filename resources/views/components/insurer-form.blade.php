<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

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
