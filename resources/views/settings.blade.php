@extends('layouts.app')

@section('content')
<x-header >
    <x-slot name="title">
        Settings
    </x-slot>
</x-header>
<main>
    @if (session('status'))
      <x-alert :message="session('status')" />
    @endif
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Settings -->
      <div class="flex">
        <div class="w-1/5  h-12">
          <div class=" bg-white border-r" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="{{route('settings')}}" class="block px-4 py-3 font-medium text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Motor Private</a>
            <div class="border-t border-gray-200"></div>
            <a href="{{route('settings.extras')}}" class="block px-4 py-3 font-medium text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Extras</a>
            <div class="border-t border-gray-200"></div>
            <a href="{{route('settings.charges')}}" class="block px-4 py-3 font-medium text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Charges</a>   
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