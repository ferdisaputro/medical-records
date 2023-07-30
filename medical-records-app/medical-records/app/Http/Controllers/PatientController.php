<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Poly;
use App\Models\Doctor;
use App\Models\Prescription;
use App\Models\Registration;
use App\Models\Payment;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PatientController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // $poly = Poly::get();
    $polies_doctors = [];
    foreach (Poly::get() as $poly) {
      $doctors = [];
      foreach ($poly->polyDoctor as $doctor) {
        $doctors[] = ['doctor_code' => $doctor->doctor_code, 'doctor_name' => $doctor->doctor_name];
      }
      $polies_doctors[] = ["poly_code" => $poly->poly_code, "poly_name" => $poly->poly_name, 'doctors' => $doctors];
    }
    
    return view('dashboard.patient.index', [
        'patients' => Patient::latest('patient_code')->paginate($perPage = 20, $column = ['*'], $pageName = 'patient_page'),
        'polies' => Poly::get(),
        'doctors' => Doctor::get(),
        'page' => 20,
        'poly_doctor' => json_encode($polies_doctors),
        'route' => explode('.', Route::currentRouteName())[0],
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
      'patient_name' => 'required',
      'patient_age' => 'required|numeric',
      'patient_address' => 'required',
      'patient_gender' => 'required',
      'patient_number' => 'required',
    ]);
    $credentials['patient_status'] = 'waiting';

    if (Patient::create($credentials)) {
      return back()->with('success', "$request->patient_name successfuly registered");
    }
    return back()->with('error', "Error occur while processing $request->patient_name");

    // $patientCode = Patient::where('patient_code', '1003')->first('patient_code');
    // dd($patientCode);

    // variable registration
    // $poliCode;
    // $doctorCode;
    // $patientCode;
    // $user_code;
    // $fee;

    //variable patient

    // $patient = [
    //   'patient_name' => $request->patient_name,
    //   'patient_age' => $request->patient_age,
    //   'patient_address' => $request->patient_address,
    //   'patient_gender' => $request->patient_gender,
    //   'patient_number' => $request->patient_number,
    //   'patient_status' => 'waiting',
    // ];

    // if(Patient::create($patient)){
    //   $credentials = $request->validate([
    //     'patient_name' => 'required',
    //     'patient_age' => 'required',
    //     'patient_address' => 'required',
    //     'patient_number' => 'required',
    //     'description' => 'required',
    //   ]);
    //   $patientCode = Patient::where('patient_age', $request->patient_age)->
    //                           where('patient_name', $request->patient_name)->
    //                           where('patient_address', $request->patient_address)->
    //                           where('patient_number', $request->patient_number)->
    //                           where('patient_gender', $request->patient_gender)->
    //                           first('patient_code');
    //   $prescription = [
    //     'doctor_code' => $request->doctor_code,
    //     'poly_code' => $request->poly_code,
    //     'patient_code' => $patientCode->patient_code,
    //     'user_code' => Auth::user()->user_code,
    //   ];
    //   if(Prescription::create($prescription)){
    //     $registration = $prescription;
    //     $registration['fee'] = 5000;
    //     $registration['registration_date'] = date('Y-m-d');
    //     $registration['description'] = $request->description;
    //     if(Registration::create($registration)){
    //       Payment::create(['patient_code' => $patientCode->patient_code]);
    //       return back()->with('success', 'Registration success');
    //     }
    //   }
    // }


    // create table
    // $createPatient = Patient::create($patient);
    // $createRegistration = Registration::create();

    // return view('dashboard.patient.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Patient  $patient
  * @return \Illuminate\Http\Response
  */
  public function show(Patient $patient)
  {
    // $totalPrice = $patient->patientPrsc->total_payme nt;
    // $totalPayment = $patient->patientRegistration->fee;
    // dd($patient);
    // $patient = $patient->load('patientDetail', 'patientPoly', 'patientDoctor', 'patientUser');
    // $medicines = Medicine::latest();
    // $medicinesData = [];
    // foreach ($medicines->get() as $medicine) {
    //   $medicinesData[] = ['medicine_code' => $medicine->medicine_code, 'medicine_price' => $medicine->medicine_price];
    // }
    // $prescription = Prescription::where('patient_code', $patient->patient_code)->first();
    
    // dd($patient->patientPrsc->total_payment + $patient->patientRegistration->);
    // dd(json_encode($medicinesData));
    
    $polies = Poly::latest('poly_code')->get()->load('polyDoctor');
    $polies_doctors = [];
    foreach ($polies as $poly) {
      $doctors = [];
      foreach ($poly->polyDoctor as $doctor) {
        $doctors[] = ['doctor_code' => $doctor->doctor_code, 'doctor_name' => $doctor->doctor_name];
      }
      $polies_doctors[] = ["poly_code" => $poly->poly_code, "poly_name" => $poly->poly_name, 'doctors' => $doctors];
    }
    return view('dashboard.patient.patient', [
      'page' => 15,
      'prscs' => $patient->patientPrsc->load('prscPoly', 'prscDoctor', 'prscPayment')->all(),
      'patient' => $patient->load('patientPrsc'),
      'poly_doctor' => json_encode($polies_doctors),
      'polies' => $polies,
      'route' => 'patient',
      // 'medicines' => $medicines->latest('medicine_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'medicine_page'),
      // 'medicines_data' => json_encode($medicinesData),
      // 'medicine_types' => Medicine::select('medicine_type')->distinct()->get(),
      // 'total_price' =>
      // 'medicines_price' => 
      // 'prescription' => Prescription::where('prsc_number', $patient->patientPrsc->prsc_number)->first()->load('prscDetail'),
      // 'prescription' => Prescription::where('patient_code', $patient->patient_code)->get()
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Patient  $patient
  * @return \Illuminate\Http\Response
  */
  public function edit(Patient $patient)
  {
    return view('dashboard.patient.edit', [
      'patient' => $patient,
      'doctors' => Doctor::get(),
      'polies' => poly::get(),
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Patient  $patient
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Patient $patient)
  {
    // dd($request->all(), $patient);

    if ($request->route == 'partials') {
      $patient->update(['patient_status' => $request->patient_status]);
      return back();
    }

    // dd($patient, $patient->patientPrsc, $patient->patientRegistration);

    // $patientCode = $request->patient_code;
    // $prscNumber = $request->prsc_number;
    // $registrationNumber = $request->registration_number;

    $patient_input = $request->validate([
      'patient_name' => 'required|min:3',
      'patient_age' => 'required',
      'patient_address' => 'required',
      'patient_number' => 'required',
      'patient_gender' => 'required',
    ]);
    // $patient['patient_status'] = 'w'

    // $prsc = [
    //   'user_code'  => $request->user_code,
    //   'poly_code'  => $request->poly_code,
    //   'doctor_code'  => $request->doctor_code,
    // ];

    // $registration = $prsc;
    // $registration['description'] = $request->description;

    // dd($patient, $prsc, $registration);
    $patient->update($patient_input);
    if ($patient->wasChanged()) {
      return back()->with('success', 'Patien\'s data is updated');
    } else {
      return back()->with('info', 'No data has been changed');
    }
    return back()->with('error', 'An error occur while updating');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Patient  $patient
  * @return \Illuminate\Http\Response
  */
  public function destroy(Patient $patient)
  {
    Patient::where('patient_code', $patient->patient_code)->delete();
    Payment::where('payment_number', $patient->patientPayment->payment_number)->delete();
    Prescription::where('prsc_number', $patient->patientPrsc->prsc_number)->delete();
    Registration::where('registration_number', $patient->patientRegistration->registration_number)->delete();
    return redirect('/patient')->with('delete', 'Data has been deleted');
  }
  
  public function record(Patient $patient) 
  {
    return view('dashboard.patient.print', [
      'patient' => $patient
    ]);
  }

  public function fetch_data(Request $request)
  {
    if ($request->ajax()) {
      $patients = Patient::latest('patient_code')->filter(request(['patient_keyword', 'patient_gender', 'patient_status']))->paginate($perPage = request('patient_perPage'), $column = ['*'], $pageName = 'patient_page');
      return view('dashboard.partials.patient.patientTable', [
        'patients' => $patients,
        'route' => $request->patient_route
      ]);
    }
  }
}
