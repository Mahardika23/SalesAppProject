<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/mdb.min.css')}}">
</head>

<body style="background: linear-gradient(0deg, #E4DFEC 70%, #403151 60%); ">
  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body" style="text-align:center">
                        <h1>SALES APP</h1>
                        <div>
                            <img src="../img/aga.jpg" class="" alt="..." width='150px' height='150px'>
                        </div>
                        <br />
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
                                    <label for="province" class="col-sm-3 col-form-label">Provinsi</label>
                                    <div class="col-sm-9">
                                        <select id="provinsi" class="form-control">
                                            @foreach($data as $provinsi)
                                            <option value="{{$provinsi['id']}}">{{$provinsi['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                    <div class="col-sm-9">
                                        <select id="kabupaten" class="form-control" data-source="http://127.0.0.1:9090/api/regency?province_id=">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <select  id="kecamatan" class="form-control" data-source="http://127.0.0.1:9090/api/district?regency_id=">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                    <div class="col-sm-9">
                                        <select name="kelurahan" id="kelurahan" class="form-control" data-source="http://127.0.0.1:9090/api/village?district_id=">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_toko" class="col-sm-3 col-form-label">Alamat lengkap</label>
                                    <div class="col-sm-9">
                                        <textarea style="resize: none;" class="form-control" id="alamat_toko" autocomplete='off' rows="4" disable></textarea>
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
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/kabupaten.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/provinsi.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/Kecamatan&Kelurahan.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/mdb.min.js')}}"></script>
    
</body>