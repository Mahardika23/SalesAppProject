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
@if ($data['pemesanan']===null)
<p>Anda tidak memiliki Pesanan</p>
@else
<table class="table table-striped table-bordered">
  <!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Toko</a> -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col" style="width:25px">No.</th>
        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col">Toko</th>
        {{-- <th scope="col">Kuantitas</th> --}}
        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col">Kuantitas</th>
        <th scope="col">Barang</th>
        <th scope="col">jumlah barang</th>

        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col">Total Harga</th>
        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col">Status</th>
        <th rowspan={{count($data['pemesanan'][0]['barang'])}} scope="col" colspan="2">Aksi</th>


      </tr>
    </thead>
    <tbody>
      @foreach($data['pemesanan'] as $indexKey => $pesanan)
      <tr>
        <td rowspan="2" scope="row">{{$indexKey+1}}</td>
        <td rowspan="2">{{$pesanan['nama_toko']}}</td>
        <td rowspan="2">{{count($data['pemesanan'][0]['barang'])}}</td>

        @foreach ($pesanan['barang'] as $indexKey => $barang)
        @if($loop->first)
        <td>{{$barang['nama_barang']}}</td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>
        <td rowspan="2">{{$pesanan['total_harga']}}</td>
        <td rowspan="2">{{$pesanan['status_pemesanan']}}</td>
        <td rowspan="2" style="width:7{{count($data['pemesanan'][0]['barang'])}}px">
          <button type="button"
            class="btn btn-primary" data-toggle="modal" data-target="#detailPemesananModal{{$pesanan['id']}}">Detail
          </button>
        </td>
        <td rowspan="2" style="width:40px"><i class="fas fa-edit bg-success p-2 text-white rounded"
            data-toggle="tooltip" title="Edit status"></i></td>

      </tr>
      @elseif ($indexKey>0 && !$loop->last)


      <tr>
        <td>{{$barang['nama_barang']}}
        </td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>

      </tr>

      @else
      <tr>
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