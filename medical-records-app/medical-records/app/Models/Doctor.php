<?php

namespace App\Models;

use App\Models\Poly;
use App\Models\Detail;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
   use HasFactory;

   protected $guarded = ['doctor_code'];
   protected $primaryKey = 'doctor_code';

   // protected $load = ['doctorPoly'];

   // public function details() {
   //     $this.hasMany(Detail::class);
   // }

   public function scopeFilter($query, array $filters) {
      $query->when($filters['doctor_keyword'] ?? false, fn($query, $keyword) =>
            $query->where('doctor_name', 'like', '%'.$keyword.'%')
         )->when($filters['specialist'] ?? false, fn($query, $specialist) =>
            $query->where('specialist', 'like', '%'.$specialist.'%')
         )->when($filters['doctor_poly'] ?? false, fn($query, $poly) =>
            $query->whereHas('doctorPoly', fn($query) => 
            $query->where('poly_code', $poly)
         )
      );
   }

   // public function doctorPrsc() {
   //    return $this->hasMany(Prescription::class);
   // }

   public function doctorPoly () {
      return $this->belongsTo(Poly::class, 'poly_code', 'poly_code');
   }
}
