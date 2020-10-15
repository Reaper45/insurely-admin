@extends('settings')

@section('settings_section')
  <div class="p-2">
    <div class="flex items-center justify-between">
      <div class="mb-2 px-2 text-gray-700 text-md font-medium">
         Motor Private
      </div>
      <!-- -->
      <div  @click.away="open = false" x-data="{ open: false }"  class="relative" >

        <button  @click="open = !open" type="button" class="inline-flex items-center px-2 py-1 mt-3 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
            + Add Class
        </button>
        <div  x-show="open" class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">

            <!--
                Background overlay, show/hide based on modal state.

                Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div x-show="open" class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!--
                Modal panel, show/hide based on modal state.

                Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div x-show="open" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <x-insurance-class-form  />
            </div>
        </div>
      </div>
    </div>
    <div class="mb-2 px-2 text-gray-500 text-sm font-medium">
      Classes
    </div>
  </div>

  <div class="">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class=" overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($motorPrivate->children as $child)
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">{{ $child->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                      <div class="text-sm leading-5 text-gray-900">{{ $child->value }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                      <form action="{{ route("settings.classes.delete", ["id" => $child->id, "_method" => "DELETE"]) }}" method="post">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>

                @endforeach
                
                <!-- More rows... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- -->

  <div class="mt-12 p-2">
    <div class="flex items-center justify-between">

      <div class="px-2 text-gray-500 text-sm font-medium">
        Categories
      </div>
      <div  @click.away="open = false" x-data="{ open: false }"  class="relative mb-4   " >

    <button  @click="open = !open" type="button" class="inline-flex items-center px-2 py-1 mt-3 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
        + Add Category
    </button>
    <div  x-show="open" class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">

        <!--
            Background overlay, show/hide based on modal state.

            Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
            Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div x-show="open" class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!--
            Modal panel, show/hide based on modal state.

            Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div x-show="open" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <x-category-form :insuranceClasses="$insuranceClasses" />
        </div>
    </div>
  </div>
    </div>
    <!-- -->
  </div>

  <div class="p-2">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class=" overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($motorPrivate->categories as $category)
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">{{ $category->name }}</div>
                      <div class="text-sm leading-5 text-gray-500">{{ $category->code }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                      <form action="{{ route("settings.classes.categories.delete", ["id" => $category->id, "_method" => "DELETE"]) }}" method="post">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>

                @endforeach
                
                <!-- More rows... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection