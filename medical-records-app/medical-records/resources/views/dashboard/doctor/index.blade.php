@extends('dashboard.layouts.main')
@section('container')

<div class="md:px-16 mt-10">
  <section class="text-center md:text-left bg-white rounded-lg mx-auto pt-6 pb-4">
    <span class="font-semibold md:ml-20 inline-block text-4xl">Add Doctor</span>

    @include('dashboard.partials.alert')

    <form action="/doctor" method="post" class="w-full sm:w-11/12 mx-auto py-3 rounded-lg grid grid-cols-1 md:grid-cols-2">
      @csrf
      {{-- <input type="hidden" name="user_code" value="{{ Auth::user()->user_code }}"> --}}
      <div class="input-group my-2.5 mx-4">
          <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('doctor_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="doctor_name" placeholder="Doctor Name" id="doctor_name" value="{{ old('doctor_name') }}">
          @error('doctor_name')
            <label for="doctor_name" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      <div class="input-group my-2.5 mx-4 relative dropdown-drop">
        <button class="dropdown pl-4 w-full text-left flex justify-between items-center rounded border-b-2 h-11 bg-gray-50 @error('specialist') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" type="button">
          <input class="parent-value bg-transparent placeholder:text-black" name="specialist" style="pointer-events: none" value="" placeholder="-- Specialist --">
          <span data-feather="chevron-down" class="ml-auto w-4 inline-block text-black"></span>
        </button> 
        <div class="dropdown-item bg-white w-full max-h-[13rem] overflow-auto border border-black shadow-md absolute top-full left-0 hidden">
          <p class="child-value cursor-pointer px-4">-- Specialist --</p>
          @foreach ($specialists as $specialist)
            <p class="child-value cursor-pointer px-4 hover:bg-gray-200">{{ $specialist->specialist }}</p>
          @endforeach
          <p class="child-value dropdown-special cursor-pointer rounded hover:bg-gray-200 px-4">Add new - <input type="text" class="dropdown-input px-3 my-0.5 rounded border-b-2 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500"></p>
        </div>
        @error('specialist')
          <label for="specialist" class="text-red-500 text-left text-sm ml-3">
              <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
              {{ $message }}
          </label>
        @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
          <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('doctor_number') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="doctor_number" placeholder="Phone Number" id="doctor_number" value="{{ old('doctor_number') }}" min="0">
          @error('doctor_number')
            <label for="doctor_number" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
        <select name="poly_code" id="poly_code" class=" px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
          @foreach ($polies as $poly)
          <option value="{{ $poly->poly_code }}">{{ $poly->poly_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="input-group my-2.5 mx-4">
        <textarea type="text" class="px-4 py-2 h-16  w-full rounded border-b-2 bg-gray-50 @error('doctor_address') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="doctor_address" placeholder="Address" id="doctor_address">{{ old('doctor_address') }}</textarea>
        @error('doctor_address')
        <label for="doctor_address" class="text-red-500 text-left text-sm ml-3">
          <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
          {{ $message }}
        </label>
        @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
        <input type="number" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('fee') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="fee" placeholder="Fee" id="fee" value="{{ old('fee') }}" min="0">
        @error('fee')
          <label for="fee" class="text-red-500 text-left text-sm ml-3">
              <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
              {{ $message }}
          </label>
        @enderror
      </div>

      <input type="submit" value="Submit" class="md:col-span-2 border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
    </form>
  </section>

  <section class="mt-10 bg-white rounded-lg overflow-auto text-left" id="patient">
    @include('dashboard.partials.doctor.doctor')
  </section>

</div>
@endsection