<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ url('/css/sidebar.css') }}" />


</head>

<body>
    @section('sidebar')
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Sales App Project</h3>
                <strong></strong>
            </div>
            <ul class="list-unstyled components">
                
                <p> {{ $nama }}</p>
                
                <li class="active">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="active">

                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manajemen Data</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="">

                        </li>
                        <li>
                            <a href="{{ url('/Manajemen-Data-Toko') }}"><i class="fas fa-store-alt mr-2"></i>Toko</a>
                        </li>
                        <li>
                            <a href="{{ url('/Manajemen-Data-Pemesanan') }}"><i class="far fa-list-alt mr-2"></i>Pemesanan</a>
                        </li>
                        <li>
                            <a href="{{ url('/Manajemen-Data-Sales') }}"><i class="fas fa-users mr-2"></i>Sales</a>
                        </li>
                        <li>
                            <a href="{{ url('/Manajemen-Data-Barang') }}"><i class="fas fa-box mr-2"></i>Barang</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li class="logout">
                    <span>
                        <a href=""> Logout</a>
                    </span>
                    <span>
                        <img src="{{ asset('/img/logout.svg') }}" alt="">

                    </span>
                </li>

            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div id="toggler" class="container-fluid">
                    <div style="display:flex">
                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-bars"></i>
                                <span></span>
                            </button>
                    </div>
                </div>

            </nav>

            <div style="width:100%;">
            </div>
        </div>

        <div class="col-md-10 p5 pt-2">
            <!-- <div> -->
                @yield('content')
            <!-- </div> -->
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            // $('#sidebar').hide();
            $('#sidebar').toggleClass('active');

            $('#sidebarCollapse').on('click', function() {
                
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

</body>

</html>