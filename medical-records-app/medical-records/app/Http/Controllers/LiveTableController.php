<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveTableController extends Controller
{
  public function update(Request $request){
    if ($request->ajax()) {
      dd('true');
    }
  }
}
