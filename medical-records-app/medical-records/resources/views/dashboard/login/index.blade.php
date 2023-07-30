@extends('dashboard.layouts.main')
@section('login')
   <div class="z-50 fixed top-0 left-0 w-screen h-screen bg-slate-200 flex justify-center items-center">
      <div class="md:w-2/5 lg:w-2/5 xl:w-2/5 2xl:w-1/4 w-3/4 pt-4 pb-8 bg-white rounded-lg flex">
         <form action="/login/atempt" method="post" class="text-center relative h-full w-full">
            @csrf
            <h3 class="text-5xl mt-3 mb-5 font-semibold">Login</h3>
            @if(session('gagal'))
               <span data-feather="alert-circle" class="text-center inline w-5 pb-0.5 text-red-500"></span>
               <span class="text-red-500 mb-2 mt-2">Username or Password error</span>
            @endif
            <div class="input-group mb-4 mt-3 w-9/12 mx-auto">
               <input type="text" class="pl-4 w-full border-b-2 h-12 bg-gray-50 @error('username') border-red-500 @enderror focus:bg-gray-200 hover:bg-gray-200 duration-200 focus:rounded outline-none" name="username" placeholder="Username" id="username" value="{{ old('username') }}{{ session('gagal') }}">
               @error('username')
                  <label for="username" class="text-red-500 mb-2 text-left block text-sm">
                     <span data-feather="alert-circle" class="text-center inline w-5"></span>
                     {{ $message }}
                  </label>
               @enderror
            </div>
            <div class="input-group mb-2 w-9/12 mx-auto">
               <input type="password" class="pl-4 w-full border-b-2 h-12 bg-gray-50 @error('password') border-red-500 @enderror focus:bg-gray-200 hover:bg-gray-200 duration-200 focus:rounded outline-none" name="password" placeholder="Password" id="password">
               @error('password')
                  <label for="password" class="text-red-500 mb-2 text-left block text-sm">
                     <span data-feather="alert-circle" class="text-center inline w-5"></span>
                     {{ $message }}
                  </label>
               @enderror
            </div>
            <br>
            <input type="submit" value="Submit" class="w-2/5 mt-2 font-semibold uppercase h-10 rounded hover:shadow-md duration-300 hover:bg-blue-500 bg-blue-400">
         </form>
      </div>
   </div>
@endsection