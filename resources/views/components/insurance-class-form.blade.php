<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <form class="w-full max-w-lg" method="post" action="{{ route("classes.store") }}">
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <!-- Class form -->

            <div class="mb-3">
                <label for="parent_id" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Attach to parent class</label>
                <div  @click.away="show = false" x-data="{ show: false, id: null, name: null, code: null }" class="relative">
                    <span class="inline-block w-full rounded-md shadow-sm">
                        <button  @click="show = !show" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            <div class="flex items-center space-x-3">
                                <span class="block truncate" x-text="name ? name +' - '+ code : 'Select Insurace class'"></span>
                            </div>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            </span>
                        </button>
                    </span>

                    <!-- Select popover, show/hide based on select state. -->
                    <div  x-show="show" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10">
                        <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                            @foreach ($insuranceClasses as $insuranceClass)
                                <li @click="show = false, id = {{$insuranceClass->id}}, name = '{{$insuranceClass->name}}', code = '{{$insuranceClass->value}}'"  id="listbox-item-0" role="option" class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white ">
                                    <div class="flex items-center space-x-3">
                                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                        <span class="font-normal block truncate">
                                            {{$insuranceClass->name." - ".$insuranceClass->value}}
                                        </span>
                                    </div>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-4" :class="{ 'hidden': id !== {{$insuranceClass->id}} }">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                
                    <input type="hidden" name="parent_id" x-bind:value="id" />
                    @error('class_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>        
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Name</label>
                <input name="name" value="{{old('name')}}" class="w-full @error('name') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
            </div>
            @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label for="code" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Code</label>
                <input name="code" value="{{old('code')}}" class="w-full @error('code') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
            </div>
            @error('code')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror

        </div>
        <div class="border-t border-gray-300  "></div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
</div>