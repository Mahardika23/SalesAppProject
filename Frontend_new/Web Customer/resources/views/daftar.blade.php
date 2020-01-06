<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SALES APPLICATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ url('/css/mdb.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('dist\css\smart_wizard.css')}}">
    <link rel="stylesheet" href="{{ asset('css\error.css')}}">
    <link rel="stylesheet" href="{{ asset('dist\css\smart_wizard_theme_dots.css')}}">
</head>

<body style="background: linear-gradient(0deg, #E4DFEC 70%, #403151 60%); ">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    {{-- <script type="text/javascript" src="{{ url('/js/mdb.min.js')}}"></script> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body" style="text-align:center">
                        <h1>SALES APP</h1>
                        <div>
                            <img src="../img/gambarLogo.jpg" class="" alt="..." width='200px'>
                        </div>
                        <br />
                        <h4 style="margin-bottom:20">Daftar</h4>
                        <!-- Horizontal Steppers -->
                        <form action="/daftarakun" id="form-regist" method="POST">
                            @csrf
                            <div class="row" id="smartwizard">
                                <ul>
                                    <li style="width:33%"><a href="#step1">Akun</a></li>
                                    <li style="width:33%"><a href="#step2">Informasi Toko</a></li>
                                    <li style="width:33%"><a href="#step3">Alamat Toko</a></li>

                                </ul>

                                <div>
                                    <div id="step1" class="">
                                        <div style='margin-left:10%;margin-right:10% ' class="mt-4">
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="" autocomplete='off' required>
                                                    <span class='text-danger error-message'></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="" autocomplete='off' required>
                                                    <span class='text-danger error-email '>{{ $errors->first('email') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="" required>
                                                    <span class='text-danger error-message'>{{ $errors->first('password') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="konfirmasi"
                                                    class="col-sm-3 col-form-label">Konfirmasi</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" id="password_confirmation" placeholder=""
                                                        autocompletxe='off' required>
                                                    <span
                                                        class='text-danger error-message'>{{ $errors->first('password_confirmation') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{------------------- STEP 2  ---------------------}}
                                    <div id="step2" class="">
                                        <div style='margin-left:10%;margin-right:10% '>

                                            <div class="form-group row mt-4">
                                                <label for="nama_toko" class="col-sm-3 col-form-label">Nama Toko
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_toko" class="form-control"
                                                        id="nama_toko" placeholder="" autocomplete='off' required>
                                                    <span class='text-danger'>{{ $errors->first('nama_toko') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama_pemilik" class="col-sm-3 col-form-label">Nama
                                                    Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_pemilik" class="form-control"
                                                        id="nama_pemilik" placeholder="" autocomplete='off' required>
                                                    <span
                                                        class='text-danger'>{{ $errors->first('nama_pemilik') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email_pemilik" class="col-sm-3 col-form-label">Email
                                                    Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email_pemilik" class="form-control"
                                                        id="email_pemilik" placeholder="" autocomplete='off' required>
                                                    <span
                                                        class='text-danger '>{{ $errors->first('email_pemilik') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_telp" class="col-sm-3 col-form-label">No Telp</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="no_telp" class="form-control" id="no_telp"
                                                        placeholder="" autocomplete='off'>
                                                    <span class='text-danger'>{{ $errors->first('no_telp') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step3" class="">
                                        <div style='margin-left:10%;margin-right:10% '>

                                            <div class="form-group row mt-4">
                                                <label for="province" class="col-sm-3 col-form-label">Provinsi</label>
                                                <div class="col-sm-9">
                                                    <select id="provinsi" class="form-control" name="province_id">
                                                        <option value="" selected>--PILIH PROVINSI--</option>
                                                        @foreach($data as $provinsi)
                                                        <option value="{{$provinsi['id']}}">{{$provinsi['name']}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class='text-danger'>{{ $errors->first('province_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                                <div class="col-sm-9">
                                                    <select id="kabupaten" class="form-control" name="regency_id"
                                                        data-source="http://127.0.0.1:9090/api/regency?province_id=">
                                                    </select>
                                                    <span class='text-danger'>{{ $errors->first('regency_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <select name="district_id" id="kecamatan" class="form-control"
                                                        data-source="http://127.0.0.1:9090/api/district?regency_id=">
                                                    </select>
                                                    <span class='text-danger'>{{ $errors->first('district_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="desa" class="col-sm-3 col-form-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <select name="village_id" id="kelurahan" class="form-control"
                                                        data-source="http://127.0.0.1:9090/api/village?district_id=">
                                                    </select>
                                                    <span class='text-danger'>{{ $errors->first('village_id') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat_toko" class="col-sm-3 col-form-label">Alamat
                                                    lengkap</label>
                                                <div class="col-sm-9">
                                                    <textarea style="resize: none;" class="form-control"
                                                        id="alamat_toko" autocomplete='off' rows="4" disable
                                                        name='alamat_toko'></textarea>
                                                    <span class='text-danger'>{{ $errors->first('alamat_toko') }}</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="profile_image" value="default.jpg">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        <div class="form-group">
                            <div style="text-align:RIGHT; margin-right:9%">
                                <a href="/login" type="button" class="btn next-step" id="back-button"
                                    style="background-color:#403151;color:white; margin-right:58%;">Kembali</a>
                                <button type="button" class="btn next-step" id="previous-step"
                                    style="background-color:#403151;color:white">Kembali</button>
                                <button type="button" class="btn next-step" id="next-step"
                                    style="background-color:#403151;color:white">Selanjutnya</button>
                                <button type="submit" class="btn next-step" id="submit"
                                    style="background-color:#403151;color:white">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('gagal'))
    <div class="modal fade bd-example-modal-sm" id="registerfailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center">
            {{$message}}
            </div>
            <div class="modal-footer">
                <button type="button" class="" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
    @endif

    <script>
    var gagal = '{{Session::get('gagal')}}';
    console.log(gagal);
    if(gagal){
        $(window).on('load',function(){
        $('#registerfailed').modal('show');
    });
    }
    </script>
    <script type="text/javascript" src="{{asset("dist/js/jquery.smartWizard.js")}}">
    </script>

    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/kabupaten.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/provinsi.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/dropdown_wilayah/Kecamatan&Kelurahan.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="{{ asset('js/regist_form_validation.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#submit').hide();
            $('#previous-step').hide();
            
        $('#smartwizard').smartWizard({
            // autoAdjustHeight:    ,
            theme:'dots',
            keyNavigation:false,
            autoAdjustHeight:false,
          
            transitionEffect:'slide',
            toolbarSettings: {
                toolbarPosition : 'none'
            },
            anchorSettings:{
                anchorClickable	:true,
                removeDoneStepOnNavigateBack:true,
             },
        });
        $('#next-step').click(function () {
            $('#smartwizard').smartWizard("next");

        })
        $('#previous-step').click(function () {
            $('#smartwizard').smartWizard("prev");

        })
        $('#smartwizard').on('showStep', function (e, anchorObject,stepNumber,stepDirection,stepPosition) {
           console.log(stepPosition);
            if (stepPosition === 'final') {
                $('#back-button').hide();
                $('#next-step').hide();
                $('#submit').show();
                $('#previous-step').show();
                
        
            }
            else if(stepPosition == 'middle' ){
                $('#back-button').hide();
                $('#next-step').show();
                $('#submit').hide();
                $('#previous-step').show();
                
            }
            else{
                $('#back-button').show();
                $('#next-step').show();
                $('#previous-step').hide(); 
                $('#submit').hide();

            }
            
        })
        $('#submit').on('click',function () {
            // console.log("done");
            $('#form-regist').submit();
        })
        // console.log("Hello");
    });
    </script>
</body>