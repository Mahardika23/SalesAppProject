<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/navbar.css')}}">
    <link rel="stylesheet" href="{{ url('/css/carousel.css')}}">
</head>

<body style="background: linear-gradient(0deg, #E4DFEC 70%, #403151 60%); ">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body" style="text-align:center">
                            <h1>SALES APP</h1>
                            <div class=" row justify-content-md-center" style="margin-top:10; width:200px; height:100px">
                                 <div class="col-lg-8" style="background-color:#B1A0C7;">
                                    <p>LOGO</p>
                                </div>
                            </div>
                            <img src= >
                            <h3 class="text-center"></h3>
                            <br/>
                            {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
 
                            <br/>
                            <h4>Masuk</h4>
                             <!-- form validasi -->
                            <form action="/login" method="get">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <label for="username"></label>
                                    <input class="form-control" type="text" name="username" placeholder="Username" autocomplete='off'>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="password"></label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Masuk">
                                </div>
                            </form>
                            <div style="marginTop:10;flexDirection:row">
                                <a href='\lupa' style="margin-right:120;">Lupa Password</a>
                                <a href='\daftar' style=>Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>