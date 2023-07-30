  @csrf
  <table id="medicineTable" class="table-auto w-full md:w-11/12 table mx-auto">
    <thead>
      <tr class="text-left border-b border-blue-500">
        <th class="pb-2 px-2 pt-3">Code</th>
        <th class="pb-2 px-2 pt-3">Medicine Name</th>
        <th class="pb-2 px-2 pt-3">Category</th>
        <th class="pb-2 px-2 pt-3">Medicine Type</th>
        <th class="pb-2 px-2 pt-3">Medicine Price</th>
        <th class="pb-2 px-2 pt-3">Stock</th>
        <th class="pb-2 px-2 pt-3">Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($medicines as $medicine)
        <tr class="hover:bg-gray-100 border-b border-blue-500">

          <td class="px-2 pt-2.5 pb-2">
            <input class="id bg-transparent w-12 outline-none" type="text" readonly="true" name="medicine_code" value="{{ $medicine->medicine_code }}">
          </td>
          <td class="px-2 pt-2.5 pb-2">
            <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="text" class="input-update bg-transparent w-56 focus:bg-gray-200 hover:bg-gray-200" name="medicine_name" title="{{ $medicine->medicine_name }}" value="{{ $medicine->medicine_name }}">
          </td>
            <td class="px-2 pt-2.5 pb-2">
              <select title="{{ $medicine->category }}" @if ($route !== 'medicine') disabled  @endif name="category" class="input-update input-select bg-transparent w-24 focus:bg-gray-200 hover:bg-gray-200">
                <option value="free medicine" {{ $medicine->category == 'free medicine'? 'selected' : ''  }}>Free medicine</option>
                <option value="limited free" {{ $medicine->category == 'limited free'? 'selected' : ''  }}>Limited free</option>
                <option value="drugs" {{ $medicine->category == 'drugs'? 'selected' : ''  }}>Drugs</option>
                <option value="herbs" {{ $medicine->category == 'herbs'? 'selected' : ''  }}>Herbs</option>
              </select>
            </td>
            <td class="px-2 pt-2.5 pb-2">
              <div class="input-group my-2.5 dropdown-drop mx-4 relative">
                <button title="tablet/kaplet/kapsul/pil/sirup/salep/supositoria/krim/tetes" class="dropdown w-24 flex justify-between items-center hover:bg-gray-200 placeholder:text-gray-500" type="button">
                  <input class="input-update input-select w-full parent-value bg-transparent placeholder:text-black" @if ($route !== 'medicine') disabled  @endif name="medicine_type" style="pointer-events: none" value="{{ $medicine->medicine_type }}" placeholder="-- Medicine type --">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 inline-block text-black"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button> 
                @if ($route == 'medicine')
                  <div class="dropdown-item bg-white w-60 border max-h-[13rem] overflow-auto border-black shadow-md absolute top-full left-0 hidden z-20">
                    <p class="child-value cursor-pointer px-4">-- medicine_type --</p>
                    @foreach ($medicine_types as $medicine_type)
                      <p class="child-value cursor-pointer px-4 hover:bg-gray-200 {{ $medicine_type->medicine_type == $medicine->medicine_type? 'bg-blue-400' : '' }}">{{ $medicine_type->medicine_type }}</p>
                    @endforeach
                    <p class="child-value dropdown-special hover:bg-gray-200 rounded px-4">Add new - <input type="text" class="dropdown-input px-3 my-0.5 rounded border-b-2 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500"></p>
                  </div>
                @endif
              </div>
            </td>
            <td class="px-2 pt-2.5 pb-2">
              <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="number" class="input-update bg-transparent w-16 focus:bg-gray-200 hover:bg-gray-200" name="medicine_price" step="1000" value="{{ $medicine->medicine_price }}">
            </td>
            <td class="px-2 pt-2.5 pb-2">
              <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="number" class="w-16 input-update bg-transparent focus:bg-gray-200 hover:bg-gray-200" name="stock" value="{{ $medicine->stock }}">
            </td>          

          <td class="px-2 pt-2.5 pb-2">
            @if ($route == 'patient' || $route == 'prescription')
              <button type="button" class="{{ $medicine->stock > 0? 'mds-select-medicine bg-green-500 hover:bg-green-700' : 'bg-gray-500' }} inline-block px-1 mt-2 cursor-pointer rounded text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-7"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </button>
            @else
              <a href="/medicine/{{ $medicine->medicine_code }}/edit">
                <button type="button" class="inline-block px-1.5 mt-2 cursor-pointer bg-yellow-500 rounded text-white hover:bg-yellow-700">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                </button>
              </a>
              <form action="/medicine/{{ $medicine->medicine_code }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Delete {{ $medicine->medicine_name }} from medicine?')" class="inline-block px-1.5 mt-2 cursor-pointer bg-red-500 rounded text-white hover:bg-red-700" href="/medicine/{{ $medicine->medicine_code }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
    <tr>
      <td colspan="7" class="py-2">{{ $medicines->links() }}</td>
    </tr>
  </table>
@if ($route == 'medicine')
  <input type="submit" hidden>
@endif

@once
  @push('scripts')
  <script id="message"></script>
    <script>
      $(document).on('keypress input', '.input-update', function (e) {
        const column_value_original = $(this).attr('value')
        const token = $('input[name="_token"]').val()
        const id = $(this).parents('tr').find('.id').val()
        const column_name = $(this).attr('name')
        const column_value = $(this).val()
        if (e.which == 13) {
          if (column_value_original === column_value) {
            alert('No change')
          } else {
            table_update($(this), token, id, column_name, column_value)
          }
        }
        if ($(e.target).hasClass('input-select')) {
          table_update($(this), token, id, column_name, column_value)
        }
        function table_update(el, token, id, column_name, column_value) {
          $.ajax({
            url: '/medicine/table_update',
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