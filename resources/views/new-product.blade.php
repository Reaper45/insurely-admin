@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        New Product 
    </x-slot>
    <div class="relative" >

        <a href="{{ route("products.create") }}"  class="no-underline inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
            + Add product
        </a>
    </div>
</x-header>
<main>
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Product form -->
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <div x-data="{ open: false }"  class="relative" >
                  <form class="w-full " method="POST" action="{{route('products.store')}}" >
                      @csrf
                    <div class="bg-white p-1">
                      <div class="grid gap-4 grid-cols-2">
                        <div>
                          <x-product-form :insurers="$insurers" :categories="$categories" />
                        
                          <div class="mb-4 border-t border-gray-300"></div>
                          
                          <x-price-form />
                        </div>
                        <div class="ml-16">
                          <div class="text-sm leading-5 font-medium text-gray-700">Applicable benefits</div>
                          <div style="max-height: 400px; overflow: auto;">
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

                          <div class="mb-4 border-t border-gray-300"></div>
                      
                          <div class="text-sm leading-5 font-medium text-gray-700">Applicable Charges</div>
                          <div style="max-height: 350px; overflow: auto;">
                            <fieldset>
                              <table class="min-w-full divide-y divide-gray-200">
                                  <thead>
                                      <tr>
                                          <th colspan="2" class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                              Charge
                                          </th>
                                          <th class="px-6 py-3"></th>
                                      </tr>
                                  </thead>

                                  <tbody class="bg-white divide-y divide-gray-200">
                                      @foreach ($allCharges as $charge)
                                      <tr>
                                          <td class="px-4 py-2">
                                              <input name="charges[]" class="mr-2 leading-tight" value="{{$charge->id}}" type="checkbox">
                                          </td>
                                          <td class="px-4 py-3">
                                              <div class="text-sm leading-5 text-gray-900">{{ $charge->name }}</div>
                                              {{-- <div class="text-sm leading-5 text-gray-500">{{ $benefit->limit }}</div> --}}
                                          </td>
                                          <td class="px-6">
                                              <div class="text-xs leading-5 text-gray-500">
                                                  {{ $charge->is_percentage ? "" : "Ksh. " }}
                                                  {{ $charge->value }}
                                                  {{ $charge->is_percentage ? "%" : "" }}
                                              </div>
                                          </td>
                                      </tr>

                                      @endforeach
                                  </tbody>
                              </table>
                            </fieldset>
                          </div>
                        </div>
                        
                      </div>
                      <div class="sm:flex sm:flex-row-reverse justify-between	">
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
  </div>
</main>
<script>
  var navItem = document.getElementById("nav-item-products");
  navItem.classList.add("active")
</script>
@endsection
