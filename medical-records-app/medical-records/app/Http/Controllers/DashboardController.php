<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Poly;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index() {
    // date_default_timezone_set('Asia/Jakarta');
    // $dataRegistration = Registration::latest()->paginate($perPage = 4, $columns = ['*'], $pageName = 'registration');
    // dd($dataPatient->paginate(4)); 
    $doctors = Doctor::latest('doctor_code')->with('doctorPoly');
    $patients = Patient::latest('patient_code');
    $medicines = Medicine::latest('medicine_code');

    return view('dashboard.index', [
      // payments
      'payments' => Payment::whereDate('created_at', date('Y-m-d'))->sum('total_payment'),
      // polies
      'polies' => Poly::latest('poly_code')->with('polyDoctor')->paginate($perPage = 5, $columns = ['*'], $pageName = 'poly'),
      // doctors
      'doctors' => $doctors->paginate($perPage = 5, $columns = ['*'], $pageName = 'doctor_page'),
      'specialists' => $doctors->select('specialist')->distinct()->get() ,
      // patients
      'patients' => $patients->paginate($perPage = 5, $columns = ['*'], $pageName = 'patient_page'),
      'pasien_count' => $patients->whereDate('created_at', date('Y-m-d'))->count(),
      // medicines
      'medicines' => $medicines->paginate($perPage = 5, $column = ['*'], $pageName = 'medicine_page'),
      'medicine_types' => $medicines->select('medicine_type')->distinct()->get(),
      // users
      'users' => User::latest('user_code'),
      // utilities
      'route' => 'index',
      'page' => '5'
    ]);
  }
  public function fetch_data(Request $request) {
    if($request->ajax()){
      $model = "App\Models\\$request->route";
      if ($request->route != "poly") {
        if($request->route == "doctor"){
          $fetch_data = $model::with(['doctorPoly']);
        } 
        if ($request->route == "patient") {
          $fetch_data = $model::with(['patientPoly', 'patientDoctor', 'patientUser']);
        } 
        $fetch_data_query = $fetch_data->latest()->paginate($perPage = 4, $columns = ['*'], $pageName = $request->route);
      } else {
          $fetch_data_query = $model::latest()->paginate($perPage = 4, $columns = ['*'], $pageName = $request->route)->load('polyDoctor');
      }

      // dd($fetch_data);
      return view('dashboard.partials.homeTables.'.$request->route, [
        "data_{$request->route}" => $fetch_data_query,
      ])->render();
    }
  }
  // public function fetch_data_doctor(Request $request) {
  //   if($request->ajax()) {
  //     $doctors = Doctor::paginate($perPage = 1 , $columns = ['*'] , $pageName = 'doctor')->withQueryString();
  //     return view('dashboard.partials.homeTables.doctors', [
  //       'doctors' => $doctors
  //     ]);
  //   }
  // }
}
