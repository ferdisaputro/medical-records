{{-- @dd($user) --}}
@extends('dashboard.layouts.main')
@section('container')
  <div class=" md:mx-16">
    <section class="bg-white rounded-lg mt-6 px-12 py-6 flex">
      <a href="/user/{{ Auth::user()->user_code }}" class="w-full flex items-center justify-center mr-5 border-2 border-blue-400 bg-gray-50 h-10 rounded text-gray-500 hover:bg-gray-200 transition-colors focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200 capitalize">{{ Auth::user()->username }}'s detail</a>
      <form action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout" class="border-2 border-red-500 bg-gray-50 px-4 h-10 rounded text-gray-500 hover:bg-gray-200 transition-colors focus:bg-gray-200 focus:border-red-500 visited:bg-gray-200 block">
      </form>
    </section>
    <section class="bg-white rounded-lg mt-6 px-12 py-6 grid md:grid-cols-2 gap-12">
      <div>
        <span class="text-3xl font-semibold block text-center mb-4">Add new user</span>
        @include('dashboard.partials.alert')
        <form action="/user" method="POST" class="w-full ">
          @csrf
          <div class="input-group mb-4">
            <span>Username</span>
            <input type="text" name="username" placeholder="Mr." id="username" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('username') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            @error('username')
              <label for="username" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>Username</span>
            <select type="text" name="user_status" placeholder="Mr." id="user_status" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('user_status') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
              <option value="pegawai tetap">Pegawai Tetap</option>
              <option value="magang">Magang</option>
            </select>
            @error('user_status')
              <label for="user_status" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>Password</span>
            <input type="password" name="password" placeholder="********" id="password" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('password') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            @error('password')
              <label for="password" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <div class="input-group mb-4">
            <span>Password confirmation</span>
            <input type="password" name="password_confirmation" placeholder="********" id="password_confirmation" class="px-4 w-full rounded border-b-2 h-11 bg-gray-50 @error('password_confirmation') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
            @error('password_confirmation')
              <label for="password_confirmation" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </div>
          <input type="submit" value="Add new user" class="w-full border-2 border-blue-400 bg-gray-50 py-1.5 rounded text-gray-500 hover:bg-gray-200 transition-colors focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200 block">
        </form>
      </div>

      <div>
        <span class="text-3xl font-semibold block text-center mb-4">User list</span>
        <table class="table-auto w-full md:w-11/12 mx-auto text-left mb-2">
          <thead>
            <tr class="border-b border-blue-400">
              <th class="px-3 py-1">User code</th>
              <th class="px-3 py-1">Username</th>
              <th class="px-3 py-1">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr class="border-b border-blue-400 hover:bg-gray-100">
                  <td class="px-3 py-1">{{ $user->user_code }}</td>
                  <td class="px-3 py-1">{{ $user->username }}</td>
                  <td class="px-3 py-1">{{ $user->user_status }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
    </section>

  </div>
@endsection