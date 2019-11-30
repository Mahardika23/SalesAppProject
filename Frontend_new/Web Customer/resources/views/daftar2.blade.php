<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/navbar.css')}}">
    <link rel="stylesheet" href="{{ url('/css/mdb.min.css')}}">
</head>

<body style="background: linear-gradient(0deg, #E4DFEC 70%, #403151 60%); ">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('/js/mdb.min.js')}}"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body" style="text-align:center">
                        <h1>SALES APP</h1>
                        <div>
                            <img src="../img/aga.jpg" class="" alt="..." width='150px' height='150px'>
                        </div>
                        <br/>
                        <h4 style="margin-bottom:-20">Daftar</h4>
                        <!-- Horizontal Steppers -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Stepers Wrapper -->
                                <ul class="stepper stepper-horizontal">
                                    <!-- First Step -->
                                    <li class="completed">
                                        <a href="#!">
                                            <span class="circle">1</span>
                                            <span class="label">Akun</span>
                                        </a>
                                    </li>
                                    <!-- Second Step -->
                                    <li class="active">
                                        <a href="#!">
                                            <span class="circle">2</span>
                                            <span class="label">Informasi Toko</span>
                                        </a>
                                    </li>
                                    <!-- Third Step -->
                                    <li class="">
                                        <a href="#!">
                                            <span class="circle">3</span>
                                            <span class="label">Alamat</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.Stepers Wrapper -->
                            </div>
                        </div>
                        <!-- /.Horizontal Steppers -->
                       
                        <form action="/daftar/alamat" method="POST" style='text-align:left'>
                        @CSRF
                        <div style='margin-left:10%;margin-right:10% '>
                            <input type="text" name="username" id="username" value="{{$input['username']}}">
                            <input type="text" name="email" id="email" value="{{$input['email']}}">
                            <input type="text" name="password" id="password" value="{{$input['password']}}">
                            <div class="form-group row">
                                <label for="nama_toko" class="col-sm-3 col-form-label">Nama Toko </label>
                                <div class="col-sm-9">
                                <input type="text" name="nama_toko" class="form-control" id="nama_toko" placeholder="" autocomplete='off'>
                                <span class='text-danger'>{{ $errors->first('nama_toko') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_pemilik" class="col-sm-3 col-form-label">Nama Pemilik</label>
                                <div class="col-sm-9">
                                <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="" autocomplete='off'>
                                <span class='text-danger'>{{ $errors->first('nama_pemilik') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_pemilik" class="col-sm-3 col-form-label">Email Pemilik</label>
                                <div class="col-sm-9">
                                <input type="email" name="email_pemilik" class="form-control" id="email_pemilik" placeholder="" autocomplete='off'>
                                <span class='text-danger'>{{ $errors->first('email_pemilik') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-3 col-form-label">No Telp</label>
                                <div class="col-sm-9">
                                <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="" autocomplete='off'>
                                <span class='text-danger'>{{ $errors->first('no_telp') }}</span>    
                            </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:RIGHT; margin-right:9%">
                            <button type="submit" class="btn" style="background-color:#403151;color:white">Selanjutnya</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>