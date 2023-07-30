<?php

namespace App\Models;

use App\Models\Poly;
use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
   use HasFactory;

   protected $guarded = ['registration_number'];
   protected $primaryKey = 'registration_number';
   // protected $with = ['registrationPatient', 'registrationPoly'];

   public function registrationPatient ()
   {
      return $this->hasOne(Patient::class, 'patient_code', 'patient_code');
   }
   public function registrationPoly ()
   {
      return $this->hasOne(Poly::class, 'poly_code', 'poly_code');
   }
}
