<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use App\Models\Poly;

class RecordController extends Controller
{
  public function index()
  {
    date_default_timezone_set('Asia/jakarta');
    $now = date_sub(now(), date_interval_create_from_date_string('-2 day'));
    $patient_record_count = Patient::select(DB::raw('count(created_at) AS record_count, CAST(created_at AS DATE) AS created_date'))->groupBy(DB::raw('CAST(created_at as DATE)'))->get();
    $interval = 90;
    
    $recordCount = collect([]);
    $month = [];
    for ($i=0; $i < $interval; $i++) {
      $values = 0;
      $yesterday = date_format(date_sub($now, date_interval_create_from_date_string('1 day')), 'Y-m-d');
      // foreach ($patient_record_count as $key) {
      //   if ($yesterday == $key->created_date) {
      //     $values = $key->record_count;
      //   }
      // }
      // $recordCount[] = ['x' => "$yesterday", 'y' => $values];
      // $recordCount[] = ['id' => "$yesterday", 'nested' => ['value' => $values]];
      // $recordCount["$month"] = 0;
      $recordCount["$yesterday"] = 0;
      $month[] = $yesterday;
    }

    $patient_records = [];
    foreach ($patient_record_count as $key) {
      $patient_records[$key->created_date] = $key->record_count;
      if (isset($recordCount["$key->created_date"])) {
        $recordCount["$key->created_date"] = $key->record_count;
        // $recordCount[] = ['date' => $key->created_date, "value" => $key->record_count];
        }
    }

    $polies = Poly::get();

    // dd($polies->polyPrsc);
    foreach ($polies as $poly) {
      // dd($poly->polyPrsc);
    }


    // $recordCount_final = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',$recordCount);

    
    // dd($patient_record_count, $month, $recordCount);
    // $recordCount = $recordCount->replace($patient_records);

    // dd(json_encode($array_final));

    // for ($i=0; $i < count($recordCount); $i++) { 
    //   if (isset($recordCount["$key->created_date"])) {

    //   }
    // }

    // dd($month);
    return view('dashboard.record.index', [
      // 'patient_record' => $recordCount_final,
      'patient_record' => json_encode($recordCount),
      'patient_date' => json_encode($month),
      // 'array' => $months_final
    ]);
  }
}
