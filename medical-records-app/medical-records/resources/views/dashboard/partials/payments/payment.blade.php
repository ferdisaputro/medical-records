<div class="wrapper bg-white rounded-lg py-3 overflow-hidden relative">
  @if ($prsc->prscPatient->patient_status == 'finished' || $prsc->prscPatient->patient_status == 'waiting')
    <div class="absolute top-0 bottom-0 right-0 left-0 bg-black/20 z-20 flex items-center justify-center print:hidden">
      <h1 class="text-2xl text-white drop-shadow-md">patient status 'finished'</h1>
    </div>
  @endif
  <span class="text-4xl block font-semibold ml-9">Payment</span>
  <form action="/payment/{{ $prsc->prscPayment->payment_number }}" method="post" class="mx-4 grid grid-cols-2 py-2">
    @csrf
    {{-- @dd($patient->patientDetail) --}}
    @foreach ($prsc->prscDetail as $detail)
      <input type="hidden" name="detail[{{ $loop->iteration }}][medicine_code]" value="{{ $detail->medicine_code }}">
      <input type="hidden" name="detail[{{ $loop->iteration }}][pcs]" value="{{ $detail->pcs }}">
    @endforeach
    <input type="hidden" name="patient_code" value="{{ $prsc->patient_code }}">
    <div class="my-1 relative mt-5">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Medicine price</label>
      <input required type="number" readonly="true" value="{{ $prsc->total_payment }}" class="medicine-price w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>
    <div class="my-1 relative mt-5 ">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Doctor fee</label>
      <input required type="number" value="{{ $prsc->prscDoctor->fee }}" name="aditional_cost" class="fee w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>
    <div class="my-1 relative mt-5">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Aditional cost</label>
      <input type="number" value="{{ $prsc->prscRegistration->fee }}" class="aditional-cost w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>
    <div class="my-1 relative mt-5">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Total</label>
      <input required type="number" readonly="true" name="total_payment" class="total-payment w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>
    <hr class="col-span-2 mt-3">
    <div class="my-1 relative mt-5">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Cash</label>
      <input required type="number" name="cash" placeholder="{{ ($prsc->prscPayment->total_payment)? "Paid Rp.{$prsc->prscPayment->cash}" :"" }}" class="cash w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>
    <div class="my-1 relative mt-5">
      <label class="ml-2 absolute -top-3.5 inline-block px-1 border border-blue-500 rounded bg-white text-sm">Change</label>
      <input required type="number" name="change" readonly="true" placeholder="{{ ($prsc->prscPayment->change)? "Change Rp.{$prsc->prscPayment->change}" : '-' }}" class="change w-full md:w-11/12 px-4 rounded border-b-2 h-11 bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
    </div>

    <div class="flex col-span-2 print:hidden relative">
      <input type="submit" value="Payment" class="w-52 mr-1.5 mt-3 h-10 border-2 border-blue-400 bg-gray-50 rounded-lg text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
      <button type="button" {{ $prsc->prscPayment->cash == null? 'disabled' : '' }} class="print border-2 relative {{ $prsc->prscPayment->cash == null? 'opacity-75' : 'z-30' }} inline-block border-blue-400 bg-gray-50 py-1.5 px-3 w-52 mt-3 rounded-lg h-10 text-center text-gray-500 hover:bg-gray-200 ">Print</button>
    </div>

  </form>
</div>

@once
  @push('scripts')
      <script>
        $(document).ready(function() {
          // payment script
          const totalPayment = [$('.medicine-price'), $('.aditional-cost'), $('.fee')]
          updateTotalPayment(totalPayment)
          let globalTimeout = null
          totalPayment.forEach(e => {
            $(e).on('input', function () {
              if(globalTimeout != null) clearTimeout(globalTimeout);  
                globalTimeout =setTimeout(updateTotalPayment, 350, [$('.medicine-price'), $('.aditional-cost'), $('.fee')]);
            })
          });

          $('.cash').on('input', function (e1) {
            const cash = Number($('.cash').val())
            const totalPayment = Number($('.total-payment').val())
            const change = cash - totalPayment
            updateCash(cash, change, totalPayment)
          })

          $('.print').click(function (e) {
            window.print()
          })

          function updateCash(cash, change, totalPayment) {
            if (cash <= totalPayment) {
              $('.change').val('-')          
            } else {
              $('.change').val(change)
            }
          }
          function updateTotalPayment(payments) {
            // console.log('true');
            let curPaymentTotal = 0
            payments.forEach(e => {
              curPaymentTotal += Number($(e).val())
            });
            $('.total-payment').val(curPaymentTotal)
          }
        })
        
      </script>
  @endpush
@endonce