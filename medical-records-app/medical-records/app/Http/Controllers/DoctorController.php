<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poly;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $doctors = Doctor::latest('doctor_code');
    // dd($doctors->select('specialist')->distinct()->get());

    // dd($doctors->paginate($perPage = 4, $column = ['*'], $pageName = 'doctor_page'), $doctors->select('specialist')->distinct()->get());
    // session()->put(['info' => 'benar']);


    return view('dashboard.doctor.index', [
      'specialists' => Doctor::latest('doctor_code')->select('specialist')->distinct()->get() ,
      'doctors' => Doctor::latest('doctor_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'doctor_page'),
      'polies' => Poly::get(),
      'route' => 'doctor',
      'page' => 15
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



    $credentials = $request->validate([
      'doctor_name' => 'required|min:3',
      'specialist' => 'required',
      'doctor_number' => 'required|min:5',
      'doctor_address' => 'required|min:3',
      'fee' => 'required',
    ]);
    $credentials['poly_code'] = $request->poly_code;
    if (Doctor::create($credentials)) {
      return back()->with('success', 'Input success');
    }
    return back()->with('error', 'Input failed');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
  public function show(Doctor $doctor)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
  public function edit(Doctor $doctor)
  {
    return view('dashboard.doctor.edit', [
      'doctor' => $doctor,
      'polies' => Poly::get()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Doctor $doctor)
  {
    if ($request->route === 'poly') {
      $update = $doctor->update([
        'poly_code' => null
      ]);
      if ($update) {
        return true;
      }
    }
    if ($request->route == 'index') {
      $update = $doctor->update([
        'doctor_name' => $request->doctor_name_index,
        'doctor_number' => $request->doctor_number_index,
        'specialist' => $request->specialist_index,
        'poly_code' => $request->poly_code_index,
        'fee' => $request->fee_index,
        'doctor_address' => $request->doctor_address_index,
      ]);
      if ($update) {
        return back();
      }
    }

    $credentials = $request->validate([
      'doctor_name' => 'required',
      'doctor_number' => 'required',
      'specialist' => 'required',
      'fee' => 'required',
      'doctor_address' => 'required',
    ]);

    $credentials['poly_code'] = $request->poly_code;

    if ($doctor->update($credentials)) {
      return redirect('/doctor')->with('success', 'Updated');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
  public function destroy(Doctor $doctor)
  {
    if($doctor->delete()) {
      return back()->with('success', 'Delete complete');
    }
  }

  public function fetch_data(Request $request)
  {
    if ($request->ajax()) {
      // $doctors = ;
      return view('dashboard.partials.doctor.doctorTable', [
        'specialists' => Doctor::latest('doctor_code')->select('specialist')->distinct()->get() ,
        'doctors' => Doctor::latest('doctor_code')->filter(request(['doctor_keyword', 'specialist', 'doctor_poly']))->paginate($perPage = request('doctor_perPage'), $column = ['*'], $pageName = 'doctor_page'),
        'polies' => Poly::get(),
        'route' => $request->doctor_route
      ]);
    }
  }
  public function table_update(Request $request){
    if ($request->ajax()) {
      $doctor = Doctor::where('doctor_code', $request->id);
      $value = $doctor->update([
        $request->column_name => $request->column_value 
      ]);

      if($value) {
        echo '<script>alert("Updated")</script>';
      }
    }
  }
}
