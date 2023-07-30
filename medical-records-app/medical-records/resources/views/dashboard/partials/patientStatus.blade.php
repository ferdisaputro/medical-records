<?php 
$model;
if (isset($patient)) {
   $model = $patient;
} elseif (isset($prsc->prscPatient)) {
   $model = $prsc->prscPatient;
}

?>
<form action="/patient/{{ $patient->patient_code?? $prsc->patient_code }}" method="post">
   @csrf
   @method('put')
   <input type="hidden" name="route" value="partials">
   <select name="patient_status" {{ $route == 'patient'? "disabled" : "
   " }} onchange="this.form.submit()" 
   class="
   patientStatus w-44 px-4 rounded bg-gradient-to-r border-b-2 h-9 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500
   {{ $model->patient_status === 'waiting'? 'from-teal-400 to-green-300' : 
      ($model->patient_status === 'consulting'? 'from-yellow-300 to-lime-200' : 
      ($model->patient_status === 'finished'? 'from-indigo-300 to-cyan-400' : '')
      ) 
   }}"
   >
      <option class="bg-gray-100" {{ $model->patient_status == 'waiting'? 'selected' : '' }} value="waiting">Waiting</option>
      <option class="bg-gray-100" {{ $model->patient_status == 'consulting'? 'selected' : '' }} value="consulting">Consulting</option>
      <option class="bg-gray-100" {{ $model->patient_status == 'finished'? 'selected' : '' }} value="finished">Finished</option>
   </select>
   {{-- <input type="submit" value="Change" class="ml-auto px-4 rounded border-b-2 h-7 bg-gray-100 border-b-blue-400 placeholder:text-gray-500 outline-none"> --}}
</form>