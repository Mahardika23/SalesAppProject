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
                                    <li class="active">
                                        <a href="#!">
                                            <span class="circle">1</span>
                                            <span class="label">Akun</span>
                                        </a>
                                    </li>
                                    <!-- Second Step -->
                                    <li class="">
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
    
                        <form action="/daftar/toko" method="POST" style='text-align:left'>
                        @CSRF
                            <div style='margin-left:10%;margin-right:10% '>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="" autocomplete='off'>
                                    <span class='text-danger'>{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                                    <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="" autocomplete='off'>
                                    <span class='text-danger'>{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"  class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                    <input type="password"
                                    name="password" class="form-control" id="password" placeholder="">
                                    <span class='text-danger'>{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi</label>
                                    <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" class="form-control" id="konfirmasi" placeholder="" autocompletxe='off'>
                                    <span class='text-danger'>{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="text-align:RIGHT; margin-right:9%">
                                <button type="submit" class="btn" style="background-color:#403151;color:white">Selanjutnya</button>
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