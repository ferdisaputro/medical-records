<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Medicine;

class PaymentController extends Controller
{
  public function update(Request $request, Payment $payment) {
    
    // dd($payment->paymentPatient);
    // dd($request->all());
    foreach ($request->detail as $medicine) {
      // dd($medicine);
      Medicine::where('medicine_code', $medicine['medicine_code'])->decrement('stock', $medicine['pcs']);
    }
    
    $patientResult = $payment->paymentPatient->update(['patient_status' => 'finished']);
    $paymentResult = $payment->update([
      'total_payment' => $request->total_payment,
      'cash' => $request->cash,
      'change' => $request->change,
    ]);

    if ($paymentResult && $patientResult) {
      return back()->with('success', 'Payment Completed and consultation finished');
    }
    return redirect("/patient/$request->patient_code")->with('failed', 'Payment Failed');
  }
}
