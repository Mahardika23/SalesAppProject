@extends('sidebar')

@section('content')

<h1><i class="fas fa-list-alt mr-2 pt-2"></i>Manajemen Data Pemesanan</h1>
<hr>


<!-- <div class="align-self-center" style="
      width:92%;
      padding: 10px;
      margin: 4%;">
    <div style="text-align:right;
    right: 0px;
    width: 100%;
    padding: 10px; 
    " class="align-self-center">
        <a href="" style="border:2px solid #5a486e; border-radius:10px;padding:8px;background-color:#5a486e;color:white">Tambah</a>
    </div>
  </div> -->

<!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Toko</a> -->
@if (empty($data['pemesanan']))
<p>Anda tidak memiliki Pesanan</p>
@else
  <table class="table table-bordered">
    <thead  class="thead-dark">
      <tr>
        <th scope="col" style="width:25px">No.</th>
        <th scope="col">Toko</th>
        {{-- <th scope="col">Kuantitas</th> --}}
        <th scope="col">Kuantitas</th>
        <th scope="col">Barang</th>
        <th scope="col">jumlah barang</th>

        <th scope="col">Total Harga</th>
        <th scope="col">Status</th>

        @if((Session::get('user_type'))=="App\Sales")
        <th scope="col" colspan="2">Aksi</th>
        @endif


      </tr>
    </thead>
    <tbody>
      @foreach($data['pemesanan'] as $indexKey => $pesanan)
      <tr class="table-secondary">
        <td rowspan="{{count($pesanan['barang'])}}" scope="row">{{$indexKey+1}}</td>
        <td rowspan="{{count($pesanan['barang'])}}">{{$pesanan['nama_toko']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}">{{count($data['pemesanan'][0]['barang'])}}</td>

        @foreach ($pesanan['barang'] as $indexKey => $barang)
        @if($loop->first)
        <td>{{$barang['nama_barang']}}</td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}" >{{$pesanan['total_harga']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}" >{{$pesanan['status_pemesanan']}}</td>

        @if((Session::get('user_type'))=="App\Sales")
        <td rowspan="{{count($pesanan['barang'])}}" style="width:7px">
          <button type="button"
            class="btn btn-primary" data-toggle="modal" data-target="#detailPemesananModal{{$pesanan['id']}}">Detail
          </button>
        </td>
        <td rowspan="{{count($pesanan['barang'])}}" style="width:40px"><i class="fas fa-edit bg-success p-2 text-white rounded"
            data-toggle="tooltip" title="Edit status"></i></td>
        @endif

      </tr>
      @elseif ($indexKey>0 && !$loop->last)


      <tr class="table-secondary">
        <td>{{$barang['nama_barang']}}
        </td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>

      </tr>

      @else
      <tr class="table-secondary">
        <td>{{$barang['nama_barang']}}
        </td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>

      </tr>
      @endif

      @endforeach
      <div class="modal fade" id="detailPemesananModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Lihat Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Nama Toko</label>
                  <input type="text" class="form-control" id="nama" value="{{$pesanan['nama_toko']}}" disabled>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">no HP</label>
                  <input type="number" class="form-control" id="Stok" value="" disabled>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      @endforeach
    </tbody>
  </table>


  @endif



  @endsection