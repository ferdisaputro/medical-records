  <div class="wrapper rounded-lg p-4 relative overflow-hidden">
    <span class="absolute top-0 right-0">
      <a class="inline-block p-1.5 cursor-pointer bg-red-500 rounded text-white hover:bg-red-700" title="edit/delete" href="/patient/{{ $prsc->patient_code?? $patient->patient_code }}/edit">
        <span data-feather="edit" class="h-6 w-6"></span>
      </a>
    </span>
    <span class="font-semibold text-xl">Patient's data</span>
    <ul>
      <li class="flex items-center text-left my-0.5">
        <span class="w-20">Code</span>
        <span>: {{ $prsc->prscPatient->patient_code?? $patient->patient_code }}</span>
      </li>
      <li class="flex items-center text-left my-0.5">
        <span class="w-20">Name</span>
        <span>: {{ $prsc->prscPatient->patient_name?? $patient->patient_name }}</span>
      </li>
      <li class="flex items-center text-left my-0.5">
        <span class="w-20">Gender</span>
        <span>: {{ $prsc->prscPatient->patient_gender?? $patient->patient_gender }}</span>
      </li>
      <li class="flex items-center text-left my-0.5">
        <span class="w-20">Age</span>
        <span>: {{ $prsc->prscPatient->patient_age?? $patient->patient_age }}</span>
      </li>
      <li class="flex items-center text-left my-1">
        <span class="w-20">Status</span>
        @include('dashboard.partials.patientStatus')
      </li>
      @if ($route == 'prescription')
        <li class="flex items-center text-left mb-1.5 mt-2">
          <form class="w-full">
            @csrf
            @method('put')
            <input type="hidden" name="prsc_number" value="{{ $prsc->prsc_number }}">
            <span>consultation result :</span>
            <textarea type="text" {{ $prsc->prscPatient->patient_status == 'consulting'? '' : 'disabled' }} class="consult_result px-4 py-2 h-16  w-10/12 rounded border-b-2 bg-gray-50 @error('consult_result') {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror disabled:border-b-gray-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500 disabled:opacity-75" name="consult_result" placeholder="consult_result" id="consult_result">{{ $prsc->consult_result?? '' }}</textarea>
            @error('consult_result')
              <label for="consult_result" class="text-red-500 text-left text-sm ml-3">
                  <span data-feather="alert-circle" class="text-center inline mb-1 w-4 h-4"></span>
                  {{ $message }}
              </label>
            @enderror
          </form>
        </li>
      @endif
    </ul>
  </div>
</section>

@once
  @push('scripts')
    <script>
      $(document).ready(function() {
        $('.consult_result').on('keypress blur', function (e) {
          if (e.which == 13 || e.type == 'blur') {
            e.preventDefault()
            const column_value_original = $(this).text()
            const token = $(this.form).find('input[name="_token"]').val()
            const prsc_number = $(this.form).find('input[name="prsc_number"]').val()
            const column_name = $(this).attr('name')
            const column_value = $(this).val()
            if (column_value_original !== column_value) {
              $.ajax({
                url: '/prescription/table_update',
                method: 'POST',
                data: {id: prsc_number, column_name: column_name, column_value: column_value, _token: token},
                success:function(data) {
                  alert('Consultation result updated')
                  $(e.target).text(column_value);
                  document.activeElement.blur()
                }
              })
            }
          }
        })
      })
    </script>
  @endpush
@endonce