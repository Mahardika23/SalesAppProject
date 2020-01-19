<html>

<head>
    <title>SALES APPLICATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/navbar.css')}}">
    <link rel="stylesheet" href="{{ url('/css/carousel.css')}}">
    <link rel="stylesheet" href="{{ url('/css/icon.css')}}">
    <link rel="stylesheet" href="{{ url('/css/number.css')}}">
    <link rel="stylesheet" href="{{ asset('css\error.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    
</head>

<body style="background-color:#E4DFEC; ">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">SALES APP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aktivitas">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pesan">Keranjang</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if (Session::has('login'))
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../storage/Avatar/{{Session::get('profile_image')}}" style="border-radius: 50%; display: inline-block;  width: 32px;  height: 32px; "></a>
                        <div class="dropdown-menu dropdown-menu-right text-left "  aria-labelledby="navbarDropdown" >
                            <a class="" style="text-align: center" ><img src="../storage/Avatar/{{Session::get('profile_image')}}" style="border-radius: 50%; display: inline-block;  width: 32px;  height: 32px;margin-right:5">{{Session::get('username')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profil" >Profil</a>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </li>
                    
                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                    @endif
                </ul>
                
            </div>
        </nav>
    </div>

    @yield('konten')
</body>

<!-- Include jquery.js and jquery.mask.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script>
  $(document).ready(function(){
  // Format mata uang.
    $( '.harga' ).mask('0,000,000,000', {reverse: true});
  })
</script>
</html>