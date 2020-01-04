@extends('sidebar')

@section('content')

  <h1><i class="fas fa-store-alt mr-2 pt-2"></i>Manajemen Data Toko</h1><hr>

  @if (empty($data))
  <p>Anda tidak memiliki Toko yang bermitra</p>
  <p>Silahkan untuk menunggu...</p>
  @else

  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:25px">No.</th>
      <th scope="col">Nama Toko</th>
      <th scope="col">Nama Pemilik</th>
      <th scope="col">No telp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Email</th>
      @if((Session::get('user_type'))=="App\Distributor")
      <th scope="col">Status</th>
      <th scope="col">Sales</th>
      <th scope="col" colspan="2">Aksi</th>
      @endif
    </tr>
  </thead>
  <tbody>
  @foreach($data as $indexKey => $toko)
    <tr>
      <td scope="row">{{ $indexKey+1 }}</td>
      <td>{{$toko['nama_toko']}}</td>
      <td>{{$toko['nama_pemilik']}}</td>
      <td>{{$toko['no_telp']}}</td>
      <td>{{$toko['alamat_toko']}}</td>
      <td>{{$toko['email_pemilik']}}</td>
      @if((Session::get('user_type'))=="App\Distributor")
      <td>{{$toko['pivot']['status']}}</td>
      @if($toko['pivot']['sales_id']==null)
        <td>Kosong</td>
      @else
        @foreach($sales as $listsales)
          @if($toko['pivot']['sales_id']==$listsales['id'])
            <td>{{$listsales['nama_sales']}}</td>
          @endif
        @endforeach
      @endif
      @if($toko['pivot']['status']=="Menunggu persetujuan")
        <td style="width:40px"><a href="" data-toggle="modal" data-target="#terimaTokoModal{{$toko['id']}}"><i class="fas fa-check bg-success p-2 text-white rounded" data-toggle="tooltip" title="Terima"></i></a></td>
        <td style="width:40px"><a href="" data-toggle="modal" data-target="#tolakTokoModal{{$toko['id']}}"><i class="fas fa-times bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Tolak"></i></a></td>
      @elseif($toko['pivot']['status']=="Ditolak")
        <td colspan="2" style="width:40px">-</td>
      @else
        <td style="width:40px"><a href="" data-toggle="modal" data-target="#editSalesModal{{$toko['id']}}"><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Ubah Sales"></i></a></td>
        <td style="width:40px"><a href="" data-toggle="modal" data-target="#tolakTokoModal{{$toko['id']}}"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>
      @endif
      @endif
    </tr>

@if((Session::get('user_type'))=="App\Distributor")
<!-- Modal Terima -->
<div class="modal fade" id="terimaTokoModal{{$toko['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Terima Toko</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Toko/accept/" method="POST">
          @csrf
          <div class="modal-body">
            Yakin untuk menerima {{$toko['nama_toko']}} sebagai mitra anda?
          </div>
          <div class="modal-footer">
            <input type="hidden" name="status" id="" value="Diterima">
            <input type="hidden" name="id" id="" value="{{$toko['id']}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Terima</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Tolak -->
<div class="modal fade" id="tolakTokoModal{{$toko['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tolak Toko</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Toko/accept/" method="POST">
          @csrf
          <div class="modal-body">
            Yakin untuk menolak {{$toko['nama_toko']}} sebagai mitra anda?
          </div>
          <div class="modal-footer">
            <input type="hidden" name="status" id="" value="Ditolak">
            <input type="hidden" name="id" id="" value="{{$toko['id']}}">
            <input type="hidden" name="sales_id" id="" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Modal Sales -->
<div class="modal fade" id="editSalesModal{{$toko['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Terima Toko</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/Manajemen-Data-Toko/accept/" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="inputAddress2">Silahkan pilih sales yang bertanggungjawab terhadap {{$toko['nama_toko']}} ?</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="sales_id">
                @if($toko['pivot']['sales_id']==null)
                  <option selected>Pilih...</option>
                @else
                  <option>Pilih...</option>
                @endif
                @foreach($sales as $list)
                  @if($toko['pivot']['sales_id']==$list['id'])
                    <option value="{{ $list['id'] }}" selected>{{ $list['nama_sales'] }}</option>
                  @else
                    <option value="{{ $list['id'] }}">{{ $list['nama_sales'] }}</option>
                  @endif
                @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="status" id="" value="Diterima">
            <input type="hidden" name="id" id="" value="{{$toko['id']}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Ubah</button>
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
