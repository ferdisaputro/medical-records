<?php

namespace App\Http\Controllers;

use App\Models\Poly;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PolyController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $page = 15;
    return view('dashboard.poly.index', [
      'polies' => Poly::with('polyDoctor')->get(),
      'specialists' => Doctor::latest('doctor_code')->select('specialist')->distinct()->get() ,
      'doctors' => Doctor::latest('doctor_code')->paginate($perPage = $page, $column = ['*'], $pageName = 'doctor_page'),
      'route' => 'poly',
      'page' => $page
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
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
    if (Poly::create(["poly_name" => $request->poly_name])) {
      $doctorValue = false;
      $poly = Poly::where('poly_name', $request->poly_name)->first();
      if ($request->doctor) {
        foreach ($request->doctor as $doctor) {
          $doctorValue = Doctor::where('doctor_code', $doctor['doctor_code'])->update(['poly_code' => $poly->poly_code]);
        }
      }
      if ($doctorValue) {
        return back()->with('success', "$request->poly_name are added");
      }
      return back()->with('error', "Error when input $request->poly_name. Reload the browser and try again");
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Poly  $poly
  * @return \Illuminate\Http\Response
  */
  public function show(Poly $poly)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Poly  $poly
  * @return \Illuminate\Http\Response
  */
  public function edit(Poly $poly)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Poly  $poly
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Poly $poly)
  {
    // dd($request->all());
    $poly->update([
      'poly_name' => $request->poly_name
    ]);

    if ($request->doctor) {
      $doctorValue = false;
      $doctorArray = [];
      $message = '';
      foreach ($request->doctor as $doctor) {
        if (isset($doctor['doctor_code_old'])) {
          if ($doctor['doctor_code_old'] !== $doctor['doctor_code']) {
            if (Doctor::where('doctor_code', $doctor['doctor_code_old'])->update(['poly_code' => null])) {
              $doctorValue = Doctor::where('doctor_code', $doctor['doctor_code'])->update(['poly_code' => $poly->poly_code]);
              $doctorArray[] = $doctor['doctor_name'];
            }
          }
        } else {
          $doctorValue = Doctor::where('doctor_code', $doctor['doctor_code'])->update(['poly_code' => $poly->poly_code]);
          $doctorArray[] = $doctor['doctor_name'];
        }
      }
      return back()->with('success', implode(' , ', $doctorArray)." are added into $poly->poly_name");
    }
    return back()->with('success', "Poly name is updated");

    // if ($request->doctor['update']) {
    //   $doctor = false;
    //   foreach ($request->doctor['update'] as $data) {
    //     $doctor = Doctor::where('doctor_code', $data['doctor_code'])->update(['doctor_code' => $data['doctor_name']]);
    //   };
    // }
    // if ($request->doctor['create']) {
    //   $doctor = false;
    //   foreach ($request->doctor['create'] as $data) {
    //     $doctor = Doctor::create([
    //       'doctor_code' => $data['doctor_code'],
    //       'doctor_name' => $data['doctor_name'],
    //     ]);
    //   }
    //   if ($doctor) {
    //     return back()->with('success', "{$data['doctor_name']} is added to $request->poly_name");
    //   }
    //   return back()->with('error', 'Input error. Refresh page and try again');
    // } 
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Poly  $poly
  * @return \Illuminate\Http\Response
  */
  public function destroy(Poly $poly, Request $request)
  {
    foreach ($poly->polyDoctor as $doctor) {
      $doctor->update(['poly_code' => null]);
    }
    if($poly->delete()){
      return back()->with('delete', 'Data has been deleted');
    }
  }
}
