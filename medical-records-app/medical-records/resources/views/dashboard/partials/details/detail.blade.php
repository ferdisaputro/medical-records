<div class="wrapper bg-white rounded-lg relative overflow-hidden py-3 print:py-0">
   
   @if ($patient->patient_status == 'waiting' || $patient->patient_status == 'finished')
      <div class="absolute top-0 bottom-0 right-0 left-0 bg-black/50 z-20 flex items-center justify-center print:hidden">
         <h1 class="text-2xl text-white drop-shadow-md">Patient status has to "Consulting" to be able to edit this section</h1>
      </div>
   @endif
   <span class="text-4xl block font-semibold ml-9">Medicines</span>
   <input type="number" min="{{ $patient->patientDetail->count() }}" value="1" class="mds-input print:hidden ml-9 w-60 px-4 my-2 py-2 rounded border-b-2 bg-gray-50 focus:bg-gray-200 border-b-blue-400 box-border focus:border-blue-500 hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500">
   
   <div class="pb-2">

      {{-- medicine data --}}
      <div class="mds-container hidden overflow-hidden fixed top-0 right-0 left-0 lg:left-52 bottom-0 bg-black/40 z-50">
         <button class="mds-close text-2xl py-1.5 px-2.5 text-white rounded absolute top-10 right-6" type="button">X</button>
         <div class="mds-item w-10/12 h-5/6 overflow-y-auto bg-white rounded-lg overflow-auto absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            @include('dashboard.partials.medicine.medicine')
         </div>
      </div>

      <form action="/detail" method="post" id="detail" class="px-4">
      @csrf
      <div class="detail-container">
         <input type="hidden" name="patient_code" value="{{ $patient->patient_code }}">
         <input type="hidden" name="prsc_number" value="{{ $patient->patientPrsc->prsc_number }}">
         <input type="hidden" name="prsc_date" value="{{ now() }}">
         <?php $i = 0 ?>
         @if ($patient->patientDetail->count() > 0)
            @foreach ($patient->patientDetail as $detail)
            <div class="px-2 py-1 mds-card flex justify-start md:justify-evenly flex-wrap items-center {{ ($i%2 == 1)? "bg-gray-100" : "" }}">
               <input type="hidden" name="detail[{{ $i }}][route]" value="database">
               <input type="hidden" name="detail[{{ $i }}][id]" value="{{ $detail->id }}">
               <div class="my-1">
                  <label for="medicine_code" class="md:ml-2">Medicine : </label>
                  <input type="text" name="detail[{{ $i }}][medicine_code]" hidden id="medicine_code" value="{{ $detail->detailMedicine->medicine_code }}" class="mds-code w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">
                  <input type="text" value="{{ $detail->detailMedicine->medicine_name }}" class="mds-select print:h-fit print:border-0 w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">
               </div>
               
               <div class="my-1">
                  <label for="dose" class="md:ml-2">Dose : </label>
                  <input required type="text" class="w-36 print:h-fit print:border-0 px-4 rounded border-b-2 h-11 @error("dose") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail[{{ $i }}][dose]" value="{{ $detail->dose }}">
                  @error("dose")
                  <label for="patient_number" class="text-red-500 text-sm ml-3">
                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>
                     {{ $message }}
                  </label>
                  @enderror
               </div>

               <div class="my-1">
                  <label for="pcs" class="md:ml-2">Pcs : </label>
                  <input required type="number" class="mds-pcs print:h-fit print:border-0 w-16 pl-3 pr-1 rounded border-b-2 h-11 @error("pcs") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail[{{ $i }}][pcs]" min="1" value="{{ $detail->pcs }}">
                  @error("dose")
                  <label for="patient_number" class="text-red-500 text-sm ml-3">
                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>
                     {{ $message }}
                  </label>
                  @enderror
               </div>

               <div class="my-1">
                  <label for="sub_total" class="md:ml-2">Sub Total : </label>
                  <input readonly type="text" class="sub-total print:h-fit print:border-0 w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none" name="detail[{{ $i }}][sub_total]" value="{{ $detail->sub_total }}">
               </div>

               <a href="" class="delete cursor-pointer print:hidden text-white inline-block px-2.5 py-0.5 rounded hover:bg-red-700 duration-200 bg-red-500 font-semibold" data-key="{{ $detail->id }}" title="delete medicine">X</a>

            </div>
            <?php $i++ ?>
         @endforeach
         @else
            <div class="px-2 py-1 mds-card flex justify-start md:justify-evenly flex-wrap items-center ">               <div class="my-1">                  <label for="medicine_code" class="md:ml-2">Medicine : </label>                  <input type="text" name="detail[{{ $i }}][medicine_code]" hidden id="medicine_code" class="mds-code w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">                  <input type="text" class="mds-select w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">                  {{-- medicine data --}}               </div>                              <div class="my-1">                  <label for="dose" class="md:ml-2">Dose : </label>                  <input required type="text" class="w-36 px-4 rounded border-b-2 h-11 @error("dose") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail[{{ $i }}][dose]">                  @error("dose")                  <label for="patient_number" class="text-red-500 text-sm ml-3">                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>                     {{ $message }}                  </label>                  @enderror               </div>               <div class="my-1">                  <label for="pcs" class="md:ml-2">Pcs : </label>                  <input required type="number" class="mds-pcs w-16 pl-3 pr-1 rounded border-b-2 h-11 @error("pcs") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail[{{ $i }}][pcs]" min="1" value="1">                  @error("dose")                  <label for="patient_number" class="text-red-500 text-sm ml-3">                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>                     {{ $message }}                  </label>                  @enderror               </div>               <div class="my-1">                  <label for="sub_total" class="md:ml-2">Sub Total : </label>                  <input readonly type="text" class="sub-total w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none" name="detail[{{ $i }}][sub_total]">               </div>               <button type="button" class="remove cursor-pointer text-white inline-block px-2.5 py-0.5 rounded hover:bg-yellow-700 duration-200 bg-yellow-500 font-semibold" title="remove medicine">X</button>            </div>
            <?php $i++ ?>
         @endif
      </div>
      <div class="my-1 flex">
         <div class="mds-add print:hidden py-2 border-2 w-52 mr-1.5 border-blue-400 rounded-lg flex justify-center items-center h-10 hover:bg-blue-200 duration-200 text-gray-500 hover:text-gray-800">
            <span data-feather="plus" class="w-5 h-5"></span>
         </div>
         <input type="submit" value="Save" class="save print:hidden disabled:opacity-50 w-52 mr-1.5 h-10 border-2 border-blue-400 bg-gray-50 rounded-lg text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200" id="submit-detail" form="detail">
         <input type="reset" class="reset print:hidden w-52 mr-1.5 h-10 border-2 border-blue-400 bg-gray-50 rounded-lg text-gray-500 hover:bg-gray-200 focus:bg-gray-200 focus:border-blue-400 visited:bg-gray-200">
         <div class="input-group ml-auto">
            <label>Total : </label>
            <input type="text" id="total" readonly class="total ml-auto w-44 px-4 rounded border-b-2 h-10 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none" name="total_payment" value="{{ $patient->patientPrsc->total_payment }}">
         </div>
      </div>
      </form>
   </div>
</div>
{{-- <select name="detail[{{ $i }}][medicine_code]" id="medicine_code" class="mds-select w-52 px-4 rounded border-b-2 h-11 bg-gray-50 border-b-blue-400 focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
   <option value="{{ $detail->detailMedicine->medicine_code }}">{{ $detail->detailMedicine->medicine_name }}</option>
</select> --}}
{{-- <select name="detail[{{ $i }}][medicine_code]" id="medicine_code" class="mds-select w-52 px-4 rounded border-b-2 h-11 bg-gray-50 @error("patient_gender") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500">
<option class="bg-gray-100" value="0">Select medicine</option>
@foreach ($medicines as $medicine)
<option value="{{ $medicine->medicine_code }}" class="{{  ($medicine->medicine_code == $detail->medicine_code)? 'bg-blue-200' : ''  }}" {{ ($detail->detailMedicine->medicine_name == $medicine->medicine_name)? "selected" : ""  }}>{{ $medicine->medicine_name }}</option>
@endforeach
</select> --}}

@push('scripts')

<script>
$(document).ready(function() {
   
   // detail script
   let loop = {!! $i !!}
   let validTotal = {!! ($patient->patientPrsc->total_payment)? "{$patient->patientPrsc->total_payment}" : "0" !!}
   let total = $('.total')
   validate()
   $('.delete').on('click', function (e) {
      const token = $(this).parents('form').find('input[name = _token]').val()
      const id = $(this).data('key')
      $.ajax({
         url: '/detail/'+id,
         method: 'post',
         data: {_token: token, id: id, _method: 'delete'},
         success:function () {
         }
      })
      // if (confirm("Delete data?")) {
      //    const id = $(e.target).data('key')
      //    const createDetails = $('#detail')
      //    const method = $('<input type="hidden" name="_method" value="delete">')
      //    createDetails.attr('action', '/detail/'+id)
      //    createDetails.append(method)
      //    $('#submit-detail').click()
      // }

   })
   $('.mds-input').val($('.mds-card').length);
   let $mdsSelect = ''
   $(document).on('click change', function (e) {
      const $e = $(e.target)
      if ($e.hasClass("mds-select")) {
         $mdsSelect = $e
         $('.mds-container').fadeIn('fast')
      } else if ($e.hasClass("mds-container") || $(e.target).hasClass("mds-close")) {
         $('.mds-container').fadeOut('fast')
      }

      if ($e.hasClass('mds-select-medicine')) {
            const $mdsDataSelect = $(e.target).parent().parent()
            const mdsCode = $mdsDataSelect.find('input[name = medicine_code]').val()
            const mdsName = $mdsDataSelect.find('input[name = medicine_name]').val()
            $mdsSelect.siblings('.mds-code').val(mdsCode)
            $mdsSelect.val(mdsName)
            $mdsSelect.siblings('.mds-code').trigger('click')
            $('.mds-container').fadeOut('fast')
         }

      if ($e.hasClass("mds-code")) {
         update($(e.target))
      }
      if ($e.hasClass("mds-pcs")) {
         $e.parent().parent().find('.mds-code').trigger('click')
      }

      if ($e.hasClass('reset')) {
         setTimeout(() => {
            validate()
         }, 10);
      }

      if ($e.hasClass('remove')) {
         const num = Number($e.parent().parent().parent().parent().siblings('.mds-input').val()) - 1
         $('.mds-input').val(num)
         $e.parent().remove();
         updateTotal()
      }
      if ($e.hasClass('mds-add')) {
         const num = Number($e.parent().parent().parent().siblings('.mds-input').val()) + 1
         $('.mds-input').val(num)
         $('.mds-input').trigger('change')
      }

      if ($e.hasClass('mds-input')) {
         if ($e.val() > $e.next().find('.detail-container').find('.mds-card').length) {
            add($e.val(), $(e.target));
            $('.notify').trigger('click')
            $e.val($e.next().find('.detail-container').find('.mds-card').length)
         } else if($e.val() < $e.next().find('.detail-container').find('.mds-card').length) {
            if (confirm("you sure to remove?")) {
               removeElement($e.val(), $(e.target));
               $e.val($e.next().find('.detail-container').find('.mds-card').length)
            } else {
               $e.val($e.next().find('.detail-container').find('.mds-card').length)
            }
         }
      }
   })
   // $('.mds-add-patient').on('click', (e) => {
   // })
   // $('.reset').on('click', function () {
   // })
   // $('.mds-pcs').on('change', function (e) {
   // })
   // $('.mds-add').on('click', function (e) {
   //    const num = Number($('.mds-input').val()) +1
   //    $('.mds-input').val(num)
   //    $('.mds-input').trigger('change')
   // })

   // $('.mds-input').on('change', function (e) {
      // if ($('.mds-input').val() > $('.mds-card').length) {
      //    add($('.mds-input').val(), $(e.target));
      //    $('.mds-input').val($('.mds-card').length)
      //    $('.notify').trigger('click')
      // } else {
      //    if (confirm("you sure to remove?")) {
      //    removeElement($('.mds-input').val(), $(e.target));
      //    $('.mds-input').val($('.mds-card').length)
      //    } else {
      //    $('.mds-input').val($('.mds-card').length)
      //    }
      // }
   // })

   function updateTotal(e) {
      const subTotal = $('input.sub-total')
      let curTotal = 0
      subTotal.each(function () {
         curTotal += Number($(this).val());
      });
      total.val(curTotal)
      validate()
   }
   function validate () {
      if (total.val() == validTotal) {
         $('.save').prop('disabled', true)
      } else {
         $('.save').prop('disabled', false)
      }
   }
   function update($e) {
      const medicineData = {!! $medicines_data !!};
      let $code = $e.val()
      let $pcs = $e.parent().parent().find('.mds-pcs').val()
      let $subTotal = $e.parent().parent().find('input.sub-total')
      medicineData.forEach(function (mdc) {
         if (mdc.medicine_code == $code) {             
         $subTotal.val(mdc.medicine_price * $pcs)
         }
      });
      updateTotal()
   }
   function add(amount, to) {
      const input = '<div class="px-2 py-1 mds-card flex justify-start md:justify-evenly flex-wrap items-center '+(loop % 2 == 1 ? "bg-gray-100" : "")+'">               <div class="my-1">                  <label for="medicine_code" class="md:ml-2">Medicine : </label>                  <input type="text" name="detail['+loop+'][medicine_code]" hidden id="medicine_code" class="mds-code w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">                  <input type="text" class="mds-select w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none">                  {{-- medicine data --}}               </div>                              <div class="my-1">                  <label for="dose" class="md:ml-2">Dose : </label>                  <input required type="text" class="w-36 px-4 rounded border-b-2 h-11 @error("dose") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail['+loop+'][dose]">                  @error("dose")                  <label for="patient_number" class="text-red-500 text-sm ml-3">                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>                     {{ $message }}                  </label>                  @enderror               </div>               <div class="my-1">                  <label for="pcs" class="md:ml-2">Pcs : </label>                  <input required type="number" class="mds-pcs w-16 pl-3 pr-1 rounded border-b-2 h-11 @error("pcs") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail['+loop+'][pcs]" min="1" value="1">                  @error("dose")                  <label for="patient_number" class="text-red-500 text-sm ml-3">                     <span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>                     {{ $message }}                  </label>                  @enderror               </div>               <div class="my-1">                  <label for="sub_total" class="md:ml-2">Sub Total : </label>                  <input readonly type="text" class="sub-total w-44 px-4 rounded border-b-2 h-11 bg-gray-200 border-b-blue-400 placeholder:text-gray-500 outline-none" name="detail['+loop+'][sub_total]">               </div>               <button type="button" class="remove cursor-pointer text-white inline-block px-2.5 py-0.5 rounded hover:bg-yellow-700 duration-200 bg-yellow-500 font-semibold" title="remove medicine">X</button>            </div>'      
      $('.detail-container').append(input)
      loop++
      // selectTrigger(to)
      // removeElement(amount ,to)
      while (amount > $('.mds-card').length) {
      add(false, to);
      }
   }
   function removeElement(amount, removeTarget) {
      const $targetRemove = removeTarget.next().find('.detail-container').children('div:last');
      if (!amount) {
      $targetRemove.find('button.remove').on('click', function() {
         const $parent = $targetRemove
         const num = Number($('.mds-input').val()) -1
         $('.mds-input').val(num)
         $parent.remove()
         updateTotal()
      })
      } else {
         $('.detail-container').find('.mds-card:last').remove()
         loop-- 
         while (amount < $('.mds-card').length) {
            removeElement(amount, removeTarget);
         }
      }
      updateTotal()
   }
})
   // function selectTrigger(triggerTarget) {
   //    const $targetSelect = triggerTarget.next().children().children('.detail-container').children('div:last').find('select.mds-select');
   //    const $targetPcs = $targetSelect.parent().parent().find('.mds-pcs')
   //    $targetSelect.on('change', function (e) {
   //    update($(e.target))
   //    })
   //    $targetPcs.on('change', function (e) {
   //    $targetSelect.trigger('change');
   //    }) 
   // }

         // const input = $('<div class="px-2 py-1 mds-card flex justify-start md:justify-evenly flex-wrap items-center '+(loop % 2 == 1 ? "bg-gray-100" : "")+' "><div class="my-1"><input type="hidden" name="detail['+loop+'][prsc_number]" value="{{ $patient->patientPrsc->prsc_number }}"><label for="medicine_code" class="md:ml-2">Medicine : </label><select name="detail['+loop+'][medicine_code]" id="medicine_code" class="mds-select w-52 px-4 rounded border-b-2 h-11 bg-gray-50 @error("patient_gender") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror focus:bg-gray-200 focus:border-2 focus:border-blue-400 hover:bg-gray-200 text-black transition-colors outline-none placeholder:text-gray-500"><option class="bg-gray-100" value="0">Select medicine</option>@foreach ($medicines as $medicine)<option value="{{ $medicine->medicine_code }}">{{ $medicine->medicine_name }}</option>@endforeach</select></div><div class="my-1"><label for="dose" class="md:ml-2">Dose : </label><input required type="text" class="w-52 px-4 rounded border-b-2 h-11 @error("dose") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail['+loop+'][dose]">@error("dose")<label for="patient_number" class="text-red-500 text-sm ml-3"><span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>{{ $message }}</label>@enderror</div><div class="my-1"><label for="pcs" class="md:ml-2">Pcs : </label><input required type="number" class="mds-pcs w-16 pl-3 pr-1 rounded border-b-2 h-11 @error("pcs") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500" name="detail['+loop+'][pcs]" min="1" value="1">@error("dose")<label for="patient_number" class="text-red-500 text-sm ml-3"><span data-feather="alert-circle" class="text-center mb-1 w-4 h-4"></span>{{ $message }}</label>@enderror</div><div class="my-1"><label for="sub_total" class="md:ml-2">Sub Total : </label><input required readonly="true" type="text" class="sub-total w-44 px-4 rounded border-b-2 h-11 @error("dose") {{ "border-red-500" }} @else {{ "border-b-blue-400" }} @enderror bg-gray-50 focus:bg-gray-200 focus:border-2 focus:border-blue-400 border-b-blue-400 box-border hover:bg-gray-200 transition-colors outline-none placeholder:text-gray-500 disabled:bg-gray-200" name="detail['+loop+'][sub_total]"></div><button type="button" class="remove cursor-pointer text-white inline-block px-2.5 py-0.5 rounded hover:bg-yellow-700 duration-200 bg-yellow-500 font-semibold" title="remove medicine">X</button></div>')
</script>
@endpush