<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index(Request $request)
   {
      return view('dashboard.login.index');
   }

   public function login (Request $request)
   {
      $credentials = $request->validate([
         'username' => 'required|min:3',
         'password' => 'required|min:5'
      ]);
      if ($request->remember == null) {
         $request->remember = 'false';
      }
      if(Auth::attempt($credentials, $request->remember)) {
         return redirect('/');
      }
      return redirect('/login')->with('gagal', $credentials['username']);
   }

   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/login');
   }
}
