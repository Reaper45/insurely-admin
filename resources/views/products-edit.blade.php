@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Edit Product
    </x-slot>
</x-header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <form action="{{route('products.update')}}" method="PUT">
            <div class="flex mb-4">
                <div class="w-1/3">
                    <div class="text-gray-700 text-sm font-medium">
                        Product
                    </div>
                    <div class="text-gray-500 text-xs">
                        Infoimation about the product
                    </div>
                </div>
                <div class="w-2/3">
                    <div>
                        <x-product-form />
                    </div>
                </div>
            </div>

            <div class="mb-4 border-t border-gray-300"></div>
            <div class="flex mb-4">
                <div class="w-1/3">
                    <div class="text-gray-700 text-sm font-medium">
                        Pricing
                    </div>
                    <div class="text-gray-500 text-xs">
                        Product pricing
                    </div>
                </div>
                <div class="w-2/3">
                    <x-price-form />
                </div>
            </div>
            <div class="mb-4 border-t border-gray-300"></div>
            <button type="submit" class="float-right inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Save
            </button>
        </form>
    </div>
</main>

@endsection
