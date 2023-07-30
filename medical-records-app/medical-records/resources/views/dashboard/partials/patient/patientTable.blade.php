<table id="patientTable" class="table-auto w-full md:w-11/12 mx-auto text-left rounded-xl bg-white">
  <thead>
    <tr class="border-b border-blue-400">
      <th class="py-1.5 px-3">Code</th>
      <th class="py-1.5 px-3">Name</th>
      <th class="py-1.5 px-3">Age</th>
      <th class="py-1.5 px-3">Gender</th>
      @if ($route == 'patient')
        <th class="py-1.5 px-3">Phone number</th>  
      @endif
      <th class="py-1.5 px-3">Status</th>
      <th class="py-1.5 px-3">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($patients as $patient)
      <tr class="border-b border-blue-400 hover:bg-gray-100">
        <td class="patient-code pt-2.5 pb-1.5 px-3">{{ $patient->patient_code }}</td>
        <td class="patient-name pt-2.5 pb-1.5 px-3">{{ $patient->patient_name }}</td>
        <td class="patient-age pt-2.5 pb-1.5 px-3">{{ $patient->patient_age }}</td>
        <td class="patient-gender pt-2.5 pb-1.5 px-3">{{ $patient->patient_gender }}</td>
        @if ($route == 'patient')
          <td class="pt-2.5 pb-1.5 px-3">{{ $patient->patient_number }}</td>
        @endif
        <td class="pt-2 pb-1.5 px-3">
          <span class="bg-gradient-to-r px-2 rounded pb-0.5
          {{ $patient->patient_status === 'waiting'? 'from-teal-400 to-green-300' : 
          ($patient->patient_status === 'consulting'? 'from-yellow-300 to-lime-200' : 
            ($patient->patient_status === 'finished'? 'from-indigo-300 to-cyan-400' : '')
          )
          }}
          ">{{ $patient->patient_status }}</span>
        </td>
        {{-- <td class="pt-2.5 pb-1.5 px-3">{{ Str::limit($patient->patient_status, 50) }}</td> --}}
        {{-- <td class="pt-2.5 pb-1.5 px-3">{{ ($patient->patientPayment->total_payment)? "{$patient->patientPayment->total_payment}" : 'Unpaid' }}</td>
        <td class="pt-2.5 pb-1.5 px-3">{{ $patient->patientPayment->payment_date }}</td> --}}
        @if ($route !== 'patient')
          <td>
            <button type="button" class="patient-select-patient bg-green-500 hover:bg-green-700 inline-block px-1 mt-2 cursor-pointer rounded text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-7"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
          </td>
        @else
          <td>
            <a class="inline-block px-1.5 mt-2 cursor-pointer bg-green-500 rounded text-white hover:bg-green-700" title="view" href="/patient/{{ $patient->patient_code }}">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </a>
            <a class="inline-block px-1.5 mt-2 cursor-pointer bg-yellow-500 rounded text-white hover:bg-yellow-700" title="edit/delete" href="/patient/{{ $patient->patient_code }}/edit">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </a>
          </td>
        @endif
      </tr>
    @endforeach
    <tr>
      <td colspan="7" class="py-1.5">
        {{ $patients->links() }}
      </td>
    </tr>
  </tbody>
</table>