@extends('sidebar')


@section('content')


<h1><i class="fas fa-users mr-2 pt-2"></i>Manajemen Data Sales</h1>
<hr>

<!-- Add Sales Button -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSalesModal">
  <i class="fas fa-plus-square mr-1"></i>
  Tambah Sales
</button>
<!-- Add Sales Modal -->
<div class="modal fade" id="addSalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/Manajemen-Data-Sales" method="POST" id="form-addsales">
        @CSRF
        <div class="modal-body">
          <div class="form-group">
            <label for="inputAddress2">Nama</label>
            <input type="text" class="form-control" name="nama_sales" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Username</label>
            <input type="text" class="form-control" name="name" placeholder="username" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">No HP</label>
            <input type="text" class="form-control no_hp" name="no_hp" placeholder="08xxxxxxxxx" minlength=10 id="no_hp" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email@email.com" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Password sales</label>
            <input type="password" class="form-control" name="password" placeholder="******" min="8" id="password" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Konfirmasi password sales</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="******" id="password_confirmation" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="distributor_id" id="" value="{{ Session::get('userable_id') }}">
          <input type="hidden" name="province_id" id="" value="{{ Session::get('province_id') }}">
          <input type="hidden" name="regency_id" id="" value="{{ Session::get('regency_id') }}">
          <input type="hidden" name="district_id" id="" value="{{ Session::get('district_id') }}">
          <input type="hidden" name="village_id" id="" value="{{ Session::get('village_id') }}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="submit" name="submit" class="btn btn-primary">Tambah</button>
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
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data['sales'] as $indexKey => $sales)
    <tr>
      <td scope="row">{{ $indexKey+1 }}</td>
      <td>{{$sales['nama_sales']}}</td>
      <td class="no_hp">{{$sales['no_hp']}}</td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#editSalesModal{{$sales['id']}}"><i
            class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>
      <td style="width:40px"><a href="" data-toggle="modal" data-target="#deleteSalesModal{{$sales['id']}}"><i
            class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
    </tr>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailSalesModal{{$sales['id']}}" tabindex="-1" role="dialog"
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
                <label for="inputAddress2">Nama</label>
                <input type="text" class="form-control" id="nama" value="{{$sales['nama_sales']}}" disabled>
              </div>
              <div class="form-group">
                <label for="inputAddress2">no HP</label>
                <input type="text" class="form-control no_hp" id="Stok" value="{{$sales['no_hp']}}" disabled>
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
    <div class="modal fade" id="editSalesModal{{$sales['id']}}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <input type="text" class="form-control" name="nama_sales" value="{{$sales['nama_sales']}}" required>
              </div>
              <div class="form-group">
                <label for="inputAddress2">no HP</label>
                <input type="text" class="form-control no_hp" name="no_hp" value="{{$sales['no_hp']}}" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="distributor_id" id="" value="{{ Session::get('userable_id') }}">
              <input type="hidden" name="id" id="" value="{{ $sales['id'] }}">
              <input type="hidden" name="province_id" id="" value="{{ Session::get('province_id') }}">
              <input type="hidden" name="regency_id" id="" value="{{ Session::get('regency_id') }}">
              <input type="hidden" name="district_id" id="" value="{{ Session::get('district_id') }}">
              <input type="hidden" name="village_id" id="" value="{{ Session::get('village_id') }}">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteSalesModal{{$sales['id']}}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script type="text/javascript" src="{{ asset('js/admin_regist_form_validation.js')}}"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script>
  $(document).ready(function(){
  // Format mata uang.
    $( '.no_hp' ).mask('0000-0000-00000');
  })
</script>

@endsection