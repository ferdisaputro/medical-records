@extends('dashboard.layouts.main')
@section('container')
<div class="pt-7 md:px-12 py-8">
  <section class="bg-white rounded-lg mx-auto overflow-auto mb-5 py-4 px-7">
    @include('dashboard.partials.prescription.prescriptionCreate')
  </section>
</div>
@endsection

{{-- @extends('dashboard.layouts.main')
@section('container')

<div class="pt-7 md:px-12 py-8">
  <section class="bg-white rounded-lg mx-auto overflow-auto mb-5 py-4 px-7">
    @if ($route == 'prescription')
    <div class="patient-container hidden overflow-hidden fixed top-0 right-0 left-0 lg:left-52 bottom-0 bg-black/40 z-50">
      <button class="patient-close text-2xl py-1.5 px-2.5 text-white rounded absolute top-10 right-6" type="button">X</button>
      <div class="patient-item w-10/12 h-5/6 overflow-y-auto bg-white rounded-lg overflow-auto absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        @include('dashboard.partials.patient.patient')
      </div>
    </div>
    @endif

    <h5 class="font-semibold text-center md:text-left indent-16 text-4xl">Add prescription</h5>
    <form action="/prescription" method="POST" class="grid md:grid-cols-4 mx-8">
      @csrf
      <input type="hidden" name="user_code" value="{{ Auth::user()->user_code }}">
      <div class="input-wrapper my-2.5 grid md:grid-cols-2 col-span-3 gap-3 border-r-2 border-r-gray-200 pr-5">
        <h4 class="col-span-2 text-center text-2xl">Patient's data</h4>
        <div class="input-group">
          <input type="text" name="patient_code" placeholder="Patient code" value="{{ $route == 'patient'? $patient->patient_code : $prescription->prscPatient->patient_code }}" readonly="{{ $route == 'patient'? "true" : 'false' }}" class="patient-select cursor-pointer after:relative after:content-['﹀'] px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('patient_code') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
          @error('patient_code')
            <label for="patient_code" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="input-group">
          <input type="text" name="patient_name" placeholder="Patient name" autocomplete="off" value="{{ $route == 'patient'? $patient->patient_name : '' }}" disabled class="cursor-default disabled:border-gray-400 disabled:opacity-75 px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('patient_name') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
          @error('patient_name')
            <label for="patient_name" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="div input-group">
          <input type="text" name="patient_age" placeholder="Age" autocomplete="off"  value="{{ $route == 'patient'? $patient->patient_age : '' }}" disabled class="cursor-default disabled:border-gray-400 disabled:opacity-75 px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('patient_age') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
          @error('patient_age')
            <label for="patient_age" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="input-group">
          <input type="text" name="patient_gender" placeholder="Gender" autocomplete="off"  value="{{ $route == 'patient'? $patient->patient_gender : '' }}" disabled class="cursor-default disabled:border-gray-400 disabled:opacity-75 px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
          @error('patient_gender')
          <label for="patient_gender" class="text-red-500 text-left text-sm ml-3">
            <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
            {{ $message }}
          </label>
          @enderror
        </div>
        <textarea type="text" name="description" placeholder="Symptom" autocomplete="off" class="col-span-2 px-4 py-1 w-full rounded border-b-2 h-13 bg-gray-50 @error('patient_gender') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500"></textarea>
      </div>
      <div class="my-2.5 flex flex-col gap-3 pl-5 col-span-3 md:col-span-1">
        <h4 class="col-span-2 text-center text-2xl">Health service</h4>
        <div class="input-group">
          <select name="poly_code" id="poly_code" class="poly-selection px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('poly_code') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
            @foreach ($polies as $poly)
            <option value="{{ $poly->poly_code }}">{{ $poly->poly_name }}</option>
            @endforeach
          </select>
          @error('poly_code')
            <label for="poly_code" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
        <div class="input-group">
          <select name="doctor_code" id="doctor_code" class="doctor-selection px-4 w-full rounded border-b-2 h-10 bg-gray-50 @error('doctor_code') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
          </select>
          @error('doctor_code')
            <label for="doctor_code" class="text-red-500 text-left text-sm ml-3">
                <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                {{ $message }}
            </label>
          @enderror
        </div>
      </div>
      <div class="col-span-3">
        <input type="submit" value="Submit" class="border-2 w-full border-blue-400 bg-gray-50 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
      </div>
    </form>
  </section>
</div>
@endsection

@once    
  @push('scripts')
    <script>
      $(document).ready(function() {   
        // patient script
        let $patientSelect   
        $(document).on('click', function (e) {
          const $e = $(e.target)
          if ($e.hasClass("patient-select")) {
            $patientSelect = $e
            $('.patient-container').fadeIn('fast')
          } else if ($e.hasClass("patient-container") || $(e.target).hasClass("patient-close")) {
            $('.patient-container').fadeOut('fast')
          }

          if ($e.hasClass('patient-select-patient')) {
            const $patientDataSelect = $(e.target).parent().parent()
            const patientName = $patientDataSelect.find('.patient-name').text()
            const patientCode = $patientDataSelect.find('.patient-code').text()
            const patientAge = $patientDataSelect.find('.patient-age').text()
            const patientGender = $patientDataSelect.find('.patient-gender').text()
            $patientSelect.val(patientCode)
            $patientSelect.parents('.input-wrapper').find('input[name="patient_name"]').val(patientName)
            $patientSelect.parents('.input-wrapper').find('input[name="patient_age"]').val(patientAge)
            $patientSelect.parents('.input-wrapper').find('input[name="patient_gender"]').val(patientGender)
            $('.patient-container').fadeOut('fast')
          }
        })
      })
    </script>
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
  @endpush
@endonce --}}