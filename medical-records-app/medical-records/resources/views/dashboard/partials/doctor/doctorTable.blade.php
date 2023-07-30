<table id="doctorTable" class="w-11/12 table mx-auto">
<thead>
  <tr class="border-b border-blue-400">
    <th class="py-1.5 px-2">Code</th>
    <th class="py-1.5 px-2">Name</th>
    <th class="py-1.5 px-2">Phone number</th>
    <th class="py-1.5 px-2">Specialist</th>
    <th class="py-1.5 px-2">Poly</th>
    <th class="py-1.5 px-2">Fee</th>
    <th class="py-1.5 px-2">Address</th>
    <th class="py-1.5 px-2">Action</th>
  </tr>
</thead>

<tbody>
  @foreach ($doctors as $doctor)
    <tr class="hover:bg-gray-100 border-b border-blue-500">
    
    {{-- @if ($route == 'doctor')
    <form action="/doctor/{{ $doctor->doctor_code }}" method="post"> --}}
        @csrf
        {{-- @method('put')
    @endif --}}

        <td class="px-2 pt-2.5 pb-2">
          <input readonly="true" required type="text" class="id bg-transparent w-12 outline-none" name="doctor_code" title="{{ $doctor->doctor_code }}" value="{{ $doctor->doctor_code }}">
        </td>
        <td class="px-2 pt-2.5 pb-2">
          <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="text" class="input-update bg-transparent w-32 focus:bg-gray-200 hover:bg-gray-200" name="doctor_name" title="{{ $doctor->doctor_name }}" value="{{ $doctor->doctor_name }}">
        </td>
        <td class="px-2 pt-2.5 pb-2">
          <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="text" class="input-update bg-transparent w-32 focus:bg-gray-200 hover:bg-gray-200" name="doctor_number" title="{{ $doctor->doctor_number }}" value="{{ $doctor->doctor_number }}">
        </td>
        <td class="px-2 pt-2.5 pb-2">
          {{-- <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="text" class="bg-transparent w-20 focus:bg-gray-200 hover:bg-gray-200" name="specialist" title="{{ $doctor->specialist }}" value="{{ $doctor->specialist }}"> --}}
          <div class="input-group my-2.5 w-16 dropdown-drop mx-4 relative">
            <button title="tablet/kaplet/kapsul/pil/sirup/salep/supositoria/krim/tetes" class="dropdown w-full flex justify-between items-center hover:bg-gray-200 placeholder:text-gray-500" type="button">
              <input class="input-update input-select w-full parent-value bg-transparent placeholder:text-black" @if ($route !== 'doctor') disabled  @endif name="specialist" style="pointer-events: none" value="{{ $doctor->specialist }}" placeholder="-- Medicine type --">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 inline-block text-black"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button> 
            @if ($route == 'doctor')
              <div class="dropdown-item text-left bg-white w-60 max-h-[13rem] overflow-auto border border-black shadow-md absolute top-full left-0 hidden z-20">
                <p class="child-value cursor-pointer px-4">-- Doctor Specialist --</p>
                @foreach ($specialists as $specialist)
                  <p class="child-value cursor-pointer px-4 hover:bg-gray-200 {{ $specialist->specialist == $doctor->specialist? 'bg-blue-400' : '' }}">{{ $specialist->specialist }}</p>
                @endforeach
                <p class="child-value dropdown-special cursor-pointer rounded hover:bg-gray-200 px-4">Add new - <input type="text" class="dropdown-input px-3 my-0.5 rounded border-b-2 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500"></p>
              </div>
            @endif
          </div>
        </td>
        <td class="px-2 pt-2.5 pb-2">
          {{-- <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="text" class="bg-transparent w-24 focus:bg-gray-200 hover:bg-gray-200" name="poly_code" title="{{ $doctor->poly_code }}" value="{{ $doctor->doctorPoly->poly_name }}"> --}}
          <select {{ $route !== 'doctor'? 'disabled' : '' }} name="poly_code" id="poly_code" class="input-update input-select bg-transparent w-24 focus:bg-gray-200 hover:bg-gray-200">
            @if (!$doctor->poly_code)
              <option value="">Unsign</option>
            @endif
            @foreach ($polies as $poly)
              <option value="{{ $poly->poly_code }}" {{ $doctor->poly_code == $poly->poly_code? 'selected' : '' }}>{{ $poly->poly_name }}</option>
            @endforeach
          </select>
        </td>
        <td class="px-2 pt-2.5 pb-2">
          <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="number" class="input-update bg-transparent w-16 focus:bg-gray-200 hover:bg-gray-200" name="fee" value="{{ $doctor->fee }}">
        </td>
        <td class="px-2 pt-2">
          <textarea readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif name="doctor_address" class="input-update bg-transparent w-24 h-min focus:bg-gray-200 hover:bg-gray-200">{{ $doctor->doctor_address }}</textarea>
          {{-- <input readonly="true" @if ($route == 'doctor') ondblclick="readOnly=false" @endif required type="text" class="bg-transparent w-24 focus:bg-gray-200 hover:bg-gray-200" name="doctor_address" title="{{ $doctor->doctor_address }}" value="{{ $doctor->doctor_address }}"> --}}
        </td>

    {{-- @if ($route == 'doctor')
        <input type="submit" hidden>
    </form>  
    @endif --}}

    <td class="px-2 pt-2.5 pb-2">
        @if ($route == 'poly')
          <button type="button" {{ $doctor->poly_code == null? '' : 'disabled' }} class="{{ $doctor->poly_code == null? 'poly-select-doctor' : '' }} bg-green-500 hover:bg-green-700 disabled:bg-gray-500 disabled:cursor-default inline-block px-1 mt-2 cursor-pointer rounded text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-7"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
          </button>
        @else
        <a href="/doctor/{{ $doctor->doctor_code }}/edit">
          <button type="button" class="inline-block px-1.5 mt-2 cursor-pointer bg-yellow-500 rounded text-white hover:bg-yellow-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
          </button>
        </a>
        <form action="/doctor/{{ $doctor->doctor_code }}" method="post" class="inline">
          @method('delete')
          @csrf
          <button onclick="return confirm('Delete {{ $doctor->doctor_name }} from doctor?')" type="submit" class="inline-block px-1.5 mt-2 cursor-pointer bg-red-500 rounded text-white hover:bg-red-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
          </button>
        </form>
        @endif
    </td>
    </tr>
  @endforeach
</tbody>
<tr>
  <td colspan="8" class="py-2">{{ $doctors->links() }}</td>
</tr>
</table>

@once
  @push('scripts')
  <script id="message"></script>
    <script>
      $(document).on('keyup input', '.input-update', function (e) {
        const column_value_original = $(this).attr('value')
        const token = $('input[name="_token"]').val()
        const id = $(this).parents('tr').find('input[name="doctor_code"]').val()
        const column_name = $(this).attr('name')
        const column_value = $(this).val()

        if (e.which == 13) {
          if (column_value_original === column_value) {
            alert('No change')
          } else {
            doctor_table_update($(this), token, id, column_name, column_value)
          }
        }
        if ($(e.target).hasClass('input-select')) {
          doctor_table_update($(this), token, id, column_name, column_value)
        }
        function doctor_table_update(el, token, id, column_name, column_value) {
          $.ajax({
            url: '/doctor/table_update',
            method: 'POST',
            data: {id: id, column_name: column_name, column_value: column_value, _token: token},
            success:function (data) {
              $('#message').html(data)
              el.prop('disabled', true)
              el.prop('disabled', false)
            }
          })
        }     
      })
    </script>

  @endpush
@endonce