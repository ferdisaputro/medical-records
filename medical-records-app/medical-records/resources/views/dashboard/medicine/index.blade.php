@extends('dashboard.layouts.main')
@section('container')

  <div class="md:mx-24 my-7 bg-white rounded-lg">
    
    <section class="rounded-lg mx-auto mt-5 pt-6 pb-4">
      @include('dashboard.partials.alert')
      <span class="font-semibold md:ml-20 inline-block text-center md:text-left text-4xl">Add Medicine</span>
      <form action="/medicine" method="post" class="w-full sm:w-11/12 mx-auto py-3 rounded-lg grid grid-cols-1 md:grid-cols-2" id="createMedicine">
        @csrf
        {{-- <input type="hidden" name="user_code" value="{{ Auth::user()->user_code }}"> --}}
        <div class="input-group my-2.5 mx-4">
          {{-- <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Name</span> --}}
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('medicine_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="medicine_name" placeholder="Name" id="medicine_name" value="{{ old('medicine_name') }}">
            @error('medicine_name')
              <label for="medicine_name" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4">
          <select name="category" id="poly_code" class=" px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('category') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
            <option value="free medicine">Free medicine</option>
            <option value="limited free">Limited medicine</option>
            <option value="drugs">Drugs</option>
            <option value="herbs">Herbs</option>
          </select>
          @error('category')
            <label for="category" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="input-group my-2.5 mx-4">
          {{-- <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Price</span> --}}
            <input type="number"  name="medicine_price" placeholder="Price" id="medicine_price" value="{{ old('medicine_price') }}" min="0" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('medicine_price') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            @error('medicine_price')
              <label for="medicine_price" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 text-left dropdown-drop mx-4 relative">
          <button title="tablet/kaplet/kapsul/pil/sirup/salep/supositoria/krim/tetes" class="dropdown pl-4 w-full flex justify-between items-center rounded border-b-2 h-11 bg-gray-50 @error('medicine_type') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" type="button">
            <input class="parent-value bg-transparent placeholder:text-black" name="medicine_type" style="pointer-events: none" value="" placeholder="-- Medicine type --">
            <span data-feather="chevron-down" class="ml-auto w-4 inline-block text-black"></span>
          </button> 
          <div class="dropdown-item bg-white text-left w-full max-h-[13rem] overflow-auto border border-black shadow-md absolute top-full left-0 hidden">
            <p class="child-value cursor-pointer px-4">-- medicine_type --</p>
            @foreach ($medicine_types as $medicine_type)
              <p class="child-value cursor-pointer px-4 hover:bg-gray-200">{{ $medicine_type->medicine_type }}</p>
            @endforeach
            <p class="child-value dropdown-special hover:bg-gray-200 cursor-pointer rounded px-4">Add new - <input type="text" class="dropdown-input px-3 my-0.5 rounded border-b-2 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500"></p>
          </div>
          @error('medicine_type')
            <label for="medicine_type" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="input-group my-2.5 mx-4">
          {{-- <span class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Stock</span> --}}
            <input type="number" name="stock" placeholder="Stock" id="stock" value="{{ old('stock') }}" min="0" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('stock') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            @error('stock')
              <label for="stock" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <input type="submit" value="Submit" class="md:col-span-2 border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200" form="createMedicine">
      </form>
    </section>
    
    @include('dashboard.partials.medicine.medicine')    

  </div>

@endsection