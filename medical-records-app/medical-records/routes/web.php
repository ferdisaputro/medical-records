<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------x`--------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login/atempt', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {

   Route::get('/', [DashboardController::class, 'index']);
   Route::get('/fetch_data', [DashboardController::class, 'fetch_data']);
   // Route::get('/doctor', [DashboardController::class, 'fetch_data_doctor']);

   route::get('/patient/{patient:patient_code}/print', [PatientController::class, 'record']);
   Route::get('/patient/fetch_data', [PatientController::class, 'fetch_data']);
   Route::resource('patient', PatientController::class)->parameters([
      'patient' => 'patient:patient_code',
   ]);
   
   Route::post('/prescription/table_update', [PrescriptionController::class, 'table_update']);
   Route::get('/fetch_data_prescription', [PrescriptionController::class, 'fetch_data']);
   Route::resource('prescription', PrescriptionController::class)->parameters([
      'prescription' => 'prescription:prsc_number'
   ]);
   
   Route::resource('user', UserController::class)->parameters([
      'user' => 'user:user_code'
   ]); 
   
   Route::post('/doctor/table_update', [DoctorController::class, 'table_update'])->name('doctor_table_update');
   Route::get('/doctor/fetch_data', [DoctorController::class, 'fetch_data']);
   Route::resource('doctor', DoctorController::class)->parameters([
      'doctor' => 'doctor:doctor_code'
   ]); 

   Route::get('/record', [RecordController::class, 'index']);

   Route::post('/medicine/table_update', [MedicineController::class, 'table_update'])->name('medicine_table_update');
   Route::get('/medicine/fetch_data', [MedicineController::class, 'fetch_data']);
   Route::resource('medicine', MedicineController::class)->parameters([
      'medicine' => 'medicine:medicine_code'
   ]);

   Route::resource('detail', DetailController::class);

   Route::post('payment/{payment:payment_number}', [PaymentController::class, 'update']);

   Route::resource('/poly', PolyController::class)->parameters([
      'poly' => 'poly:poly_code'
   ]);

});
