<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Prescription;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $prsc = Prescription::where('prsc_number', $request->prsc_number);
      // dd($prscModel->prscRegistration->fee + $prscModel->total_payment);
      // if ($request->prsc_date) {
      $prsc->update([
        'prsc_date' => $request->prsc_date,
        'total_payment' => $request->total_payment,
      ]);

      // }
      foreach ($request->detail as $detail) {
        if (isset($detail['route']) && $detail['route'] == 'database') {
          $data = Detail::find($detail['id']);
          // if ($data->detailMedicine->stock > 0) {
            unset($detail['route']);
            unset($detail['id']);
            $data->update($detail);
          // } else {
          //   return back()->with('warning', '')
          // }
        } else {
          $detail['prsc_number'] = $request->prsc_number;
          Detail::create($detail);
        }
      }

      // return redirect("/patient/$request->patient_code");
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail, Request $request)
    {
      // $prsc = Prescription::where('prsc_number', $request->prsc_number);
      if ($request->ajax()) {
        $prsc = $detail->detailPrsc;
        $total = $prsc->total_payment;
        $curTotal = $total - $detail->sub_total;
        if ($detail->delete() && $prsc->update(['total_payment' => $curTotal])) {
          // return view('dashboard.partials.details.detail', [
          //   'patient' => $patient,
          // 'medicines' => $medicines->latest('medicine_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'medicine_page'),
          // 'medicines_data' => json_encode($medicinesData),
          // 'medicine_types' => Medicine::select('medicine_type')->distinct()->get(),
          // ]);
        }
      }
    }
}
