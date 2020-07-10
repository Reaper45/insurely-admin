<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<form class="w-full max-w-lg" method="POST" action="{{route('insurers.create')}}">
    @csrf
    <div class="w-full mb-4">
        <label for="price" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Insurer name</label>
        <input name="name" value="{{old('name')}}" class="w-full @error('name') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="name">
        @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>
</form>