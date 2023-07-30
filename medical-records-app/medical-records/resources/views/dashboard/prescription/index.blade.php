@extends('dashboard.layouts.main')
@section('container')

  <div class="pt-7 md:px-12 py-8">
    {{-- main --}}
    <section class="bg-white rounded-lg mx-auto overflow-auto mb-5 py-4 px-7">
      @include('dashboard.partials.prescription.prescriptionCreate')
    </section>

    <section class="bg-white rounded-lg mx-auto overflow-auto py-5" id="prescription">
      <span class="font-semibold md:ml-16 inline-block text-4xl">Prescriptions</span>
      @include('dashboard.partials.prescription.prescriptionTable')
    </section>
    {{-- end main --}}
  </div>
@endsection
