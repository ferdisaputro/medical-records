<div class=" bg-white rounded-lg py-5">
  <span class="px-4 ml-9 font-semibold text-4xl">Polies</span>
  <div class="flex flex-wrap justify-center mt-2">
    @foreach ($polies as $poly)
      <div class="poly w-full sm:w-1/5 max-w-[350px] min-w-[200px] my-2 mx-3" id="{{ $loop->iteration }}">
        <div class="border-2 rounded-lg border-blue-500 px-4 py-2 form-poly">
          <form action="/poly/{{ $poly->poly_code }}" method="post" class="form-doctor">
            <img src="/icons/{{ strtolower($poly->poly_name) }}.png" alt="{{ $poly->poly_name }}">
            <input disabled type="text" name="poly_name" value="{{ $poly->poly_name }}" class="poly-name bg-gray-100 disabled:bg-transparent font-semibold w-full text-3xl overflow-hidden capitalize outline-none">
            @csrf
            @method('put')
            <div class="pt-1 pl-1.5 border-l border-blue-500 mt-1">
              <h6 class="font-semibold text-xl">Doctor List</h6>
              <div class="form-doctor-wraper" data-loop="{{ $poly->polyDoctor->count() }}">
                  @foreach ($poly->polyDoctor as $doctor)
                  <div class="inline-flex items-center">
                    <input type="hidden" name="doctor[{{ $loop->iteration }}][doctor_code_old]" class="doctor-code-old" value="{{ $doctor->doctor_code }}">
                    <input type="hidden" name="doctor[{{ $loop->iteration }}][doctor_code]" class="doctor-code" value="{{ $doctor->doctor_code }}">
                    <input disabled type="text" name="doctor[{{ $loop->iteration }}][doctor_name]" value="{{ $doctor->doctor_name }}" class="poly-doctor-name poly-doctor-add bg-gray-100 disabled:bg-transparent my-0.5 pl-1.5 border-l border-blue-500 outline-none w-full">
                    <input type="hidden" name="route" value="poly">
                    <a onclick="return confirm('Remove {{ $doctor->doctor_name }} from {{ $poly->poly_name }}?')" data-doctor-code="{{ $doctor->doctor_code }}" data-doctor-name="{{ $doctor->doctor_name }}" class="remove-doctor w-5 hidden items-center justify-center cursor-pointer bg-red-500 rounded-r text-white hover:bg-red-700">
                      <span data-feather="x" class="w-full"></span>
                    </a>
                  </div>
                  @endforeach
              </div>
              <div class="add hidden">
                <input placeholder="Add doctor" name="add_doctor" autocomplete="off" class="poly-doctor-add append hover:bg-gray-200 bg-gray-100 disabled:bg-transparent my-0.5 pl-1.5 border-l border-blue-500 outline-none w-full">
              </div>
            </div>
            <input type="submit" class="poly-doctor-submit mt-1 px-4 w-full h-8 rounded border text-md bg-gray-50 border-blue-400 focus:bg-gray-200 focus:border hover:bg-gray-200 transition-colors hidden">
          </form>
          @if ($route === 'poly')
            <div class="text-center mt-3">  
              <button type="button" class="poly-edit px-1.5 inline-flex items-center w-2/5 justify-center cursor-pointer bg-yellow-500 rounded text-white hover:bg-yellow-700" title="view" href="/poly/{{ $poly->poly_code }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
              </button>
              <form action="/poly/{{ $poly->poly_code }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button onclick="return confirm('Delete {{ $poly->poly_name }}?')" type="submit" class="inline-flex items-center justify-center w-2/5 px-1.5 cursor-pointer bg-red-500 rounded text-white hover:bg-red-700">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
              </form>
            </div>
          @else

          <a href="/poly#{{ $loop->iteration }}" class="poly-doctor-submit mt-1 px-4 h-7 w-full rounded border text-md bg-gray-50 inline-flex justify-center items-center border-blue-400 focus:bg-gray-200 focus:border hover:bg-gray-200 transition-colors">Detail</a>

          @endif
        </div>
      </div>
    @endforeach

    @if ($route == 'poly')
      <div class="poly w-full sm:w-1/5 max-w-[350px] min-w-[200px] my-2 mx-3">
        <div class="border-2 rounded-lg border-blue-500 px-4 py-2 form-poly">
          <form action="/poly" method="post" class="form-doctor">
            @csrf
            <input type="text" name="poly_name" placeholder="Poly name" class="bg-gray-100 disabled:bg-transparent font-semibold w-full text-3xl overflow-hidden capitalize outline-none">
            <div class="pt-1 pl-1.5 border-l border-blue-500 mt-1">
              <h6 class="font-semibold text-xl">Doctor List</h6>
              <div class="form-doctor-wraper" data-loop ="0">
              </div>
              <div class="">
                <input placeholder="Add doctor" autocomplete="off" class="poly-doctor-add append hover:bg-gray-200 bg-gray-100 disabled:bg-transparent my-0.5 pl-1.5 border-l border-blue-500 outline-none w-full">
              </div>
            </div>
            <input type="submit" class="poly-submit mt-1 px-4 w-full h-8 rounded border text-md bg-gray-50 border-blue-400 focus:bg-gray-200 focus:border hover:bg-gray-200 transition-colors">
          </form>
        </div>
      </div>
    @endif
  </div>
</div>