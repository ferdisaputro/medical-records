<?php

namespace App\Models;

use App\Models\Poly;
use App\Models\User;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
   use HasFactory;

   protected $guarded = ['prsc_number'];
   protected $primaryKey = 'prsc_number';

   // protected $with = ['prscDetail'];

   public function prscDetail () {
      return $this->hasMany(Detail::class, 'prsc_number', 'prsc_number');
   }
   public function prscDoctor (){
      return $this->belongsTo(Doctor::class, 'doctor_code', 'doctor_code');
   }
   public function prscPatient () {
      return $this->belongsTo(Patient::class, 'patient_code', 'patient_code');
   }
   public function prscPoly () {
      return $this->belongsTo(Poly::class, 'poly_code', 'poly_code');
   }
   public function prscUser () {
      return $this->belongsTo(User::class, 'user_code', 'user_code');
   }
   public function prscPayment () {
      return $this->hasOne(Payment::class, 'prsc_number', 'prsc_number');
   }
   public function prscMedicine () {
      return $this->hasManyThrough(Medicine::class, Detail::class, 'prcs_number', 'medicine_code', 'prcs_number', 'medicine_code');
   }
   public function prscRegistration () {
      return $this->hasOne(Registration::class, 'prsc_number', 'prsc_number');
   }
}
