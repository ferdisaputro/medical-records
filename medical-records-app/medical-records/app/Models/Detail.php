<?php

namespace App\Models;

use App\Models\Medicine;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model
{
   use HasFactory;

   protected $guarded = ['id'];

   protected $with = ['detailMedicine', 'detailPrsc'];

   public function detailPrsc () {
      return $this->belongsTo(Prescription::class, 'prsc_number', 'prsc_number');
   }

   public function detailMedicine()
   {
      return $this->belongsTo(Medicine::class, 'medicine_code', 'medicine_code');
   }
}
