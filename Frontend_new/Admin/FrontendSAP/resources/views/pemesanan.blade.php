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

  <!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Toko</a> -->
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
      <td>Kapur Bagus Ajaib</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailPemesananModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editPemesananModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit status"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deletePemesananModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td>TRXPP20190202123</td>
      <td>Kapur Bagus Ajaib</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailPemesananModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editPemesananModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit status"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deletePemesananModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>TRXPP20190202123</td>
      <td>Kapur Bagus Ajaib</td>
      <td>Lara Ngati</td>
      <td>15</td>
      <td>120000</td>
      <td>Dikirim</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailPemesananModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editPemesananModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit status"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deletePemesananModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
  </tbody>
</table>

<!-- Modal Detail -->
<div class="modal fade" id="detailPemesananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <label for="inputAddress2">Barang</label>
              <input type="text" class="form-control" id="nama" value="Kapur Bagus Ajaib" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Toko</label>
              <input type="text" class="form-control" id="jenis" value="Kapur" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">kuantitas</label>
              <input type="number" class="form-control" id="Stok" value="15000" disabled>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="120000" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Status</label>
              <select class="custom-select" disabled>
                <option value="1">Menunggu Konfirmasi Pesanan</option>
                <option value="2">Pesanan Diterima</option>
                <option value="3" selected>Pesanan Dikirim</option>
                <option value="4">Pesanan Selesai</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Edit -->
<div class="modal fade" id="editPemesananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Status Pemesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Barang</label>
              <input type="text" class="form-control" id="nama" value="Kapur Bagus Ajaib" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Toko</label>
              <input type="text" class="form-control" id="jenis" value="Kapur" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">kuantitas</label>
              <input type="number" class="form-control" id="Stok" value="15000" disabled>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="120000" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Status</label>
              <select class="custom-select">
                <option value="1">Menunggu Konfirmasi Pesanan</option>
                <option value="2">Pesanan Diterima</option>
                <option value="3" selected>Pesanan Dikirim</option>
                <option value="4">Pesanan Selesai</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="deletePemesananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Peringatan Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
          <div class="modal-body">
            Yakin menghapus data pemesanan?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>



@endsection
