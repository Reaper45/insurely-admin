@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Products
    </x-slot>

    <div class="relative" >
        <a href="{{ route("products.create") }}"  class="no-underline inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
            + Add product
        </a>
    </div>
</x-header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Products table -->
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Product
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Catergory
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Insurer
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Status
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 "></th>
                        <th class="px-6 py-3 border-b border-gray-200 "></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($products as $product)
                            <x-product :product="$product"/>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            {{-- <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Previous
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm leading-5 text-gray-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">5</span>
                            of
                            <span class="font-medium">13</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class=" inline-flex shadow-sm">
                            <a href="#" class=" inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            </a>
                            <a href="#" class="-ml-px  inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            1
                            </a>
                            <a href="#" class="-ml-px  inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            2
                            </a>
                            <a href="#" class="hidden md:inline-flex -ml-px  items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            3
                            </a>
                            <a href="#" class="-ml-px  inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</main>
<script>
  var navItem = document.getElementById("nav-item-products");
  navItem.classList.add("active")
</script>
@endsection
