@extends('dashboard.layouts.main')
@section('container')
  <div>  
    <div class="w-[300px] m-auto print:bg-black" id="printArea">
      <ul>
        <li class="flex justify-between">
          <span>Nama patient</span>
          <span>asdfasdf</span>
        </li>
        <input type="button" onclick="print()" value="print a div!" />
      </ul>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function print() {
      const printArea = $('#printArea')
      $(document.body).html(printArea);
      window.print()
    }
  </script>
@endpush