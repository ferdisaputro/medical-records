@extends('dashboard.layouts.main')
@section('container')
<div class="md:px-16 mt-9">

  <section class="text-center md:text-left bg-white rounded-lg mx-auto pt-6 pb-4">
    <span class="font-semibold md:ml-20 inline-block text-4xl">Edit data</span>
      @include('dashboard.partials.alert')
    <form action="/patient/{{ $patient->patient_code }}" method="post" class="w-full sm:w-11/12 mx-auto py-3 rounded-lg grid grid-cols-1 md:grid-cols-2">
      @method('PUT')
      @csrf
      <input type="hidden" name="user_code" value="{{ Auth::user()->user_code }}">
      {{-- <input type="hidden" name="patient_code" value="{{ $patient->patient_code }}">
      <input type="hidden" name="registration_number" value="{{ $patient->patientRegistration->registration_number }}">
      <input type="hidden" name="prsc_number" value="{{ $patient->patientPrsc->prsc_number }}"> --}}
      <div class="input-group my-2.5 mx-4">
          <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_name" placeholder="Name" id="patient_name" value="{{ $patient->patient_name }}">
          @error('patient_name')
            <label for="patient_name" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
          <select name="patient_gender" id="" class=" px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            <option value="male" {{ ($patient->patient_gender == 'male')? 'selected' : '' }}>Male</option>
            <option value="female" {{ ($patient->patient_gender == 'female')? 'selected' : '' }}>Female</option>
          </select>
          @error('patient_gender')
            <label for="patient_gender" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
          <input type="number" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_age') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_age" placeholder="Age" id="patient_age" value="{{ $patient->patient_age }}" min="0">
          @error('patient_age')
            <label for="patient_age" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      {{-- <div class="input-group my-2.5 mx-4">
        <select name="doctor_code" id="doctor_code" class=" px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
          @foreach ($doctors as $doctor)
          <option value="{{ $doctor->doctor_code }}" {{ ($patient->patientRegistration->doctor_code == $doctor->doctor_code)? 'selected' : ''  }}>{{ $doctor->doctor_name }}</option>
          @endforeach
        </select>
      </div> --}}
      <div class="input-group my-2.5 mx-4">
        <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_number') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_number" placeholder="Phone Number" id="patient_number" value="{{ $patient->patient_number }}">
        @error('patient_number')
          <label for="patient_number" class="text-red-500 text-left text-sm ml-3">
              <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
              {{ $message }}
          </label>
        @enderror
      </div>
      <div class="input-group my-2.5 mx-4">
          <textarea type="text" class="px-4 py-2 h-16  w-full rounded border-b-2 bg-gray-50 @error('patient_address') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_address" placeholder="Address" id="patient_address">{{ $patient->patient_address }}</textarea>
          @error('patient_address')
            <label for="patient_address" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
      </div>
      <input type="submit" value="Update" class="md:col-span-2 border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400">
    </form>
    <form action="/patient/{{ $patient->patient_code }}" method="post" class="text-left w-full sm:w-11/12 mx-auto flex items-center">
      @method("DELETE")
      @csrf
      <div class="ml-4">
        <a href="/patient/{{ $patient->patient_code }}" class="border-2 border-blue-400 bg-gray-50 py-1.5 px-3 h-14 rounded text-gray-500 hover:bg-gray-200 ">Go to detail</a>
        <a href="/patient" class="border-2 border-blue-400 bg-gray-50 py-1.5 px-3 h-14 rounded text-gray-500 hover:bg-gray-200 ">Go to patient</a>
      </div>
      <input type="submit" value="DELETE" onclick="return confirm('Delete {{ $patient->patient_name }} from queue?')" class="border-2 ml-auto mr-4 block border-red-500 bg-gray-50 py-1.5 px-3 rounded text-gray-500 hover:bg-red-300 hover:text-white transition-colors focus:bg-red-500 focus:border-red-500 ">
    </form>
  </section>
  
</div>
@endsection