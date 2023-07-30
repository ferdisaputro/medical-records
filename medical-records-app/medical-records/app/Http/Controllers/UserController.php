<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('dashboard.user.index', [
      'users' => User::latest('user_code')->paginate($perPage = 9, $column = ['*'], $pageName = 'user_code')
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // dd($request->all());
    $credentials = $request->validate([
      'username' => 'required|min:3',
      'password' => 'required|min:5|confirmed',
      'password_confirmation' => 'required|min:5'
    ]);
    if (User::create(['username' => $request->username, 'password' => Hash::make($request->password), 'user_status' => $request->user_status])) {
        return back()->with('success', "$request->username Are registered as user");
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    return view('dashboard.user.detail');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\User  $user
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    // dd($request->all());
    if($request->old_password || $request->new_password || $request->password_confirmation){
      $request->validate([
        'username' => 'required',
        'old_password' => 'required',
        'password' => 'min:6|required|confirmed',
        'password_confirmation' => 'min:6|required',
      ]);
      if (Hash::check($request->old_password, $user->password)) {
        User::where('user_code', $request->user_code)->update([
          'username' => $request->username,
          'password' => bcrypt($request->password),
        ]);
        return redirect('/user')->with('success', 'Data has been updated');
      } 
    } else {
      $credentials = $request->validate([
        'username' => 'required',
      ]);
      User::where('user_code', $request->user_code)->update($credentials);
      return redirect('/user')->with('success', 'Data has been updated');
    }

    return redirect('/user')->with('failed', "Update failed");
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    //
  }
}
