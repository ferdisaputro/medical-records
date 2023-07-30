<?php

namespace App\Models;

use App\Models\Poly;
use App\Models\Prescription;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
   use HasFactory;

   protected $guarded = ['patient_code'];
   protected $primaryKey = 'patient_code';

   // protected $with = ['patientPoly', 'patientDoctor', 'patientUser'];

   public function scopeFilter($query, array $filters) {
      $query->when($filters['patient_gender'] ?? false, fn($query, $gender) =>
            $query->where('patient_gender', $gender)
         )->when($filters['patient_status'] ?? false, fn($query, $status) =>
            $query->where('patient_status', $status)
         )->when($filters['patient_keyword'] ?? false, fn($query, $keyword) =>
            $query->where('patient_name', 'like', '%'.$keyword.'%')
                  // ->orWhere('patient_age', 'like', '%'.$keyword.'%')
                  // ->orWhere('patient_number', 'like', '%'.$keyword.'%')
         );
   }

   public function patientPrsc () 
   {
      return $this->hasMany(Prescription::class, 'patient_code', 'patient_code')->latest('prsc_number');
   }
   public function patientDetail()
   {
      return $this->hasManyThrough(Detail::class, Prescription::class, 'prsc_number', 'prsc_number', 'patient_code', 'patient_code');
   }
   public function patientPayment () 
   {
      return $this->hasManyThrough(Payment::class, Prescription::class, 'patient_code', 'prsc_number', 'patient_code', 'prsc_number')->latest('payment_number');
   }
   public function patientRegistration()
   {
      return $this->hasMany(Registration::class, 'patient_code', 'patient_code');
   }
   // public function patientPoly ()
   // {
   //    return $this->hasOneThrough(Poly::class, Prescription::class, 'patient_code', 'poly_code', 'patient_code', 'poly_code');
   // }
   // public function patientDoctor()
   // {
   //    return $this->hasOneThrough(Doctor::class, Prescription::class, 'patient_code', 'doctor_code', 'patient_code', 'doctor_code');
   // }
   // public function patientUser()
   // {
   //    return $this->hasOneThrough(User::class, Prescription::class, 'patient_code', 'user_code', 'patient_code', 'user_code');
   // }
}
