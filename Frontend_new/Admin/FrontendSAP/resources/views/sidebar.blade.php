<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
                <p>lorem ipsum</p>
                <li class="active">

                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="">

                        </li>
                        <li>
                            <a href="#">Dashboard</a>

                        </li>
                        <li>
                            <a href="#">Manajemen Data Barang</a>

                        </li>
                        <li>
                            <a href="#">Manajemen Data Sales</a>
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
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left">

                        </i>
                        <span>Toggle Sidebar</span>
                    </button>
                </div>

            </nav>

            <div class="container container-fluid">
                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>
</body>

</html>