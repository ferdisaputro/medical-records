<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MedicineController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('dashboard.medicine.index', [
      'medicines' => Medicine::latest('medicine_code')->paginate($perPage = 15, $column = ['*'], $pageName = 'medicine_page'),
      'medicine_categories' => Medicine::select('category')->distinct()->orderBy('category', 'asc')->get(),
      'medicine_types' => Medicine::select('medicine_type')->distinct()->orderBy('medicine_type', 'asc')->get(),
      'route' => 'medicine',
      'page' => 15,
    ]);
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
    $credentials = $request->validate([
      'medicine_name' => 'required|unique:medicines',
      'medicine_type' => 'required',
      'category' => 'required',
      'medicine_price' => 'required',
      'stock' => 'required',
    ]);



    if (Medicine::create($credentials)) {
      return redirect('/medicine')->with('success', 'Medicine is added');
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Medicine  $medicine
  * @return \Illuminate\Http\Response
  */
  public function show(Medicine $medicine)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Medicine  $medicine
  * @return \Illuminate\Http\Response
  */
  public function edit(Medicine $medicine)
  {
    return view('dashboard.medicine.edit', [
      'medicine' => $medicine,
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Medicine  $medicine
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Medicine $medicine)
  {
    // dd($request->all());
    // dd($medicine);

    if ($request->route == 'index') {
      // dd($request);
      $medicine->update([
        'medicine_name' => $request->medicine_name_index,
        'medicine_type' => $request->medicine_type_index,
        'category' => $request->category_index,
        'medicine_price' => $request->medicine_price_index,
        'stock' => $request->stock_index
      ]);
      return back();
    }

    $credentials = $request->validate([
      'medicine_name' => 'required',
      'medicine_type' => 'required',
      'category' => 'required',
      'medicine_price' => 'required',
      'stock' => 'required',
    ]);

    if ($medicine->update($credentials)) {
      return redirect('/medicine')->with('success', 'Updated');
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Medicine  $medicine
  * @return \Illuminate\Http\Response
  */
  public function destroy(Medicine $medicine)
  {
    // dd($medicine);
    if ($medicine->delete()) {
      return redirect('/medicine')->with('delete', 'Delete complete');
    }

  }

  public function fetch_data (Request $request)
  {
    // dd($request->search);
    if($request->ajax()){
      return view('dashboard.partials.medicine.medicineTable', [
        'medicines' => Medicine::latest('medicine_code')->filter(request(['medicine_keyword', 'medicine_category', 'medicine_type']))->paginate($perPage = request('medicine_perPage'), $column = ['*'], $pageName = 'medicine_page'),
        'route' => $request->medicine_route,
        'medicine_types' => Medicine::select('medicine_type')->distinct()->get(),
      ]);
    }
  }

  public function table_update(Request $request){
    if ($request->ajax()) {
      $medicine = Medicine::where('medicine_code', $request->id);
      $value = $medicine->update([
        $request->column_name => $request->column_value 
      ]);

      if($value) {
        echo '<script>alert("Updated")</script>';
      }
    }
  }
}
