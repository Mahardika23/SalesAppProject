<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
    
</head>

<body class="col-md-10 p5 pt-2">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/beranda.css') }}" />
  <h1><i class="fas fa-tachometer-alt mr-2 pt-2"></i>Halaman Aktifasi</h1><hr>
  <div class="row text-white">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Distributor</th>
            <th scope="col">Alamat Distributor</th>
            <th scope="col">Email Distributor</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['distributor'] as $indexKey => $distrib)
            <tr>
                <th scope="row">{{$indexKey+1}}</th>
                <td>{{$distrib['nama_distributor']}}</td>
                <td>{{$distrib['alamat_distributor']}}</td>
                <td>{{$distrib['email_distributor']}}</td>
                <td>{{$distrib['status']}}</td>
                @if($distrib['status']=='tidak aktif')
                <td><a href="" data-toggle="modal" data-target="#aktifModal{{$distrib['id']}}"><i class="fas fa-check bg-success p-2 text-white rounded" data-toggle="tooltip" title="Aktifkan Distributor"></i></a></td>
                @else
                <td style="width:40px"><a href="#" data-toggle="modal" data-target="#nonaktifModal{{$distrib['id']}}"><i class="fas fa-times bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Non aktif"></i></a></td>
                @endif
            </tr>

            <div class="modal fade" id="aktifModal{{$distrib['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" style="color: black" id="exampleModalCenterTitle">Peringatan tolak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="/distributor/update" method="POST">
                    @csrf
                    <div class="modal-body" style="color: black">
                        Yakin mengaktifkan distributor {{$distrib['nama_distributor']}}?
                        <input type="hidden" name="id" value="{{$distrib['id']}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Aktifkan</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>

            <div class="modal fade" id="nonaktifModal{{$distrib['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" style="color: black" id="exampleModalCenterTitle">Peringatan tolak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="/distributor/delete" method="POST">
                    @csrf
                    <div class="modal-body" style="color: black">
                        Yakin menolak distributor {{$distrib['nama_distributor']}}?
                        <input type="hidden" name="id" value="{{$distrib['id']}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            @endforeach
            
            
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>