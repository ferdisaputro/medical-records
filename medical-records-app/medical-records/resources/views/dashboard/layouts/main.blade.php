<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/dashboard.style.css"> 
  <link rel="icon" href="/medical_record_icons/logo.png" type="image/icon type">
  <script src="/jquery/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  @vite('resources/css/app.css')
  <title>{{ explode('.', Route::currentRouteName())[0] }}</title>
  
  <style>
    /* ::selection {
      color: black;
      background-color: rgb(154, 190, 255);
    } */
    svg {
      pointer-events: none;
    }
  </style>
</head>
<body class="relative bg-gray-200 w-full">
  @yield('login')
  
  @if (Request::is('login'))
    {{ die }}
  @endif

  <div class="wraper">
    {{-- sidebar --}}
    @include('dashboard.partials.sidebar')
    {{-- end sidebar --}}

    {{-- content --}}
    <main class="lg:pr-0 px-4 lg:pl-52">
      @yield('container')
    </main>
    {{-- end content --}}
  </div>
  
  {{-- <input type="text" data-format="currency"> --}}
  
  {{-- <header class="h-4.5 bg-slate-300 d-block">
    <a href="">Haloo</a>
  </header> --}}

  {{-- <button class="px-4 py-4 rounded bg-black">submit</button> --}}
  
  {{-- <div class="container-fluid">
    <div class="row">
      @include('dashboard.partials.sidebar')
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Home</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar" class="align-text-bottom"></span>
              This week
            </button>
          </div>
        </div>

        @yield('container')

      </main>
    </div>
  </div> --}}

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    feather.replace()
  </script>
  <script>
    const parent = document.querySelector('.dropdown').parentElement;
    $(document).ready(function () {
      // $(document).find("input[data-format='currency']").on('keyup', function(event) {
      //   let $value = $(event.target).val();
      //   $value = $value.replace(/[^\d]/g, '');
      //   $value = $value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
      //   $(event.target).val($value)
      // });
      $(document).on('click keypress', function (e) {
        const $e = $(e.target)
        if ($e.hasClass('sidebar-btn')) {
          $('.sidebar').toggleClass('left-0');
          $('.sidebar').toggleClass('-left-44');
          // span feather change into svg
          $('.sidebar-btn svg').toggleClass('rotate-180')
        }

        // dropdown
          if ($e.hasClass('dropdown')) {
            // console.log('true');
            $e.parents('.dropdown-drop').find('.dropdown-item').removeClass('hidden')
          } else if($e.hasClass('dropdown-input')) {
          } 
          else {
            $('.dropdown-item').addClass('hidden')
          }

          if ($e.hasClass('child-value')) {
            if ($e.hasClass('dropdown-special')) {
              if ($e.find('.dropdown-input').val() !== '' && $e.parents('.dropdown-drop').find('.parent-value').val() == '') {
                $e.parents('.dropdown-drop').find('.parent-value').val($e.find('.dropdown-input').val())
                bgSelectedItem($e)
              }
            } else {
              if ($e.is(':first-child')) {
                $e.parents('.dropdown-drop').find('.parent-value').val('')
              } else if ($e.html() == $e.parents('.dropdown-drop').find('.parent-value').val()) {
              } else {
                $e.parents('.dropdown-drop').find('.parent-value').val($e.html())
                bgSelectedItem($e)
              }
            }
          }
        })

        function bgSelectedItem($el) {
          $el.siblings('.child-value').removeClass('bg-blue-400')
          $el.addClass('bg-blue-400')
          $el.parents('.dropdown-drop').find('.parent-value').trigger('input')
        }

        $('.dropdown-input').on('blur keypress', function (e) {
          if ( e.which == 13 || e.type == 'blur') {
            if (e.target.value == '') {
              e.preventDefault()
              $(e.target).parents('.dropdown-drop').find('.dropdown-item').addClass('hidden')
            } else {
              e.preventDefault()
              bgSelectedItem($(e.target))
              $(e.target).parents('.dropdown-drop').find('.parent-value').val($(e.target).val())
              $(e.target).parents('.dropdown-drop').find('.dropdown-item').addClass('hidden')
            }
          }
        })
        
      $('.notify').on('click', function (e) {
        $(e.target).parent().remove();
      })
    });
  </script>

  @stack('scripts')

</body>
</html>