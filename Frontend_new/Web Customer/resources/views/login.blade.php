<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background: linear-gradient(0deg, #E4DFEC 70%, #403151 60%);background-repeat:no-repeat;">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body" style="text-align:center">
                        <h1>SALES APP</h1>
                         <div>
                            <img src="../img/aga.jpg" class="" alt="..." width='300px' height='300px'>
                        </div>
                        <h4>Masuk</h4>
                         <!-- form validasi -->
                        <div class=" justify-content-center" style='margin-left:20%;margin-right:20%'>
                            <form action="/loginUser" method="POST">
                            @CSRF
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">
                                    <label for="email"></label>
                                    <input class="form-control" type="email" name="email" placeholder="E-mail" autocomplete='off'>
                                    <span class='text-danger'>{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password"></label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                    <span class='text-danger'>{{ $errors->first('password') }}</span>
                                </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Masuk" style="background-color:#403151">
                                    </div>
                            </form>
                        </div>
                        <div style="marginTop:10;flexDirection:row">
                            <a href='\lupa' style="margin-right:120;">Lupa Password</a>
                            <a href='\daftar' style=>Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>