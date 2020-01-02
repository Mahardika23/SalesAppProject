<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" />

    <title>Login</title>
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100">
            
            <form class="  needs-validation login100-form needs-validation" method="POST" action="/logincheck" novalidate>
            @CSRF
                <span class="login100-form-logo">
                    <i class="fas fa-user"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    <b> distributor </b>
                </span>

                <div class="wrap-input100 input-group" data-validate="Enter username">
                    <input class="input100 form-control" type="email" name="email" placeholder="email" required>
                </div>
                <div class="invalid-feedback">
                    Username harus diisi
                </div>

                <div class="wrap-input100 input-group" data-validate="Enter password">
                    <input class="input100 form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="invalid-feedback">
                    Password harus diisi
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Masuk</button>

                <div class="text-center p-t-90">
                    <a class="txt1" href="#">
                        Lupa Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- USERNAME atau PASSWORD SALAH -->
    <div class="modal fade" id="loginfailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login Gagal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Username atau Password salah!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
    

    <!-- email password salah Modal -->
    <div class="modal fade" id="gagalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black">Gagal!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress2" style="color:black">Password lama</label>
                <input type="password" class="form-control" name="password_lama" placeholder="Password lama" require>
            </div>
            <div class="form-group">
                <label for="inputAddress2" style="color:black">Password Baru</label>
                <input type="password" class="form-control" name="password_baru" placeholder="Password baru">
            </div>
            <div class="form-group">
                Email atau Password Salah!
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>            </div>
        </form>
        </div>
    </div>
    </div>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>