{{-- @dd($specialists) --}}
<div class="text-center lg:text-left rounded-lg mx-auto pt-6 pb-4 bg-white">
  <span class="pt-2 px-4 ml-9 font-semibold text-4xl" colspan="5">Doctors</span>
  <div>
    <input type="text" class="doctor-keyword px-4 w-56 rounded ml-9 border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-blue-300 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="search" placeholder="Search">
    <select class="specialist type w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Specialist --</option>
      @foreach ($specialists as $specialist)
        <option value="{{ $specialist->specialist }}">{{ $specialist->specialist }}</option>
      @endforeach
    </select>
    <select class="doctor-poly type w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Poly --</option>
      @foreach ($polies as $poly)
        <option value="{{ $poly->poly_code }}">{{ $poly->poly_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="overflow-auto">
    @include('dashboard.partials.doctor.doctorTable')
  </div>
</div>

@once
  @push('scripts')
    <script>
      $(document).ready( () => {
        let doctorTableUrl = ['doctor_keyword=', 'specialist=', 'doctor_poly=', 'doctor_page=', 'doctor_route={{  explode('.', Route::currentRouteName())[0] }}', 'doctor_perPage={{ $page }}']
        let globalTimeout = null

        $('.doctor-keyword').on('input', function(e) {
          if(globalTimeout != null) clearTimeout(globalTimeout);  
            globalTimeout =setTimeout(SearchFuncPtn, 350, e);
        })
        $('.specialist').on('change', function(e) {
          doctorTableUrl[1] = 'specialist='+e.target.value
          doctorTableUrl[3] = "doctor_page=1"
          fetch_data(doctorTableUrl.join('&'))
        })
        $('.doctor-poly').on('change', function(e) {
          doctorTableUrl[2] = 'doctor_poly='+e.target.value
          doctorTableUrl[3] = "doctor_page=1"
          fetch_data(doctorTableUrl.join('&'))
        })
        $('#doctorTable').on('click', '.pagination a', function(event) {
          const $e = $(event.target)
          event.preventDefault();
          let request = $(this).attr('href').split('doctor_page=')[1]; 
          doctorTableUrl[3] = 'doctor_page='+request
          fetch_data(doctorTableUrl.join('&'))
        })
        function SearchFuncPtn(key){  
          globalTimeout = null;  
          doctorTableUrl[0] = "doctor_keyword="+key.target.value
          doctorTableUrl[3] = "doctor_page=1"
          fetch_data(doctorTableUrl.join('&'))
        }
        function fetch_data(array) {
          $.ajax({
            url:"/doctor/fetch_data?"+array,
            success:function(data) {
              $('#doctorTable').html(data);
            }
          })
        }
      })
    </script>
  @endpush
@endonce