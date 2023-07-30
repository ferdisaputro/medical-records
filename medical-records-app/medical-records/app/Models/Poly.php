<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poly extends Model
{
   use HasFactory;

   protected $guarded = ['poly_code'];
   protected $primaryKey = 'poly_code';

   // protected $load = ['polyDoctor'];

   public function polyDoctor () {
      return $this->hasMany(Doctor::class, 'poly_code', 'poly_code');
   }
}
