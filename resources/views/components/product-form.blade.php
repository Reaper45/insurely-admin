<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<div class="w-full mb-4">
    <label for="price" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Product title</label>
    <input name="title" value="{{old('title')}}" class="w-full @error('title') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="title">
    @error('title')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>        
    @enderror
</div>
