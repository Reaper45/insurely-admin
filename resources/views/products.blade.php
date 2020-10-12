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
    @if (session('status'))
      <x-alert :message="session('status')" />
    @endif
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
        </div>
    </div>
</main>
<script>
  var navItem = document.getElementById("nav-item-products");
  navItem.classList.add("active")
</script>
@endsection
