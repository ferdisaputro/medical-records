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
        {{-- @if ($route == 'medicine') --}}
        <form action="/medicine/{{ $medicine->medicine_code }}" method="post" class="inline">
          @csrf
          @method('put')
        {{-- @endif --}}

          <input type="hidden" name="route" value="index">
          <input type="hidden" name="medicine_code_index" value="{{ $medicine->medicine_code }}">
          <td class="px-2 pt-2.5 pb-2">{{ $medicine->medicine_code }}</td>
          <td class="px-2 pt-2.5 pb-2">
            <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="text" class="bg-transparent w-56 focus:bg-gray-200 hover:bg-gray-200" name="medicine_name_index" title="{{ $medicine->medicine_name }}" value="{{ $medicine->medicine_name }}">
          </td>
          <td class="px-2 pt-2.5 pb-2">
            <select readonly="true" title="{{ $medicine->category }}" onchange="this.form.submit()" name="category_index" class="bg-transparent w-24 focus:bg-gray-200 hover:bg-gray-200">
              <option value="free medicine" {{ $medicine->category == 'free medicine'? 'selected' : ''  }}>Free medicine</option>
              <option value="limited free" {{ $medicine->category == 'limited free'? 'selected' : ''  }}>Limited medicine</option>
              <option value="drugs" {{ $medicine->category == 'drugs'? 'selected' : ''  }}>Drugs</option>
              <option value="herbs" {{ $medicine->category == 'herbs'? 'selected' : ''  }}>Herbs</option>
            </select>
          </td>
          <td class="px-2 pt-2.5 pb-2">
            <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="text" class="bg-transparent w-20 focus:bg-gray-200 hover:bg-gray-200" name="medicine_type_index" title="{{ $medicine->medicine_type }}" value="{{ $medicine->medicine_type }}">
          </td>
          <td class="px-2 pt-2.5 pb-2">
            <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="number" class="bg-transparent w-16 focus:bg-gray-200 hover:bg-gray-200" name="medicine_price_index" step="1000" value="{{ $medicine->medicine_price }}">
          </td>
          <td class="px-2 pt-2.5 pb-2">
            <input readonly="true" @if ($route == 'medicine') ondblclick="readOnly=false" @endif required type="number" class="w-16 bg-transparent focus:bg-gray-200 hover:bg-gray-200" name="stock_index" value="{{ $medicine->stock }}">
          </td>
          {{-- @if ($route == 'medicine') --}}
            <input type="submit" hidden>
          </form>  
          {{-- @endif --}}
          

        <td class="px-2 pt-2.5 pb-2">
          @if ($route == 'patient')
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
              <button type="submit" onclick="return confirm('Delete data?')" class="inline-block px-1.5 mt-2 cursor-pointer bg-red-500 rounded text-white hover:bg-red-700" href="/medicine/{{ $medicine->medicine_code }}">
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