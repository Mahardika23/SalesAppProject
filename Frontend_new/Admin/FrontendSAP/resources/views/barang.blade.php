@extends('sidebar')

@section('content')

  <h1><i class="fas fa-box mr-2 pt-2"></i>Manajemen Data Barang</h1><hr>

  <!-- Add Barang Button -->
  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBarangModal">
    <i class="fas fa-plus-square mr-1"></i>
    Tambah Barang
  </button>
  <!-- Add Barang Modal -->
  <div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama Barang">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Jenis</label>
              <input type="text" class="form-control" id="jenis" placeholder="Jenis Barang">
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="8999">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" id="Stok" placeholder="9813">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Barang</a> -->
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:25px">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col" colspan="3">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $barang)
    <tr>
      <td scope="row">1</td>
      <td>{{$barang['nama_barang']}}</td>
      <td>{{$barang['jenis_barang']}}</td>
      <td >Rp{{$barang['harga_barang']}}</td>
      <td>{{$barang['stok_barang']}}</td>
      <td style="width:70px"><a href="#" class="btn btn-primary">Detail</a></td>
      <td style="width:40px"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit status"></i></td>
      <td style="width:40px"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></td>
      <td>Kapur Bagus Ajaib</td>
      <td>Kapur</td>
      <td>8400</td>
      <td>15000</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailBarangModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editBarangModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteBarangModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
    @endforeach
    <!-- <tr>
      <td scope="row">2</td>
      <td>Kapur Bagus Ajaib</td>
      <td>Kapur</td>
      <td>8400</td>
      <td>15000</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailBarangModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editBarangModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteBarangModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>Kapur Bagus Ajaib</td>
      <td>Kapur</td>
      <td>8400</td>
      <td>1500</td>
      <td><a href="#" class="btn btn-primary">Detail</a></td>
      <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></td>
      <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></td>
    </tr> -->
      <td>15000</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailBarangModal">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editBarangModal"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteBarangModal"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>
  </tbody>
</table>

<!-- Modal Detail -->
<div class="modal fade" id="detailBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" id="nama" value="Kapur Bagus Ajaib" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Jenis</label>
              <input type="text" class="form-control" id="jenis" value="Kapur" disabled>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="8400" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" id="Stok" value="15000" disabled>
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
<div class="modal fade" id="editBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Informasi Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" id="nama" value="Kapur Bagus Ajaib">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Jenis</label>
              <input type="text" class="form-control" id="jenis" value="Kapur" >
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="8400" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" id="Stok" value="15000" >
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
<div class="modal fade" id="deleteBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            Yakin menghapus data?
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
