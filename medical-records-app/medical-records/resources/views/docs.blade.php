@extends('dashboard.layouts.main')
@section('container')
   <table class="table table-striped">
      {{-- @foreach ($datas1 as $data)          
         <tr>
            <td>
               {{ $data->details }}
               {{ $data->detailResep }}
            </td>
         </tr>
      @endforeach --}}

      {{-- @foreach ($datas as $data)          
         <tr>
            <td>
               {{ $data->details->harga }}
            </td>
         </tr>
      @endforeach --}}
      {{-- @foreach ($datas3 as $data)        --}}
      {{-- @foreach ($data->obatDetail as $key)
      {{ $key }}
      @endforeach --}}
      {{-- @dd($data->obatDetail)
         <tr>
            {{-- <td>
               {{ $data->nomorrsp }} /
            </td> --}}
            {{-- <td>
               {{ $data->kodepsn }} \ {{ $data->resepPasien->alamatpsn }}
            </td>
            <td>
               {{ $data->kodepl }} \ {{ $data->resepPoli->namapl }}
            </td>
            <td>
               {{ $data->kodedkt }} \ {{ $data->resepDokter->namadkt }}
            </td>
            <td>
               {{ $data->kodepmk }} \ {{ $data->resepPemakai->namapmk }}
            </td> --}}
            <td>
               {{-- {{ $data->obatDetail }} --}}
               {{-- {{ $data->kodeobt }} --}}
            {{-- {{ $data->detailObat->namaobt }} --}}
            </td>
         </tr>
      {{-- @endforeach --}}

      {{-- @foreach ($data as $dat)
         <tr>
            <td>
               @foreach ($dat->poliDokter as $d)
               {{ $d->kodepl }}
               {{ $d->namadkt }} /
               @endforeach
            </td>
         </tr>
      @endforeach --}}

      {{-- @foreach ($dokters as $dokter)
         <tr>
            <td>{{ $dokter->kodedkt }}</td>
            <td>{{ $dokter->kodepl }}</td>
            <td>{{ $dokter->dokterPoli->kodepl }}</td>
         <td> {{ $dokter->dokterPoli->namapl }} </td>
         </tr>
      @endforeach --}}

      {{-- @foreach ($pemakais as $pemakai)
         <tr>
            <td>
               @foreach ($pemakai->pemakaiResep as $item)
                  <dd>
                     {{ $item->tanggalrsp }}
                  </dd>
               @endforeach
            </td>
         </tr>
      @endforeach --}}

      {{-- @dd($datas3) --}}

      @foreach ($datas3 as $data)
         <tr>
            <td>
               {{ $data->nomorrsp }}
               {{-- @dd($data->resepDetail) --}}
               {{-- @foreach ($data->resepDetail as $d)
                  kode obat {{ $d->kodeobt }} namaobt{{ $d->namaobt }}
               @endforeach --}}
               {{-- @dd($data->resepObat) --}}
               @foreach ($data->resepDetail as $det)
                  |{{ $det->subtotal }}|
               @endforeach
               @foreach ($data->resepObat as $item)
                  /{{ $item->namaobt }}/
               @endforeach
            </td>
         </tr>
      @endforeach

      {{-- @foreach ($datas3 as $item)
         <tr>
            <td>
               {{ $item->dibayar }}
               {{ $item->resepPasien->kodepsn }}
               {{ $item->resepPembayaran? $item->resepPembayaran->tanggalbyr : '-';}} error if dates null
            </td>
         </tr>
      @endforeach --}}

   </table>
@endsection
