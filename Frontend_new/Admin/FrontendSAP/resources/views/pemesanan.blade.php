@extends('sidebar')

@section('content')

  <h1><i class="fas fa-list-alt mr-2 pt-2"></i>Manajemen Data Pemesanan</h1><hr>
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

  <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Toko</a>
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:25px">No.</th>
      <th scope="col">No Pesanan</th>
      <th scope="col">Barang</th>
      <th scope="col">Toko</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>TRXPP20190202123</td>
      <td>Beras IR9</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td style="width:70px"><a href="#" class="btn btn-primary">Detail</a></td>
      <td style="width:40px"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit status"></i></td>
      <td style="width:40px"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td>TRXPP20190202123</td>
      <td>Beras IR9</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td><a href="#" class="btn btn-primary">Detail</a></td>
      <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></td>
      <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>TRXPP20190202123</td>
      <td>Beras IR9</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td><a href="#" class="btn btn-primary">Detail</a></td>
      <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></td>
      <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></td>
    </tr>
  </tbody>
</table>



@endsection
