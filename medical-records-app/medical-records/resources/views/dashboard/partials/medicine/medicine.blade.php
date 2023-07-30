<div class="text-center lg:text-left rounded-lg mx-auto pt-6 pb-4 bg-white">
  <span class="px-4 ml-9 font-semibold text-4xl">Medicines</span>
  <div>
    <input type="text" class="medicine-keyword px-4 w-56 rounded ml-9 border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-blue-300 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="search" placeholder="Search">
    <select class="medicine-category w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Select category --</option>
      <option value="free medicine">Free medicine</option>
      <option value="limited free">Limited medicine</option>
      <option value="drugs">Drugs</option>
      <option value="herbs">Herbs</option>
    </select>
    <select class="medicine-type w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
      <option class="bg-gray-100" value="">-- Select type --</option>
      @foreach ($medicine_types as $type)
      <option value="{{ $type->medicine_type }}">{{ $type->medicine_type }}</option>
      @endforeach
    </select>
  </div>
  <div class="overflow-auto">
    @include('dashboard.partials.medicine.medicineTable')
  </div>
</div>

@once
  @push('scripts')
    <script>
      $(document).ready(function () {
        let globalTimeout = null;  
        let url = ["medicine_keyword=","medicine_category=","medicine_type=","medicine_page=", "medicine_route={{  $route }}" , "medicine_perPage={{ $page }}"]
        $('.medicine-keyword').on('input', function(keyword) {
          if(globalTimeout != null) clearTimeout(globalTimeout);  
          globalTimeout =setTimeout(SearchFunc, 350, keyword);
        })  
        function SearchFunc(key){  
          globalTimeout = null;  
          url[0] = "medicine_keyword="+$(key.target).val()
          url[3] = "medicine_page=1"
          fetch_data(url.join('&'))
        }

        $('.medicine-category').on('change', function(category) {
          url[1] = "medicine_category="+$(category.target).val()
          url[3] = "medicine_page=1"
          fetch_data(url.join('&'))
        })
        $('.medicine-type').on('change', function(type) {
          url[2] = "medicine_type="+$(type.target).val()
          url[3] = "medicine_page=1"
          fetch_data(url.join('&'))
        })
        $('#medicineTable').on('click', '.pagination a', function (event) {
          event.preventDefault();
          let request = $(this).attr('href').split('medicine_page=')[1];
          url[3] = 'medicine_page='+request
          fetch_data(url.join('&'))
        })
        function fetch_data(array) {
          $.ajax({
            url:"/medicine/fetch_data?"+array,
            success:function(data) {
              $('#medicineTable').html(data);
            }
          })
        }

        // input to patient medicine script are in detail.blade.php
      })
    </script>
  @endpush
@endonce
