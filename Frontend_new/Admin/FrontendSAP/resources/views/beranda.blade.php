@extends('sidebar')

@section('content')
 
  <link rel="stylesheet" type="text/css" href="{{ url('/css/beranda.css') }}" />
  <h1><i class="fas fa-tachometer-alt mr-2 pt-2"></i>Dashboard</h1><hr>
  <div class="row text-white">

    <div class="card bg-info ml-3" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-store-alt"></i>
        </div>
        <h5 class="card-title">Data Toko</h5>
        <div class="display-4">{{$data['dashboardData']['total']['toko']}}</div>
        <a href="{{ url('/Manajemen-Data-Toko') }}"><p class="card-text text-white">Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>

    <div class="card bg-success ml-3" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="far fa-list-alt"></i>
        </div>
        <h5 class="card-title">Data Pemesanan</h5>
        <div class="display-4">{{$data['dashboardData']['total']['pemesanan']}}</div>
        <a href="{{ url('/Manajemen-Data-Pemesanan') }}"><p class="card-text text-white">Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>

  </div>

  <div class="row text-white mt-5">

    @if((Session::get('user_type'))=="App\Distributor")
    <div class="card bg-secondary ml-3" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-users"></i>
        </div>
        <h5 class="card-title">Data Sales</h5>
        <div class="display-4">{{$data['dashboardData']['total']['sales']}}</div>
        <a href="{{ url('/Manajemen-Data-Sales') }}"><p class="card-text text-white">Lihat Selengkapnya<i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>
    @endif
    <div class="card bg-danger ml-3" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-box"></i>
        </div>
        <h5 class="card-title">Data Barang</h5>
        <div class="display-4">{{$data['dashboardData']['total']['barang']}}</div>
        <a href="{{ url('/Manajemen-Data-Barang') }}"><p class="card-text text-white">Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>

  </div>

    
  @if(Session::has('message'))
    <!-- USERNAME atau PASSWORD SALAH -->
    <div class="modal fade" id="loginfailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Pemberitahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {{Session::get('message')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
    @endif


    @if(Session::has('message'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#loginfailed').modal('show');
            });
        </script>
    @endif

@endsection


