@extends('dashboard.layouts.main')
@section('container')
<div class="py-10 md:mx-12 grid md:grid-cols-4 print:grid-cols-4 gap-x-5">

  <section class="w-full print:col-span-2 md:col-span-2 bg-white rounded-lg">
    @include('dashboard.partials.patient.patientData')
  </section>

  <section class="w-full print:col-span-2 md:col-span-2">
    <div class="wrapper bg-white rounded-lg mt-5 md:mt-0 print:mt-0 p-4">
      <span class="font-semibold text-xl">Detail</span>
      <ul>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Doctor</span>
          <span> : {{ $prsc->prscDoctor->doctor_name }}</span>
        </li>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Doctor number</span>
          <span> : {{ $prsc->prscDoctor->doctor_number }}</span>
        </li>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Prescription date</span>
          <span> : {{ date_format($prsc->updated_at, 'y-m-d') }}</span>
        </li>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Poly</span>
          <span> : {{ $prsc->prscPoly->poly_name }}</span>
        </li>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Person in charge</span>
          <span> : {{ $prsc->prscUser->username }}</span>
        </li>
        <li class="flex items-center text-left my-0.5">
          <span class="w-36">Symptom</span>
          <p>
            <span> : {{ $prsc->prscRegistration->description?? '-' }}</span>
          </p>
        </li>
      </ul>
    </div>
  </section>

  <section class="print:col-span-4 md:col-span-4">
    @include('dashboard.partials.alert')
  </section>

  <section class="w-full mt-5 print:col-span-4 md:col-span-4">
    @include('dashboard.partials.details.detailcopy')
  </section>
  
  <section class="w-full mt-5 print:col-span-4 md:col-span-4">
    @include('dashboard.partials.payments.payment')
  </section>
  </div>
@endsection