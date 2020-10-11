@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Edit Product
    </x-slot>
</x-header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- <form action="{{route('products.update')}}" method="PUT"> --}}
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
                        <table class="min-w-full">
                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4  pl-0 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img
                                                    class="h-10 w-10 rounded border-gray-400 focus:border-blue-500"
                                                    src="{{ route('insurers.avatar', ["id" => $product->insurer->id]) }}"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $product->name }}</div>
                                                <div class="text-sm leading-5 text-gray-500">Price: {{ $product->tariffs->first()->is_percentage ? "" : "Ksh." }}{{ $product->tariffs->first()->value }} {{ $product->tariffs->first()->is_percentage ? "%" : "" }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $product->category->name}}</div>
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ $product->insuranceClass->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                        <div class="text-sm leading-5 text-gray-900">{{$product->insurer->name}}</div>
                                        @if ($product->insuranceClass->parent)
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{$product->insuranceClass->parent->name}}
                                        </div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        <form action="{{ route("products.delete", ["id" => $product->id, "_method" => "DELETE"]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center px-2 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mb-4 border-t border-gray-300"></div>

            <div class="flex mb-4">
                <div class="w-1/3">
                    <div class="text-gray-700 text-sm font-medium">
                        Benefits
                    </div>
                    <div class="text-gray-500 text-xs">
                        Information about the benefits
                    </div>

                    <!-- New Benefits modal -->
                    <div  @click.away="open = false" x-data="{ open: false }"  class="relative" >

                        <button  @click="open = !open" type="button" class="inline-flex items-center px-2 py-1 mt-3 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            + Add benefit
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
                            <div  x-show="open" class="bg-white rounded-lg overflow-auto shadow-xl transform transition-all " role="dialog" aria-modal="true" aria-labelledby="modal-headline" style="max-height: calc(100% - 100px)">
                                <form class="w-full max-w-lg" method="post" action="{{route('products.update', ["id" => $product->id, "_method" => "PUT"])}}">
                                    @csrf
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <fieldset>
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            Title
                                                        </th>
                                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                            Price
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($allBenefits as $benefit)
                                                    <tr>
                                                        <td class="px-4 py-2">
                                                            <input name="benefits[]" class="mr-2 leading-tight" value="{{$benefit->id}}" type="checkbox">
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <div class="text-sm leading-5 text-gray-900">{{ $benefit->name }}</div>
                                                            <div class="text-sm leading-5 text-gray-500">{{ $benefit->limit }}</div>
                                                        </td>
                                                        @if ($benefit->is_optional)
                                                            <td class="px-4 py-3 whitespace-no-wrap">
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Optional
                                                                </span>
                                                            </td>
                                                            @else
                                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                In built
                                                                </span>
                                                            </td>
                                                        @endif
                                                        <td class="px-6 whitespace-no-wrap">
                                                            @if ($benefit->tariffs->first())
                                                                <div class="text-xs leading-5 text-gray-500">
                                                                    {{ $benefit->tariffs->first()->is_percentage ? "" : "Ksh. " }}
                                                                    {{ $benefit->tariffs->first()->value }}
                                                                    {{ $benefit->tariffs->first()->is_percentage ? "%" : "" }}
                                                                </div>
                                                            @endif
                                                            
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </fieldset>
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
                        </div>
                    </div>

                </div>
                <div class="w-2/3">
                    <div class=" overflow-hidden border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Optional
                                    </th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($product->benefits as $benefit)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ $benefit->name }}</div>
                                        <div class="text-sm leading-5 text-gray-500">{{ $benefit->limit }}</div>
                                    </td>
                                    @if ($benefit->is_optional)
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Optional
                                            </span>
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            In built
                                            </span>
                                        </td>
                                    @endif
                                    <td class="px-6">
                                        @if ($benefit->tariffs->first())
                                            <div class="text-xs leading-5 text-gray-500">
                                                {{ $benefit->tariffs->first()->is_percentage ? "" : "Ksh. " }}
                                                {{ $benefit->tariffs->first()->value }}
                                                {{ $benefit->tariffs->first()->is_percentage ? "%" : "" }}
                                            </div>
                                        @endif
                                        
                                    </td>
                                </tr>

                                @endforeach
                                
                                <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="mb-4 border-t border-gray-300"></div> --}}
            {{-- <button type="submit" class="float-right inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Save
            </button> --}}
            <div class="mb-4 border-t border-gray-300 hidden "></div>
        {{-- </form> --}}
    </div>
</main>
<script>
  var navItem = document.getElementById("nav-item-products");
  navItem.classList.add("active")
</script>

@endsection
