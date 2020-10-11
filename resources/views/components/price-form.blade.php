<div>
    <!-- He who is contented is rich. - Laozi -->
    <div class="mb-6">
        <label for="price" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Pricing</label>
        <input name="price" value="{{old('price')}}" class="w-full @error('price') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
        @error('price')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>
    <div class="mb-6">
        <div class="md:w-1/3"></div>
        <label class="md:w-2/3 block text-gray-500 font-medium">
            <input name="is_percentage" class="mr-2 leading-tight" type="checkbox">
            <span class="text-sm">
                Is Percentage
            </span>
        </label>
        @error('is_percentage')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>
</div>