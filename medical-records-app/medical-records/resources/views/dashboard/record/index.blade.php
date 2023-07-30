@extends('dashboard.layouts.main')
@section('container')
{{-- @dd($patient_record) --}}
  <div class="mx-12 my-7">

    <section class="patient-graph px-7 bg-white" style="direction: rtl; transition: 2ms">
      <div style="position: relative; height: 450px">
        <canvas id="patient-records-graph"></canvas>
      </div>
    </section>

    <section class="px-7 mt-9 bg-white rounded overflow-auto">
      <canvas id="income-records-graph" style="min-width: 600px"></canvas>
    </section>

  </div>
@endsection

@push('scripts')
<script>

  $(document).ready(function () {
    // Patient Record

    // datas.forEach(e => {
    //   e.date
    // });
    // contain how much month available for record
    // let array = []
    // for (let name in datas) {
    //   let res = name.split('-')[0] +"-"+ name.split('-')[1] 
    //   array.push(res)
    // }
    // const filter = [... new Set(array)]

    // const dates = array.filter((item, i, ar) => ar.indexOf(item) === i);

    // const $patient = $('.patient-filter')
    // let now = new Date()
    // const inputDate = now.toISOString().split('T')[0]
    // $patient.val(inputDate)



    // let date = new Date($patient.val())
    // let day = date.getDate()
    // let month = date.getMonth() + 1
    // let year = date.getFullYear()
    

    // filter date

    // chartPatient(datas)
    let labels = {!! $patient_date !!}
    const datas = {!! $patient_record !!}

    // function chartPatient(dataRecord) {
      const ptn = $('#patient-records-graph');
      const chart = new Chart(ptn, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: '# of Patient',
            data: datas,
            borderWidth: 1
          }]
        },
        options: {
          // parsing: {
          //   xAxisKey: 'id',
          //   yAxisKey: 'nested.value'
          // },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              min: 0,
              max: 20,
            },
            y: {
              beginAtZero: true,
              suggestedMax: 30
            }
          }
        }
      });
      

    // }
    
    chart.canvas.addEventListener('wheel', (e) => {
      scroll(e, chart);
    })
    $('.patient-graph').mouseover(function () {
      $('body').css('overflow', 'hidden')
      // $(window).off('scroll');
    })
    $('.patient-graph').mouseleave(function () {
      $('body').css('overflow', 'auto')
    })

    function scroll(scroll, chart) {
      if (scroll.deltaY < 0) {
        if (chart.options.scales.x.min <= 0) {
          chart.options.scales.x.min = 0;
          chart.options.scales.x.max = 20;
        }
        chart.options.scales.x.min -= 1;
        chart.options.scales.x.max -= 1;
      } else if (scroll.deltaY > 0) {
        if (chart.options.scales.x.min >= labels.length-20) {
          chart.options.scales.x.min = labels.length-20;
          chart.options.scales.x.max = labels.length;
        }
        chart.options.scales.x.min += 1;
        chart.options.scales.x.max += 1;
      } else {

      }
      chart.update()
    }

    // function disableScroll() {
    //   // window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
    //   // window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
    //   // window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
    //   // window.addEventListener('keydown', preventDefaultForScrollKeys, false);
    //   var x=window.scrollX;
    //   var y=window.scrollY;
    //   window.onscroll=function(){window.scrollTo(x, y);};
    // }

    function disableScroll() {
            // Get the current page scroll position
        scrollTop =
        window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft =
        window.pageXOffset || document.documentElement.scrollLeft,
      
        // if any scroll is attempted,
        // set this to the previous value
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
    }


    // Income Record
    const inc = $('#income-records-graph');
    new Chart(inc, {
      type: 'doughnut',
      data: {
        // labels = 
        datasets: [{
          data: [{id: 'Sales', nested: {value: 50}}, {id: 'Purchases', nested: {value: 40}}]
        }]
      },
      options: {
        parsing: {
          key: 'nested.value'
        }
      }
    });

  })
      // type: 'doughnut',
      // data: {
      //   datasets: [{
      //     label: '# of Income',
      //     data: {!! $patient_record !!},
      //     borderWidth: 1
      //   }]
      // },
      // options: {
      //   responsive: true,
        // maintainAspectRatio: false,
        // scales: {
        //   y: {
        //     beginAtZero: true,
        //     suggestedMax: 10
        //   }
        // }
      // }
</script> 
@endpush