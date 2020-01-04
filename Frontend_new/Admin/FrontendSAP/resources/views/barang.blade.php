@extends('sidebar')

@section('content')

  <h1><i class="fas fa-box mr-2 pt-2"></i>Manajemen Data Barang</h1><hr>

  @if((Session::get('user_type'))=="App\Distributor")
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
        <form action="/Manajemen-Data-Barang" method="POST">
          @CSRF
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama_barang" placeholder="Nama Barang">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Kategori</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="kategori_id">
                  <option selected>Pilih...</option>
                  @foreach($kategori as $list)
                  <option value="{{ $list['id'] }}">{{ $list['kategori'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" name="harga_barang" placeholder="8999">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" name="stok_barang" id="Stok" placeholder="9813">
              <input type="hidden" name="distributor_id" id="" value="{{ Session::get('userable_id') }}">
              <input type="hidden" name="regency_id" id="" value=330101>

              <input type="hidden" name="item_image" id="" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif

  @if (empty($data))
    @if((Session::get('user_type'))=="App\Distributor")
    <p>Anda tidak memiliki Barang</p>
    <p>Silahkan untuk menambahkan barang</p>
    @else
    <p>Distributor anda tidak memiliki Barang</p>
    <p>Silahkan untuk hubungi manajemen distributor menambahkan barang</p>
    @endif
  @else
  <!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Barang</a> -->
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:25px">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      @if((Session::get('user_type'))=="App\Distributor")
      <th scope="col" colspan="3">Aksi</th>
      @else
      <th scope="col" colspan="1">Aksi</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach($data as $indexKey => $barang)
    
    <tr>
    <td scope="row">{{$indexKey+1}}</td>
      <td>{{$barang['nama_barang']}}</td>
      <td>
        @foreach($kategori as $list)
          @if($barang['kategori_id'] == $list['id'])
            {{ $list['kategori'] }}
          @endif
        @endforeach</td>
      <td >Rp {{$barang['harga_barang']}}</td>
      <td>{{$barang['stok_barang']}}</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailBarangModal{{$barang['id']}}">Detail</button></td>
      @if((Session::get('user_type'))=="App\Distributor")
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editBarangModal{{$barang['id']}}"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteBarangModal{{$barang['id']}}"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
      @endif
    </tr>

<!-- Modal Detail -->
<div class="modal fade" id="detailBarangModal{{$barang['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <input type="hidden" name="id" value="{{$barang['id']}}">
              <input type="text" class="form-control" id="nama" value="{{$barang['nama_barang']}}" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Kategori</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="kategori_id" disabled>
                  @foreach($kategori as $list)
                    @if($barang['kategori_id'] == $list['id'])
                      <option value="{{ $list['id'] }}" selected>{{ $list['kategori'] }}</option>
                    @else
                      <option value="{{ $list['id'] }}">{{ $list['kategori'] }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="{{$barang['harga_barang']}}" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" id="Stok" value="{{$barang['stok_barang']}}" disabled>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@if((Session::get('user_type'))=="App\Distributor")
<!-- Modal Edit -->
<div class="modal fade" id="editBarangModal{{$barang['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Informasi Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Barang/update" method="POST">
         @csrf
          <div class="modal-body">
          <input type="hidden" name="id" value="{{$barang['id']}}">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" name="nama_barang" id="nama" value="{{$barang['nama_barang']}}">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Kategori</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="kategori_id">
                  @foreach($kategori as $list)
                    @if($barang['kategori_id'] == $list['id'])
                      <option value="{{ $list['id'] }}" selected>{{ $list['kategori'] }}</option>
                    @else
                      <option value="{{ $list['id'] }}">{{ $list['kategori'] }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="inputAddress2">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="text" class="form-control" name="harga_barang" id="inlineFormInputGroup" value="{{$barang['harga_barang']}}" >
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Stok</label>
              <input type="number" class="form-control" name="stok_barang" id="Stok" value="{{$barang['stok_barang']}}" >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteBarangModal{{$barang['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Peringatan Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Barang/delete" method="POST">
          @csrf
          <div class="modal-body">
            Yakin menghapus barang {{$barang['nama_barang']}}?
            <input type="hidden" name="id" value="{{$barang['id']}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif

    
    @endforeach



  </tbody>
</table>
@endif



@endsection
