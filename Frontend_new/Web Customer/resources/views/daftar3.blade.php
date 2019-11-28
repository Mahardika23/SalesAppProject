<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                                    <li class="completed">
                                        <a href="#!">
                                            <span class="circle">2</span>
                                            <span class="label">Informasi Toko</span>
                                        </a>
                                    </li>
                                    <!-- Third Step -->
                                    <li class="active">
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
                       
                        <form action="/login" method="get" style='text-align:left'>
                        <div style='margin-left:10%;margin-right:10% '>
                        <div class="form-group row">
                            <label for="kabupaten" class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <input list="provinsi" class="form-control" >
                                    <datalist id='provinsi'>
                                    foreach
                                        <option value="Jawa Tengah">
                                        <option value="Jawa Barat">
                                        <option value="Jawa Timur">
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                <div class="col-sm-9">
                                    <input list="kabupaten" class="form-control" >
                                    <datalist id='kabupaten'>
                                        <option value="Banyumas">
                                        <option value="Cilacap">
                                        <option value="Purbalingga">
                                        <option value="Kebumen">
                                        <option value="Banjarnegara">
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <input list="kecamatan" class="form-control" >
                                    <datalist style='display:none' id='kecamatan'>
                                        <option value="Kembaran">
                                        <option value="Sumbang">
                                        <option value="Purwokerto Selatan">
                                        <option value="Purwokerto Utara">
                                        <option value="Purwokerto Timur">
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                <div class="col-sm-9">
                                    <input list="desa" class="form-control" >
                                    <datalist style='display:none' id='desa'>
                                        <option value="Tambaksari">
                                        <option value="Tambaksogra">
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_toko" class="col-sm-3 col-form-label">Alamat lengkap</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" id="alamat_toko"  autocomplete='off' rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:RIGHT; margin-right:9%">
                            <button type="submit" class="btn" style="background-color:#403151;color:white">Daftar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>