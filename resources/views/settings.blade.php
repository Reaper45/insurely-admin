@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Settings
    </x-slot>
</x-header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Settings -->
      <div class="flex">
        <div class="w-1/5  h-12">
          <div class=" bg-white border-r" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class=" px-4 py-2 flex-1 font-medium text-base text-gray-700">Classes</div>
            {{-- <div class="border-t border-gray-200"></div> --}}
            <div class="py-1">
              <!-- classes list -->
              @foreach ($insuranceClasses as $item)
                <a href="{{route('settings.class', ['class_id' => $item->id])}}" class="block px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">{{ $item->name }}</a>   
              @endforeach
            </div>
            <div class="border-t border-gray-200"></div>
            <div class="py-1">
              <!-- classes list -->
              <a href="{{route('settings.charges')}}" class="block px-4 py-3 font-medium text-base leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Charges</a>   
            </div>
          </div>
        </div>
        <div class="w-4/5 h-12">
          @yield('settings_section')
        </div>
      </div>
    </div>
</main>
<script>
  var navItem = document.getElementById("nav-item-settings");
  navItem.classList.add("active")
</script>
@endsection