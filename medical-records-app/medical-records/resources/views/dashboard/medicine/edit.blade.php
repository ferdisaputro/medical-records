@extends('dashboard.layouts.main')
@section('container')
  <div class="mx-24 my-7">
    <section class="text-center md:text-left bg-white rounded-lg mx-auto mt-5 pt-6 pb-4">
      <span class="font-semibold md:ml-20 inline-block text-4xl">Edit Medicine</span>

      @include('dashboard.partials.alert')

      <form action="/medicine/{{ $medicine->medicine_code }}" method="post" class="w-full sm:w-11/12 mx-auto py-3 rounded-lg grid grid-cols-1 md:grid-cols-2">
        @csrf
        @method('put')
        <input type="hidden" name="user_code" value="{{ $medicine->medicine_code }}">
        <div class="input-group my-2.5 mx-4 relative">
          <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Name</span>
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('medicine_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="medicine_name" placeholder="Name" id="medicine_name" value="{{ $medicine->medicine_name }}">
            @error('medicine_name')
              <label for="medicine_name" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4 relative">
          <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Type</span>
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('medicine_type') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="medicine_type" placeholder="Type" id="medicine_type" value="{{ $medicine->medicine_type }}">
            @error('medicine_type')
              <label for="medicine_type" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4 relative">
          <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Category</span>
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('category') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="category" placeholder="Category" id="category" value="{{ $medicine->category }}">
            @error('category')
              <label for="category" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4 relative">
          <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Price</span>
            <input type="number" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('medicine_price') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="medicine_price" placeholder="Rp." id="medicine_price" value="{{ $medicine->medicine_price }}" min="0">
            @error('medicine_price')
              <label for="medicine_price" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4 relative">
          <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Stock</span>
            <input type="number" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('stock') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="stock" placeholder="Pcs" id="stock" value="{{ $medicine->stock }}" min="0">
            @error('stock')
              <label for="stock" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <input type="submit" value="Submit" class="md:col-span-2 border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
        <div class="mt-3">
          <a href="/medicine" type="submit" value="Submit" class="inline-block px-4  border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">Back</a>
        </div>
      </form>
    </section>
  </div>
@endsection