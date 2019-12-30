@extends('sidebar')

@section('content')

  <h1><i class="fas fa-users mr-2 pt-2"></i>Manajemen Data Sales</h1><hr>

  <!-- Add Sales Button -->
  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSalesModal">
    <i class="fas fa-plus-square mr-1"></i>
    Tambah Sales
  </button>
  <!-- Add Sales Modal -->
  <div class="modal fade" id="addSalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Sales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Sales" method="POST">
          @CSRF
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" name="nama_sales" placeholder="Nama Lengkap" require>
            </div>
            <div class="form-group">
              <label for="inputAddress2">No HP</label>
              <input type="text" class="form-control" name="no_hp" placeholder="08xxxxxxxxx">
            </div>
          </div>
          <div class="modal-footer">
              <input type="hidden" name="distributor_id" id="" value="{{ Session::get('userable_id') }}">
              <input type="hidden" name="province_id" id="" value=330101>
              <input type="hidden" name="regency_id" id="" value=330101>
              <input type="hidden" name="district_id" id="" value=330101>
              <input type="hidden" name="village_id" id="" value=330101>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- NEW TABLE TO GET FROM CONTROLLER -->
  @if (empty($data['sales']))
  <p>Anda tidak memiliki Sales</p>
  <p>Silahkan untuk menambahkan Sales</p>
  @else
  <!-- <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Sales</a> -->
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:25px">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">No Hp</th>
      <th scope="col" colspan="3">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data['sales'] as $indexKey => $sales)
    <tr>
      <td scope="row">{{ $indexKey+1 }}</td>
      <td>{{$sales['nama_sales']}}</td>
      <td>{{$sales['no_hp']}}</td>
      <td style="width:70px">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailSalesModal{{$sales['id']}}">Detail</button></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editSalesModal{{$sales['id']}}"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteSalesModal{{$sales['id']}}"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>

<!-- Modal Detail -->
<div class="modal fade" id="detailSalesModal{{$sales['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <input type="text" class="form-control" id="nama" value="{{$sales['nama_sales']}}" disabled>
            </div>
            <div class="form-group">
              <label for="inputAddress2">no HP</label>
              <input type="number" class="form-control" id="Stok" value="{{$sales['no_hp']}}" disabled>
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
<div class="modal fade" id="editSalesModal{{$sales['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Informasi Sales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Sales/update" method="POST">
        @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Nama</label>
              <input type="text" class="form-control" name="nama_sales" value="{{$sales['nama_sales']}}">
            </div>
            <div class="form-group">
              <label for="inputAddress2">no HP</label>
              <input type="number" class="form-control" name="no_hp" value="{{$sales['no_hp']}}">
            </div>
          </div>
          <div class="modal-footer">
              <input type="hidden" name="distributor_id" id="" value="{{ Session::get('userable_id') }}">
              <input type="hidden" name="id" id="" value="{{ $sales['id'] }}">
              <input type="hidden" name="province_id" id="" value=330101>
              <input type="hidden" name="regency_id" id="" value=330101>
              <input type="hidden" name="district_id" id="" value=330101>
              <input type="hidden" name="village_id" id="" value=330101>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteSalesModal{{$sales['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Peringatan Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Sales/delete" method="POST">
          @csrf
          <div class="modal-body">
            Yakin menghapus Sales {{$sales['nama_sales']}}?
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="" value="{{ $sales['id'] }}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
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
