@extends('settings')

@section('settings_section')
    <div class="p-2">
      <div class="mb-2 px-2 text-gray-700 text-md font-medium">
        {{ $category->name }}
      </div>
      <div class="mb-2 px-2 text-gray-500 text-sm font-medium">
        Categories
      </div>
    </div>
@endsection