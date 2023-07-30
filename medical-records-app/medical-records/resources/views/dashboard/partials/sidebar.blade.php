<div class="sidebar fixed -left-44 duration-300 top-0 w-44 lg:left-0 lg:w-52 h-screen z-30 bg-white shadow-2xl shadow-black/40 print:hidden">
  <div class="icon mt-4 px-3.5">
    <img src="/medical_record_icons/logo_name.png" alt="logo+name" class="h-10">
  </div>
  <div class="w-full">
    <nav>
      <div class="text-gray-500 text">
        <h6 class="text-lg px-3 mb-1 text-gray-600">
          <span>Dasboard menu</span>
        </h6>
        <ul class="">
          <li class="px-3 flex items-center h-9 {{ (Request::is('/'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/">
              <span data-feather="home" class="inline-block"></span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="px-3 overflow-hidden flex items-center h-9 {{ (Request::is('patient') || Request::is('patient/*'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2 dropdown" href="/patient">
              <span data-feather="users" class="inline-block"></span>
              <span>Patients</span>
            </a>
          </li>
          @if (Request::is('patient'))
            <ul class="text-gray-500">
              <a href="#registration"><li class="py-1.5 pl-8 bg-gray-100 hover:bg-white">Registration</li></a>
              <a href="#queue"><li class="py-1.5 pl-8 bg-gray-100 hover:bg-white">Queue</li></a>
            </ul>
          @endif
          {{-- <li clpx-3 ass="flex items-center h-9 {{ (Request::is('queue'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/queue">
              <span data-feather="users" class="inline-block"></span>
              <span>Queue</span>
            </a>
          </li> --}}
          <li class="px-3 flex items-center h-9 {{ (Request::is('prescription') || Request::is('prescription/*'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/prescription">
              <span data-feather="file-text" class="inline-block"></span>
              <span>Prescription</span>
            </a>
          </li>
          <li class="px-3 flex items-center h-9 {{ (Request::is('doctor'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/doctor">
              <span data-feather="user-plus" class="inline-block"></span>
              <span>Doctors</span>
            </a>
          </li>
          <li class="px-3 flex items-center h-9 {{ (Request::is('user') || Request::is('user/*'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/user">
              <span data-feather="user-check" class="inline-block"></span>
              <span>User management</span>
            </a>
          </li>
          <li class="px-3 flex items-center h-9 {{ (Request::is('record'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/record">
              <span data-feather="bar-chart-2" class="inline-block"></span>
              <span>Records</span>
            </a>
          </li>
          <li class="px-3 flex items-center h-9 {{ (Request::is('medicine'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/medicine">
              <span data-feather="plus-circle" class="inline-block"></span>
              <span>Medicines</span>
            </a>
          </li>
          <li class="px-3 flex items-center h-9 {{ (Request::is('poly'))? 'bg-gradient-to-r from-sky-400 to-sky-200 text-white' : '' }}">
            <a class="w-11/12 flex items-center gap-2" href="/poly">
              <span data-feather="layout" class="inline-block"></span>
              <span>Polies</span>
            </a>
          </li>
        </ul>

        {{-- <h6 class="text-lg px-3 mt-4 mb-1 text-gray-600">
          <span class="md:inline">Saved reports</span>
          <span data-feather="plus-circle" class="inline-block"></span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="pl-3">
            <a class="my-1.5 inline-block" href="#">
              <span data-feather="file-text" class="inline-block"></span>
              <span class="mb-3">Current month</span>
            </a>
          </li>
          <li class="pl-3">
            <a class="my-1.5 inline-block" href="#">
              <span data-feather="file-text" class="inline-block"></span>
              <span class="mb-3">Last quarter</span>
            </a>
          </li>
          <li class="pl-3">
            <a class="my-1.5 inline-block" href="#">
              <span data-feather="file-text" class="inline-block"></span>
              <span class="mb-3">Social engagement</span>
            </a>
          </li>
          <li class="pl-3">
            <a class="my-1.5 inline-block" href="#">
              <span data-feather="file-text" class="inline-block"></span>
              <span class="mb-3">Year-end sale</span>
            </a>
          </li>
        </ul> --}}
      </div>
    </nav>
    <button class="sidebar-btn w-6 h-12 inline-block rounded-r absolute top-32 md:top-16 right-0 translate-x-full lg:hidden" style="background-color: #93b4b4"><span data-feather="arrow-right" class="text-lg mx-auto duration-500"></span></button>
  </div>
</div>

{{-- @extends('dashboard.layouts.main')
@push('scripts')
    <script>
      asdfasdfas
    </script>
@endpush --}}