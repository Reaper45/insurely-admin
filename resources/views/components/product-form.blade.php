<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<div class="w-full mb-4">

    <!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<!--
  Custom select controls like this require a considerable amount of JS to implement from scratch. We're planning
  to build some low-level libraries to make this easier with popular frameworks like React, Vue, and even Alpine.js
  in the near future, but in the mean time we recommend these reference guides when building your implementation:

  https://www.w3.org/TR/wai-aria-practices/#Listbox
  https://www.w3.org/TR/wai-aria-practices/examples/listbox/listbox-collapsible.html
-->

    
    <div class="mb-4">
        <label for="name" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Product name</label>
        <input name="name" value="{{old('name')}}" class="w-full @error('name') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text">
        @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror

    </div>

        
    <div class="mb-4">
        <label for="description" class="block mb-2 text-sm leading-5 font-medium text-gray-700">Product description</label>
        <textarea placeholder="Short description" name="description" value="{{old('description')}}" class="w-full @error('description') border-red-500 @enderror bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" ></textarea>
        @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror

    </div>

    <div class="space-y-1 mb-4">
        <label id="listbox-label" class="block mb-2 text-sm leading-5 font-medium text-gray-700">
            Covered by
        </label>
        </button>

        <div  @click.away="open = false" x-data="{ open: false, id: null, name: null, img: null }" class="relative">
            <span class="inline-block w-full rounded-md shadow-sm">
                <button  @click="open = !open" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    <div class="flex items-center space-x-3">
                        <template x-if="img">
                            <img  x-bind:src="img" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                        </template>
                    <span class="block truncate" x-text="name || 'Select insurer'">
                    </span>
                    </div>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </span>
                </button>
            </span>

            <!-- Select popover, show/hide based on select state. -->
            <div  x-show="open" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10">
                <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                    @foreach ($insurers as $insurer)
                        <li @click="open = false, id = {{$insurer->id}}, name = '{{$insurer->name}}', img = '{{route('insurers.avatar', ["id" => $insurer->id]) }}'"  id="listbox-item-0" role="option" class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white ">
                            <div class="flex items-center space-x-3">
                                <img src="{{ route('insurers.avatar', ["id" => $insurer->id]) }}" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="font-normal block truncate">
                                    {{$insurer->name}}
                                </span>
                            </div>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4" :class="{ 'hidden': id !== {{$insurer->id}} }">
                                <!-- Heroicon name: check -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <input type="hidden" name="insurer_id" x-bind:value="id" />
             @error('insurer_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>        
            @enderror
        </div>
    </div>

    <div class="space-y-1 mb-6">
        <label id="listbox-label" class="mb-2 block text-sm leading-5 font-medium text-gray-700">
            Category
        </label>
        </button>

        <div  @click.away="open = false" x-data="{ open: false, id: null, name: null }" class="relative">
            <span class="inline-block w-full rounded-md shadow-sm">
                <button  @click="open = !open" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    <div class="flex items-center space-x-3">
                        {{-- <template x-if="img">
                            <img  x-bind:src="img" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                        </template> --}}
                    <span class="block truncate" x-text="name || 'Select product Catogory'">
                    </span>
                    </div>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </span>
                </button>
            </span>

            <!-- Select popover, show/hide based on select state. -->
            <div  x-show="open" class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                    @foreach ($categories as $category)
                        <li @click="open = false, id = {{$category->id}}, name = '{{$category->name}}'"  id="listbox-item-0" role="option" class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white ">
                            <div class="flex items-center space-x-3">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="font-normal block truncate">
                                    {{$category->name}}
                                </span>
                            </div>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4" :class="{ 'hidden': id !== {{$category->id}} }">
                                <!-- Heroicon name: check -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <input type="hidden" name="category_id" x-bind:value="id" />
             @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>        
            @enderror
        </div>
    </div>


    <div class="mb-6">
        <div class="md:w-1/3"></div>
        <label class="md:w-2/3 block text-gray-500 font-medium">
            <input name="has_ipf" class="mr-2 leading-tight" type="checkbox">
            <span class="text-sm">
                Allow premium financing
            </span>
        </label>
        @error('has_ipf')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>        
        @enderror
    </div>
    
</div>
