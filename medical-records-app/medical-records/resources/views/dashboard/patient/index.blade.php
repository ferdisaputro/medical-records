@extends('dashboard.layouts.main')
@section('container')

  <div class="lg:px-16 mt-10">
    <section class="text-center md:text-left bg-white rounded-lg mx-auto pt-6 pb-4" id="registration">
      <span class="font-semibold md:ml-20 inline-block text-4xl">Registration</span>

      @include('dashboard.partials.alert')

      <form action="/patient" method="post" class="w-full sm:w-11/12 mx-auto py-3 rounded-lg grid grid-cols-1 md:grid-cols-2">
        @csrf
        <input type="hidden" name="user_code" value="{{ Auth::user()->user_code }}">
        <div class="input-group my-2.5 mx-4">
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_name" placeholder="Name" id="patient_name" value="{{ old('patient_name') }}">
            @error('patient_name')
              <label for="patient_name" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4">
            <select name="patient_gender" id="" class=" px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            @error('patient_gender')
              <label for="patient_gender" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <div class="input-group my-2.5 mx-4">
            <input type="number" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_age') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_age" placeholder="Age" id="patient_age" value="{{ old('patient_age') }}" min="0">
            @error('patient_age')
              <label for="patient_age" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        {{-- <div class="input-group my-2.5 mx-4">
          <select name="poly_code" id="poly_code" class="poly-selection px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
            @foreach ($polies as $poly)
            <option value="{{ $poly->poly_code }}">{{ $poly->poly_name }}</option>
            @endforeach
          </select>
        </div> --}}
        <div class="input-group my-2.5 mx-4">
          <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_number') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_number" placeholder="Phone Number" id="patient_number" value="{{ old('patient_number') }}">
          @error('patient_number')
            <label for="patient_number" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        {{-- <div class="input-group my-2.5 mx-4">
          <select name="doctor_code" id="doctor_code" class="doctor-selection px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
            @foreach ($doctors as $doctor)
            <option value="{{ $doctor->doctor_code }}">{{ $doctor->doctor_name }}</option>
            @endforeach
          </select>
        </div> --}}
        <div class="input-group my-2.5 mx-4">
            <textarea type="text" class="px-4 py-2 h-16  w-full rounded border-b-2 bg-gray-50 @error('patient_address') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="patient_address" placeholder="Address" id="patient_address">{{ old('patient_address') }}</textarea>
            @error('patient_address')
              <label for="patient_address" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
        </div>
        <input type="submit" value="Submit" class="md:col-span-2 border-2 border-blue-400 bg-gray-50 mx-4 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
      </form>
    </section>

    <section class="mt-10 rounded-lg overflow-auto" id="queue">
      @include('dashboard.partials.patient.patient')
    </section>

  </div>

@endsection

{{-- @push('scripts')
  <script>
    $(document).ready(function() {
      const polies_doctor = {!! $poly_doctor !!}
      append()

      $('.poly-selection').change(function (e) {
        append($(e.target).val())
      })
      
      function append(data_request) {
        $doctor_option = ""
        polies_doctor.forEach(poly => {
          if (data_request) {
            if (poly.poly_code == data_request) {
              poly.doctors.forEach(doctor => {
                $doctor_option += "<option value="+doctor.doctor_code+">"+doctor.doctor_name+"</option>"
              })
            }
          } else {
            poly.doctors.forEach(doctor => {
              $doctor_option += "<option value="+doctor.doctor_code+">"+doctor.doctor_name+"</option>"
            })
          }
        })
        $('.doctor-selection').html($doctor_option)
      }
    })
  </script>
@endpush --}}
  