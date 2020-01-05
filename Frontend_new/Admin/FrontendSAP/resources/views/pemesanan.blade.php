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
        <th colspan="2" scope="col">Aksi</th>
        @endif


      </tr>
    </thead>
    <tbody>
      @foreach($data['pemesanan'] as $indexKey => $pesanan)
      <tr class="table-secondary">
        <td rowspan="{{count($pesanan['barang'])}}" scope="row">{{$indexKey+1}}</td>
        <td rowspan="{{count($pesanan['barang'])}}">{{$pesanan['nama_toko']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}">{{count($pesanan['barang'])}}</td>

        @foreach ($pesanan['barang'] as $indexKey => $barang)
        @if($loop->first)
        <td>{{$barang['nama_barang']}}</td>
        <td>{{$barang['pivot']['kuantitas_barang']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}" >{{$pesanan['total_harga']}}</td>
        <td rowspan="{{count($pesanan['barang'])}}" >{{$pesanan['status_pemesanan']}}</td>

        @if((Session::get('user_type'))=="App\Sales")

          @if($pesanan['status_pemesanan']=="menunggu konfirmasi")
            <td rowspan="{{count($pesanan['barang'])}}" style="width:40px"><i class="fas fa-check bg-success p-2 text-white rounded"
              data-toggle="modal" data-target="#pesananDiprosesModal{{$pesanan['id']}}" title="Proses pesanan"></i></td>
            <td rowspan="{{count($pesanan['barang'])}}" style="width:40px"><i class="fas fa-times bg-danger p-2 text-white rounded"
              data-toggle="modal" data-target="#tolakModal{{$pesanan['id']}}" title="Tolak Pesanan"></i></td>
          @elseif($pesanan['status_pemesanan']=="pesanan diproses")
            <td rowspan="{{count($pesanan['barang'])}}" colspan="2" style="width:40px"><i class="fas fa-shipping-fast bg-success p-2 text-white rounded"
              data-toggle="modal" data-target="#diantarModal{{$pesanan['id']}}" title="Antar Pesanan"></i></td>
          @elseif($pesanan['status_pemesanan']=="diantar")
            <td rowspan="{{count($pesanan['barang'])}}" colspan="2" style="width:40px"><i class="fas fa-receipt bg-success p-2 text-white rounded"
              data-toggle="modal" data-target="#diterimaTokoModal{{$pesanan['id']}}" title="Diterima Toko"></i></td>
          @elseif($pesanan['status_pemesanan']=="diterima toko")
            <td rowspan="{{count($pesanan['barang'])}}" colspan="2" style="width:40px"><i class="fas fa-check bg-success p-2 text-white rounded"
              data-toggle="modal" data-target="#selesaiModal{{$pesanan['id']}}" title="Selesai"></i></td>
          @elseif($pesanan['status_pemesanan']=="ditolak")
            <td rowspan="{{count($pesanan['barang'])}}" colspan="2" style="width:60px"><i class="fas fa-times bg-secondary p-2 text-white rounded" title="Pesanan ditolak"></i></td>
          @elseif($pesanan['status_pemesanan']=="selesai")
            <td rowspan="{{count($pesanan['barang'])}}" colspan="2" style="width:40px"><i class="fas fa-check bg-secondary p-2 text-white rounded" title="Pesanan Selesai"></i></td>
          @endif
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


      @if((Session::get('user_type'))=="App\Sales")

      @if($pesanan['status_pemesanan']=="menunggu konfirmasi")

      <!-- modal Terima -->
      <div class="modal fade" id="pesananDiprosesModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Terima Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/Manajemen-Data-Pemesanan/update" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Terima Pesanan dari {{$pesanan['nama_toko']}}?</label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$pesanan['id']}}">
                <input type="hidden" name="toko_id" value="{{$pesanan['toko_id']}}">
                <input type="hidden" name="distributor_id" value="{{$pesanan['distributor_id']}}">
                <input type="hidden" name="kuantitas_pesanan" value="{{$pesanan['kuantitas_pesanan']}}">
                <input type="hidden" name="sales_id" value="{{$pesanan['sales_id']}}">
                <input type="hidden" name="nama_toko" value="{{$pesanan['nama_toko']}}">
                <input type="hidden" name="total_harga" value="{{$pesanan['total_harga']}}">
                <input type="hidden" name="status_pemesanan" value="pesanan diproses">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Terima</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- modal Tolak -->
      <div class="modal fade" id="tolakModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Tolak Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/Manajemen-Data-Pemesanan/update" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Tolak Pesanan dari {{$pesanan['nama_toko']}}?</label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$pesanan['id']}}">
                <input type="hidden" name="toko_id" value="{{$pesanan['toko_id']}}">
                <input type="hidden" name="distributor_id" value="{{$pesanan['distributor_id']}}">
                <input type="hidden" name="kuantitas_pesanan" value="{{$pesanan['kuantitas_pesanan']}}">
                <input type="hidden" name="sales_id" value="{{$pesanan['sales_id']}}">
                <input type="hidden" name="nama_toko" value="{{$pesanan['nama_toko']}}">
                <input type="hidden" name="total_harga" value="{{$pesanan['total_harga']}}">
                <input type="hidden" name="status_pemesanan" value="ditolak">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Tolak</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      @elseif($pesanan['status_pemesanan']=="pesanan diproses")
      <!-- modal diantar -->
      <div class="modal fade" id="diantarModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Antar Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/Manajemen-Data-Pemesanan/update" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Antar Pesanan dari {{$pesanan['nama_toko']}}?</label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$pesanan['id']}}">
                <input type="hidden" name="toko_id" value="{{$pesanan['toko_id']}}">
                <input type="hidden" name="distributor_id" value="{{$pesanan['distributor_id']}}">
                <input type="hidden" name="kuantitas_pesanan" value="{{$pesanan['kuantitas_pesanan']}}">
                <input type="hidden" name="sales_id" value="{{$pesanan['sales_id']}}">
                <input type="hidden" name="nama_toko" value="{{$pesanan['nama_toko']}}">
                <input type="hidden" name="total_harga" value="{{$pesanan['total_harga']}}">
                <input type="hidden" name="status_pemesanan" value="diantar">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Antar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      @elseif($pesanan['status_pemesanan']=="diantar")
      <!-- modal diterima toko -->
      <div class="modal fade" id="diterimaTokoModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Pesanan diterima</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/Manajemen-Data-Pemesanan/update" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Pesanan telah diterima oleh {{$pesanan['nama_toko']}}?</label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$pesanan['id']}}">
                <input type="hidden" name="toko_id" value="{{$pesanan['toko_id']}}">
                <input type="hidden" name="distributor_id" value="{{$pesanan['distributor_id']}}">
                <input type="hidden" name="kuantitas_pesanan" value="{{$pesanan['kuantitas_pesanan']}}">
                <input type="hidden" name="sales_id" value="{{$pesanan['sales_id']}}">
                <input type="hidden" name="nama_toko" value="{{$pesanan['nama_toko']}}">
                <input type="hidden" name="total_harga" value="{{$pesanan['total_harga']}}">
                <input type="hidden" name="status_pemesanan" value="diterima toko">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Pesanan diterima</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      @elseif($pesanan['status_pemesanan']=="diterima toko")
      <!-- modal selesai -->
      <div class="modal fade" id="selesaiModal{{$pesanan['id']}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Pesanan selesai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/Manajemen-Data-Pemesanan/update" method="POST">
            @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputAddress2">Pesanan dari {{$pesanan['nama_toko']}} telah selesai?</label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$pesanan['id']}}">
                <input type="hidden" name="toko_id" value="{{$pesanan['toko_id']}}">
                <input type="hidden" name="distributor_id" value="{{$pesanan['distributor_id']}}">
                <input type="hidden" name="kuantitas_pesanan" value="{{$pesanan['kuantitas_pesanan']}}">
                <input type="hidden" name="sales_id" value="{{$pesanan['sales_id']}}">
                <input type="hidden" name="nama_toko" value="{{$pesanan['nama_toko']}}">
                <input type="hidden" name="total_harga" value="{{$pesanan['total_harga']}}">
                <input type="hidden" name="status_pemesanan" value="selesai">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Selesai</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endif
      @endif

      @endforeach
    </tbody>
  </table>


  @endif



  @endsection