<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['payment_number'];
    protected $primaryKey = 'payment_number';

    public function getRouteKeyName()
    {
        return 'payment_number';
    }

    public function paymentPatient () {
        return $this->hasOneThrough(Patient::class, Prescription::class, 'prsc_number', 'patient_code', 'prsc_number', 'patient_code');
    }
}
