<?php

namespace App\Models;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
   use HasFactory;

   protected $guarded = ['medicine_code'];
   protected $primaryKey = 'medicine_code';

   public function scopeFilter($query, array $filters) {
      $query->when($filters['medicine_keyword'] ?? false, fn($query, $keyword) =>
            $query->where('medicine_name', 'like', '%'.$keyword.'%')
         )->when($filters['medicine_category'] ?? false, fn($query, $category) =>
            $query->where('category', 'like', '%'.$category.'%')
         )->when($filters['medicine_type'] ?? false, fn($query, $type) =>
            $query->where('medicine_type', 'like', '%'.$type.'%')
      );
   }
   
   public function medicineDetail() {
      return $this->hasMany(Detail::class, 'medicine_code', 'medicine_code');
   }
}
