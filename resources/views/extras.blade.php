@extends('settings')

@section('settings_section')
    <div class="p-2">
      <div class="mb-2 px-2 text-gray-700 text-md font-medium">
        Extras
      </div>
      <div class="mb-2 px-2 text-gray-500 text-sm font-medium">
        Manage extras categories
      </div>
    </div>
    <!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
  <div class="p-2">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class=" overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($extrasCategories->categories as $category)
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">{{ $category->name }}</div>
                      <div class="text-sm leading-5 text-gray-500">{{ $category->description }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                      <div class="text-sm leading-5 text-gray-900">{{ $category->code }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                      <form action="{{ route("categories.delete", ["id" => $category->id, "_method" => "DELETE"]) }}" method="post">
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