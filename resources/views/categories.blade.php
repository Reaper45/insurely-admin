@extends('settings')

@section('settings_section')
    <div class="p-2">
      <div class="mb-2 px-2 text-gray-700 text-md font-medium">
        {{ $insuranceClass->name }}
      </div>
      <div class="mb-2 px-2 text-gray-500 text-sm font-medium">
        Categories
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
              {{-- <thead>
                <tr>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                </tr>
              </thead> --}}
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($insuranceClass->parent->categories as $category)
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">{{ $category->name }}</div>
                      <div class="text-sm leading-5 text-gray-500">{{ $category->description }}</div>
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