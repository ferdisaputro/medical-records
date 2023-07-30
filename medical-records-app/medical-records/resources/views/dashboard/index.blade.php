@extends('dashboard.layouts.main')
@section('container')

<div class="mt-24 px-0 md:px-7">
  {{-- searchbar --}}
  <header class="fixed top-4 left-0 mx-14 lg:left-52 right-0 h-10 z-20 bg-white shadow-black/20 shadow-md rounded-full flex">
    {{-- <form action="" method="get" class="h-full flex-grow relative">
      <input class="bg-white rounded-l-full w-full px-5 h-full outline-none md:top-0 md:block" type="text" placeholder="Search" aria-label="Search">
      <div class="absolute top-0 right-0 h-full w-16 flex justify-end items-center">
        <span class="w-5 text-gray-600 ml-1" data-feather="bell"></span>
        <button type="submit">
          <span class="w-5 text-gray-600 ml-1" data-feather="search"></span>
        </button>
      </div>
    </form> --}}
    <div class="dropdown-drop relative text-sm h-full mx-auto duration-200 flex justify-center items-center text-gray-500 bg-white">
      @auth
        <button class="dropdown h-5 mx-2 pr-1" type="button">
          <span style="pointer-events: none">Welcome {{ Str::of(Auth::user()->username)->limit(15) }} <span data-feather="chevron-down" class="ml-0.5 w-4 inline"></span></span>
        </button> 
        <div class="dropdown-item bg-white rounded text-left w-44 absolute top-9 left-1/2 -translate-x-1/2 p-2 duration-200 shadow-lg shadow-current  hidden">
          <span class="inline sm:hidden text-xs pl-3 my-2 max-w-full">Welcome {{ Str::of(Auth::user()->username)->limit(15) }}</span>
          <a class="pl-3 inline-block my-2" href="/user">Detail</a>
          <hr class="w-10/12 mx-auto">
          <form action="/logout" class="w-full my-2 pl-3 h-full rounded-r-full" method="post">
              @csrf
              <input type="submit" value="Logout">
          </form>
        </div>
      @endauth
    </div>
  </header>
  {{-- end searchbar --}}

  {{-- cards --}}
  <section>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 md:px-2">
      <div class="px-3 py-1 h-20 rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-green-200 via-blue-400 to-purple-400">
        <span class="inline-block w-full">Today's visitors</span>
        <span class="text-5xl -mt-0.5 inline-block font-semibold ml-1">{{ $pasien_count }}</span>
        <a href="/patient#queue" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-purple-200 via-blue-400 to-cyan-400">
        <span>Number of polies</span>
        <span class="text-5xl font-semibold ml-1">{{ $polies->total() }}</span>
        <a href="/poly" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-rose-300 via-fuchsia-400 to-indigo-300">
        <span>Medical Personel</span>
        <span class="text-5xl font-semibold ml-1">{{ $doctors->total() }}</span>
        <a href="/doctor" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-pink-300 via-purple-300 to-indigo-400">
        <span>Healthcare</span>
        <span class="text-5xl font-semibold ml-1">{{ $users->count() }}</span>
        <a href="/user" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-yellow-200 via-fuchsia-300 to-blue-400">
        <span>Medicine</span>
        <span class="text-5xl font-semibold ml-1">{{ $medicines->total() }}</span>
        <a href="/medicine" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
      <div class="px-3 py-1 h-20 flex flex-col justify-between rounded-lg relative bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-zinc-400 via-fuchsia-300 to-amber-300">
        <span>Today Income</span>
        <div class="flex items-baseline">
          <span class="lg:hidden xl:inline">Rp.</span><span class="text-5xl md:text-4xl lg:text-5xl xl:text-[2.75rem] w-11/12 font-semibold ml-1" title="{{ number_format($payments, 0, '.', ',') }}">{{ number_format($payments, 0, '.', ',') }}</span>
        </div>
        <a href="/record" class="hover:bg-blue-600 absolute top-0 right-0 rounded-r-lg duration-200 w-9 h-full"><span data-feather="chevron-right" class="w-7 duration-200 h-full hover:w-8 mx-auto"></span></a>
      </div>
    </div>
  </section>

  <section class="mt-12 md:mx-9 rounded-lg overflow-x-auto bg-blue-300">
    @include('dashboard.partials.patient.patient')
  </section>
  
  <section class="mt-12 md:mx-9 rounded-lg overflow-x-auto">
    @include('dashboard.partials.medicine.medicine')
  </section>
  
  <section class="mt-12 md:mx-9 rounded-lg overflow-x-auto">
    @include('dashboard.partials.doctor.doctor')
  </section>
  
  <section class="mt-12 md:mx-9 rounded-lg overflow-x-auto">
    @include('dashboard.partials.poly.poly')
  </section>

  
  {{-- @include('dashboard.partials.homeTables.registration') --}}
  {{-- @include('dashboard.partials.homeTables.patient') --}}
  {{-- <section class="mt-12 overflow-x-auto" id="doctor">
    @include('dashboard.partials.homeTables.doctor')
  </section> --}}

  {{-- <section class="mt-12 overflow-x-auto" id="poly">
    @include('dashboard.partials.homeTables.poly')
  </section> --}}
    {{-- end cards --}}
  </div>
@endsection

@push('scripts')
  <script>
    // $(document).ready(function () {
    //   $(document).on('click', '.pagination a', function (event) {
    //     event.preventDefault();
    //     let request = $(this).attr('href').split('?')[1].split('=');
    //     fetch_data(request[0], request[1]);
    //   })
    //   function fetch_data(route, page) {
    //     $.ajax({
    //       url:"/fetch_data?"+route+"="+page+"&route="+route,
    //       success:function(data) {
    //         $('#'+route).html(data);
    //       }
    //     })
    //   }
    // })
  </script>
@endpush