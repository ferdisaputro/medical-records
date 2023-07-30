{{-- @dd($user) --}}
@extends('dashboard.layouts.main')
@section('container')
  <div class="py-7 md:mx-16">
    <section class="bg-white rounded-lg px-12 py-6">
      <div class="wraper">
        <form method="POST" action="/user/{{ Auth::user()->user_code }}" class="w-full">
          @csrf
          @method('put')
          <span class="text-4xl font-semibold capitalize block text-center mb-4">{{ Auth::user()->username }}'s data</span>
          @include('dashboard.partials.alert')
          <div class="input-group mb-4">
            <span>User code</span>
            <input readonly="true" type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('user_code') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="user_code" placeholder="User Code" id="user_code" value="{{ Auth::user()->user_code }}">
            @error('user_code')
              <label for="user_code" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>Username</span>
            <input type="text" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('username') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="username" placeholder="Username" id="username" value="{{ Auth::user()->username }}">
            @error('username')
              <label for="username" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <hr>
          <h1 class="text-center">Update Password</h1>
          <div class="input-group mb-4">
            <span>Old Password</span>
            <input type="password" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('old_password') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="old_password" placeholder="********" id="old_password">
            @error('old_password')
              <label for="old_password" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>New Password</span>
            <input type="password" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('password') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="password" placeholder="********" id="password">
            @error('password')
              <label for="password" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>Password confirmation</span>
            <input type="password" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('password_confirmation') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="password_confirmation" placeholder="********" id="password_confirmation">
            @error('password_confirmation')
              <label for="password_confirmation" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <input type="submit" value="Update" class="w-full border-2 border-blue-400 bg-gray-50 py-1.5 rounded text-gray-500 hover:bg-gray-200 transition-colors focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200 block">
        </form>
      </div>
      {{ session('failed') }}
    </section>
  </div>
@endsection