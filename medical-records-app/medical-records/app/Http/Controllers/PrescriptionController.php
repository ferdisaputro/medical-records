<?php

namespace App\Http\Controllers;

use App\Models\Poly;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    // $medicines = Medicine::latest();
    // $medicinesData = [];
    // foreach ($medicines->get() as $medicine) {
    //   $medicinesData[] = ['medicine_code' => $medicine->medicine_code, 'medicine_price' => $medicine->medicine_price];
    // }
    $polies_doctors = [];
    foreach (Poly::latest('poly_code')->get()->load('polyDoctor') as $poly) {
      $doctors = [];
      foreach ($poly->polyDoctor as $doctor) {
        $doctors[] = ['doctor_code' => $doctor->doctor_code, 'doctor_name' => $doctor->doctor_name];
      }
      $polies_doctors[] = ["poly_code" => $poly->poly_code, "poly_name" => $poly->poly_name, 'doctors' => $doctors];
    }
    return view('dashboard.prescription.index', [
        'prscs' => Prescription::latest('prsc_number')->with('prscDoctor', 'prscPoly', 'prscDetail', 'prscUser', 'prscPatient')->paginate($perPage = 20, $column = ['*'], $pageName = 'prescription'),
        'doctors' => Doctor::latest('doctor_code')->get()->load('doctorPoly'),
        'patients' => Patient::latest('patient_code')->paginate($perPage = 20, $column = ['*'], $pageName = 'patient_page'),
        'polies' => Poly::latest('poly_code')->get(),
        'poly_doctor' => json_encode($polies_doctors),
        'route' => 'prescription',
        'page' => 20
        // 'medicines' => $medicines->latest('medicine_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'medicine_page'),
        // 'medicines_data' => json_encode($medicinesData),
        // 'medicine_types' => Medicine::select('medicine_type')->distinct()->get(),
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

    $prescription = $request->validate([
      'patient_code' => 'required',
      'user_code' => 'required',
      'poly_code' => 'required',
      'doctor_code' => 'required',
    ]);

    $prsc = Prescription::create($prescription);
    $prsc_number = $prsc->prsc_number;
    if ($prsc) {
      $registration = $prescription;
      $registration['fee'] = 5000;
      $registration['prsc_number'] = $prsc_number;
      if (Registration::create($registration)) {
        if (Payment::create(['prsc_number' => $prsc_number, 'total_payment' => 0])) {
          if ($prsc->prscPatient->update(['patient_status' => 'waiting'])){
            return back()->with('success', 'Prescription has been created');
          }
        }
      }
    }
    return back()->with('success', 'Error occur when creating prescription');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Prescription  $prescription
  * @return \Illuminate\Http\Response
  */
  public function show(Prescription $prescription)
  {
    $medicines = Medicine::latest();
    $medicinesData = [];
    foreach ($medicines->get() as $medicine) {
      $medicinesData[] = ['medicine_code' => $medicine->medicine_code, 'medicine_price' => $medicine->medicine_price];
    }
    return view('dashboard.prescription.prescription', [
        'prsc' => $prescription,
        'medicines' => Medicine::latest('medicine_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'medicine_page'),
        'medicine_types' => Medicine::select('medicine_type')->distinct()->get(),
        'medicines_data' => json_encode($medicinesData),
        'route' => 'prescription',
        'page' => 15
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Prescription  $prescription
  * @return \Illuminate\Http\Response
  */
  public function edit(Prescription $prescription)
  {
    $polies_doctors = [];
    foreach (Poly::latest('poly_code')->get()->load('polyDoctor') as $poly) {
      $doctors = [];
      foreach ($poly->polyDoctor as $doctor) {
        $doctors[] = ['doctor_code' => $doctor->doctor_code, 'doctor_name' => $doctor->doctor_name];
      }
      $polies_doctors[] = ["poly_code" => $poly->poly_code, "poly_name" => $poly->poly_name, 'doctors' => $doctors];
    }
    return view('dashboard.prescription.edit', [
      'prsc' => $prescription,
      'doctors' => Doctor::latest('doctor_code')->get()->load('doctorPoly'),
      'patients' => Patient::latest('patient_code')->paginate($perPage = 20, $column = ['*'], $pageName = 'patient_page'),
      'polies' => Poly::latest('poly_code')->get(),
      'poly_doctor' => json_encode($polies_doctors),
      'route' => 'prescriptionEdit',
      'page' => 20
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Prescription  $prescription
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Prescription $prescription)
  {
    $prsc = $request->validate([
      'patient_code' => 'required',
      'user_code' => 'required',
      'poly_code' => 'required',
      'doctor_code' => 'required',
    ]);
    
    if ($prescription->update($prsc) && $prescription->prscRegistration->update(['description' => $request->description])) {
      return back()->with('success', 'Prescription updated');
    }
    return back()->with('error', 'Error occur when updating prescription');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Prescription  $prescription
  * @return \Illuminate\Http\Response
  */
  public function destroy(Prescription $prescription)
  {
    if ($prescription->prscPayment->delete() && $prescription->delete() && $prescription->prscRegistration->delete()) {
      return redirect('/prescription')->with('delete', "Prescription number $prescription->prsc_number are deleted");
    }
    return redirect('/prescription')->with('delete', "Error occur when deleting Prescription number $prescription->prsc_number");
  }
  
  public function fetch_data(Request $request)
  {
    if ($request->ajax()) {
      return view('dashboard.partials.prescriptionTables.prescription', [
        'data_prescription' => Prescription::latest('prsc_number')->paginate($perPage = 20, $column = ['*'], $pageName = 'prescription')
      ]);
    }
  }

  public function table_update (Request $request) 
  {
    if ($request->ajax()) {
      // dd($request->all());
      $prsc = Prescription::where('prsc_number', $request->id)->update([
        $request->column_name => $request->column_value
      ]);
    }
  }
}
