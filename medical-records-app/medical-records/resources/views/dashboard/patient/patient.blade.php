@extends('dashboard.layouts.main')
@section('container')

  <div class="py-10 md:mx-12 sm:grid grid-cols-4 gap-5">
    <section class="mb-3 sm:mb-0 w-full col-span-2 rounded-lg bg-white">
      @include('dashboard.partials.patient.patientData')
    </section>

    <section class="mb-3 sm:mb-0 col-span-2 rounded-lg">
      <div class="w-full grid gap-5 h-full place-items-start">
        <div class="px-3 py-1 flex flex-col justify-between h-full rounded-lg w-full lg:w-96 relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-pink-300 via-purple-300 to-indigo-400">
          <span class="w-full text-lg">First registered</span>
          <span class="text-5xl font-semibold ml-1 truncate w-full" title="{{ date_format($patient->created_at, 'Y-M-d') }}">{{ date_format($patient->created_at, 'y-M-d') }}</span>
        </div>
        <div class="px-3 py-1 flex flex-col justify-between h-full rounded-lg w-full lg:w-96 relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-rose-300 via-fuchsia-400 to-indigo-300">
          <span class="w-full text-lg">Has spent</span>
          <div class="flex items-baseline">
            <span>Rp.</span><span class="text-5xl truncate w-11/12 font-semibold ml-1">{{ number_format($patient->patientPayment->sum('cash') - $patient->patientPayment->sum('change'), 0, '.', ','); }}</span>
          </div>
        </div>
      </div>
    </section>

    <section class="mb-3 sm:mb-0 w-full col-span-4 rounded-lg grid sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-3"> 
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg w-full relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-purple-200 via-blue-400 to-cyan-400">
        <span class="w-full">Times visits</span>
        <span class="text-5xl font-semibold ml-1">{{ $patient->patientPrsc->count() }}</span>
      </div>
      <div class="px-3 py-1 flex flex-col justify-between h-20 rounded-lg w-full relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-green-200 via-blue-400 to-purple-400">
        <span class="w-full">Recent  visit</span>
        <span class="text-4xl lg:text-3xl xl:text-4xl pb-1 truncate font-semibold ml-1">{{ $patient->patientPayment->count()? $patient->patientPayment->first()->updated_at->diffForHumans() : 'No data yet' }}</span>
      </div>
      {{-- <div class="px-3 py-1 flex flex-col justify-between h-20 rounded-lg w-full relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-green-200 via-blue-400 to-purple-400">
        <span class="w-full">Last time visit</span>
        <span class="text-5xl lg:text-4xl xl:text-5xl font-semibold ml-1">{{ $patient->patientPayment->count() > 0? date_format($patient->patientPayment->first()->updated_at, 'y-M-d') : '0' }}</span>
      </div> --}}
    </section>

    <section class="mb-3 sm:mb-0 w-full col-span-4 rounded-lg bg-white p-4 overflow-auto">
      <span class="font-semibold md:ml-16 inline-block capitalize text-3xl">{{ $patient->patient_name }}'s prescriptions</span>
      @include('dashboard.partials.alert')
    @include('dashboard.partials.prescription.prescriptionTable')
    </section>
  </div>
@endsection
