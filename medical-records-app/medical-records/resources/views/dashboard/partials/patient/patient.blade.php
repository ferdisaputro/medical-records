<div class="text-center lg:text-left rounded-lg mx-auto pt-6 pb-4 bg-white">
  <div>
    <span class="px-4 ml-9 font-semibold text-4xl">Queue</span>
    @if ($route !=="patient")
      <a href="/patient#registration" class="ml-auto inline-block border-2 border-blue-400 bg-gray-50 py-1.5 px-3 rounded text-gray-500 hover:bg-gray-200">Registration</a>
    @endif
  </div>
  <div class="my-2">
    <input type="text" class="patient-keyword px-4 w-56 rounded ml-9 border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-blue-300 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="search" placeholder="Search">
    <select class="patient-gender type w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Filter Gender --</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    <select class="patient-status type w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Status --</option>
      <option value="waiting">Waiting</option>
      <option value="consulting">Consulting</option>
      <option value="finished">Finished</option>
    </select>
  </div>
  <div class="overflow-auto">
    @include('dashboard.partials.patient.patientTable')
  </div>
</div>

@once
  @push('scripts')
  <script>
    $(document).ready( () => {
      let patientTableUrl = ['patient_keyword=', 'patient_gender=', 'patient_status=', 'patient_page=', 'patient_route={{  explode('.', Route::currentRouteName())[0] }}', 'patient_perPage={{ $page }}']
      let globalTimeout = null

      $('.patient-keyword').on('input', function(e) {
        if(globalTimeout != null) clearTimeout(globalTimeout);  
          globalTimeout =setTimeout(SearchFuncPtn, 350, e);
      })
      $('.patient-gender').on('change', function(e) {
        patientTableUrl[1] = 'patient_gender='+e.target.value
        patientTableUrl[3] = "patient_page=1"
        fetch_data(patientTableUrl.join('&'))
      })
      $('.patient-status').on('change', function(e) {
        patientTableUrl[2] = 'patient_status='+e.target.value
        patientTableUrl[3] = "patient_page=1"
        fetch_data(patientTableUrl.join('&'))
      })
      $('#patientTable').on('click', '.pagination a', function(event) {
        const $e = $(event.target)
        event.preventDefault();
        let request = $(this).attr('href').split('patient_page=')[1]; 
        patientTableUrl[3] = 'patient_page='+request
        fetch_data(patientTableUrl.join('&'))
      })
      function SearchFuncPtn(key){  
        globalTimeout = null;  
        patientTableUrl[0] = "patient_keyword="+key.target.value
        patientTableUrl[3] = "patient_page=1"
        fetch_data(patientTableUrl.join('&'))
      }
      function fetch_data(array) {
        $.ajax({
          url:"/patient/fetch_data?"+array,
          success:function(data) {
            $('#patientTable').html(data);
          }
        })
      }
    })
  </script>
  @endpush
@endonce