
<table class="w-11/12 table mx-auto">
  <tr class="text-left border-b border-blue-500">
    <th class="pb-2 px-2 pt-3">Prescript number</th>
    @if ($route == 'prescription')
      <th class="pb-2 px-2 pt-3">Patient</th>
    @endif
    <th class="pb-2 px-2 pt-3">Poly</th>
    <th class="pt-2 pb-2 px-2">Doctor name</th>
    <th class="pb-2 px-2 pt-3">Consult result</th>
    @if ($route == 'patient')
      <th class="pb-2 px-2 pt-3">Total payment</th>
    @endif
    <th class="pb-2 px-2 pt-3">Created at</th>
    <th class="pb-2 px-2 pt-3">Action</th>
  </tr>
  @foreach ($prscs as $prsc)
    <tr class="hover:bg-gray-100 border-b border-blue-500">
      <td class="pt-2.5 pb-2 px-2">{{ $prsc->prsc_number }}</td>
      @if ($route == 'prescription')
        <td class="pt-2.5 pb-2 px-2">{{ $prsc->prscPatient->patient_name }}</td>  
      @endif
      <td class="pt-2.5 pb-2 px-2">{{ $prsc->prscPoly->poly_name }}</td>
      <td class="pt-2.5 pb-2 px-2">{{ $prsc->prscDoctor->doctor_name }}</td>
      <td class="pt-2.5 pb-2 px-2" title="{{ $prsc->consult_result?? '-' }}">{{ Str::limit($prsc->consult_result?? '-', 40, '...') }}</td>
      @if ($route == 'patient')
        <td class="pb-2 px-2 pt-3">{{ $prsc->prscPayment->total_payment }}</td>
      @endif
      <td class="pt-2.5 pb-2 px-2">{{ date_format($prsc->created_at, 'y-m-d') }}</td>
      <td>
      <a class="inline-block px-1.5 mt-2 cursor-pointer bg-green-500 rounded text-white hover:bg-green-700" href="/prescription/{{ $prsc->prsc_number }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
      </a>
      <a class="inline-block px-1.5 mt-2 cursor-pointer bg-yellow-500 rounded text-white hover:bg-yellow-700" href="/prescription/{{ $prsc->prsc_number }}/edit">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
      </a>
      </td>
    </tr>
  @endforeach
  <tr>
    <td colspan="7" class="py-2">
      @if ($route == 'patient')
        <button type="button" class="prescription-add border-2 w-full border-blue-400 bg-gray-50 py-1.5 rounded text-gray-500 hover:bg-gray-200 focus:bg-gray-200"><span data-feather="plus" class="w-7 m-auto"></span></button>
      @endif
      @if ($route == 'prescription')
        {{ $prscs->links() }}
      @endif
    </td>
  </tr>
</table>
<div class="prescription-container hidden overflow-hidden fixed top-0 right-0 left-0 lg:left-52 bottom-0 bg-black/40 z-50">
  <button class="prescription-close text-2xl py-1.5 px-2.5 text-white rounded absolute top-10 right-6" type="button">X</button>
  <div class="prescription-item w-10/12 py-10 overflow-y-auto bg-white rounded-lg overflow-auto absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
    @include('dashboard.partials.prescription.prescriptionCreate')
  </div>
</div>
  
  @once
  @push('scripts')
    <script>
      $(document).ready(function(){
        $(document).on('click', function (e) {
          const $e = $(e.target)
          if ($e.hasClass("prescription-add")) {
            $('.prescription-container').fadeIn('fast')
          } else if ($e.hasClass("prescription-container") || $(e.target).hasClass("prescription-close")) {
            $('.prescription-container').fadeOut('fast')
          }
        })
      })
    </script>
  @endpush
@endonce