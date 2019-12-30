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
        <div class="display-4">200</div>
        <a href="{{ url('/Manajemen-Data-Toko') }}"><p class="card-text text-white">Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>

    <div class="card bg-success ml-3" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="far fa-list-alt"></i>
        </div>
        <h5 class="card-title">Data Pemesanan</h5>
        <div class="display-4">130</div>
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
        <div class="display-4">20</div>
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
        <div class="display-4">12</div>
        <a href="{{ url('/Manajemen-Data-Barang') }}"><p class="card-text text-white">Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i></p></a>
      </div>
    </div>

  </div>


@endsection



<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Quicksand|Rajdhani&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
  <title></title>
</head>

<body>

  <div class="wrapper align-self-center">
   
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html> -->