@extends('dashboard.layouts.main')
@section('container')
<div class="md:mx-16 my-7">

  <div class="doctor-container hidden overflow-hidden fixed top-0 right-0 left-0 lg:left-52 bottom-0 bg-black/40 z-50">
    <button class="doctor-close text-2xl py-1.5 px-2.5 text-white rounded absolute top-10 right-6" type="button">X</button>
    <div class="doctor-item w-10/12 h-5/6 overflow-y-auto bg-white rounded-lg overflow-auto absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
      @include('dashboard.partials.doctor.doctor')
    </div>
  </div>

  <section class="poly-doctor bg-white rounded-lg py-5">
    @include('dashboard.partials.alert')

    @include('dashboard.partials.poly.poly')
  </section>

</div>
@endsection

@once
  @push('scripts')
    <script>
      $(document).ready(function () {
        let $target
        $(document).on('click', function (e) {
          const $e = $(e.target)
          if ($e.hasClass('poly-edit')) {
            if (!$e.parents('.poly').hasClass('poly-edit-active')) {
              $e.parents('.poly').addClass('poly-edit-active')
              polyEditActive($e)
              // appendDoctorAdd($e.parents('.form-poly').find('.form-doctor'))
            } else if ($e.parents('.poly').hasClass('poly-edit-active')) {
              polyEditNotActive($e)
            }
          } else if (
            $e.parents('.poly').length > 0 || 
            $e.parents('.doctor-container').length > 0 || 
            $e.hasClass('doctor-container')
            ) {
          } else {
            $('.poly').removeClass('poly-edit-active')
            polyEditNotActive()
            fadeOutButton()
          }

          // show or hide doctor container
          if ($e.hasClass("poly-doctor-add")) {
            $('.doctor-container').fadeIn('fast')
            $target = $e
          } else if (!$e.parents(".doctor-item").hasClass('doctor-item') || $e.hasClass("doctor-close")) {
            $('.doctor-container').fadeOut('fast')
          }
          
          // remove container when + is pressed
          if ($e.hasClass("poly-select-doctor")) {
            applySelection($e, $target)
            $('.doctor-container').fadeOut()
          }

          // remove add doctor
          if ($e.hasClass("remove-doctor-temp")) {
            removeDoctorAdd($e.parents('.add-temp'))
            fadeOutButton($e)
            // $(document).trigger('click')
          }

          // if ($e.hasClass('poly-submit')) {
          //   applySelection($e, $target)
          // }

          // delete doctor
          if ($e.hasClass("remove-doctor")) {
            const csrf = $('.poly-doctor').find('input[name="_token"]:first').val()
            const poly = $e.parents('.form-doctor').find('input[name="poly_name"]').val()
            const url = "/doctor/"+$e.data('doctor-code')
            const message = 'Doctor '+$e.data('doctor-name')+' are removed from '+poly
            const data = {_method: 'put', route:'poly' , _token: csrf, doctor_code:$e.data('doctor-code'), doctor_name: $e.data('doctor-name')}
            const polyCode = $e.parents('form-doctor')
            ajaxDoctor(url, data, message)
          }

        })
        $('form input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
        $(document).on('input', function (e) {
          const $e = $(e.target)
          if ($e.hasClass('poly-doctor-add')) {
            // appendDoctorAdd($e.parents('.form-doctor'))
          }
        })
        function ajaxDoctor(url, data, message) {
          $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success:function(data) {
              alert(message)
              document.location.href = '/poly'
            }
          })
        }
        function removeDoctorAdd(doctorRemoveElement) {
          if (confirm('Remove')) {
            doctorRemoveElement.fadeOut('fast', function () {
              // polyEditNotActive($(this))
              $('this').parents('.poly').find('.poly-edit').trigger('click')
              $(this).remove()
            })
          }
        }
        function applySelection(element, targetElement) {
          const doctorName = element.parents('tr').find('input[name="doctor_name"]').val()
          const doctorCode = element.parents('tr').find('input[name="doctor_code"]').val()
          const formDoctor = targetElement.parents('.form-doctor').find('.form-doctor-wraper')
          if (targetElement.hasClass('append')) {
            appendDoctorAdd(formDoctor, doctorCode, doctorName)
          } else {
            targetElement.val(doctorName)
            targetElement.siblings('.doctor-code').val(doctorCode)
          }
          // validateSelection(element)
        }
        function validateSelection(element) {
          $
          // element.prop('disabled', true)
          // const $doctor = $(document).find('input[name="doctor_code"]')
          // $doctor.each(function () {
          //   if (){
              
          //   }
          // })
          
          // get all poly value
          // do foreach
          // find the doctor inpu using poly value
          // if same write "prop('disabled', true)"
        }
        function appendDoctorAdd(formDoctor, doctorCode, doctorName) {
          let loop = Number(formDoctor.attr('data-loop'))+1 
          formDoctor.attr('data-loop', loop)
          const doctorAdd = $('<div class="inline-flex items-center add-temp"><input placeholder="Add doctor" name="doctor['+loop+'][doctor_code]" type="hidden" value="'+doctorCode+'" name="doctor['+loop+'][doctor_code]"><input placeholder="Add doctor" type="text" value="'+doctorName+'" name="doctor['+loop+'][doctor_name]" class="poly-doctor-add bg-gray-100 disabled:bg-transparent my-0.5 pl-1.5 border-l border-blue-500 outline-none w-full"><button type="button" class="remove-doctor-temp w-5 items-center justify-center cursor-pointer bg-yellow-500 rounded-r text-white hover:bg-yellow-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-full"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button></div>').hide()
          formDoctor.append(doctorAdd)
          doctorAdd.fadeIn('fast')
        }
        function polyEditActive(element) {
          element.parents('.poly').find('.add').fadeIn('fast')
          element.parents('.poly').find('.poly-name').addClass('hover:bg-gray-200')
          element.parents('.poly').find('.poly-doctor-name').addClass('hover:bg-gray-200')
          element.parents('.poly').find('.remove-doctor').fadeIn('slow')
          element.parents('.poly').find('.poly-doctor-add').fadeIn('fast')
          element.parents('.poly').find('.poly-name').prop('disabled', false)
          element.parents('.poly').find('.poly-doctor-name').prop('disabled', false)
          element.parents('.poly').find('.poly-doctor-submit').fadeIn('slow')
        }
        function polyEditNotActive(element = $(document).find('.poly-doctor-add')) {
          element.parents('.poly').find('.add').fadeOut('fast')
          element.parents('.poly').removeClass('poly-edit-active')
          element.parents('.poly').find('.poly-name').removeClass('hover:bg-gray-200')
          element.parents('.poly').find('.poly-doctor-name').removeClass('hover:bg-gray-200')
          element.parents('.poly').find('.remove-doctor').fadeOut('fast')
          element.parents('.poly').find('.poly-name').prop('disabled', true)
          element.parents('.poly').find('.poly-doctor-name').prop('disabled', true)
        }
        function fadeOutButton(button = false) {
          if (!button) {
            $(document).find('.poly').each(function () {
              if ($(this).find('.add-temp').length == 0) {
                $(this).find('.poly-doctor-submit').fadeOut('fast')
              }
            })
          } else {
            button.parents('.poly').find('.poly-doctor-submit').fadeOut('fast')
          }
        }
      })
    </script>
  @endpush
@endonce