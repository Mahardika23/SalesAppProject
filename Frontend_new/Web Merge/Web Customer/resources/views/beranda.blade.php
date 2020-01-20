@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:30; ">
        <div class="col-lg-9">
            <form class="form-inline" method="GET" action="/search">
                @CSRF
                <input class="form-control mr-2" style="width:90%" type="search" name="search" placeholder="Produk, distributor" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>
    <h5 style="text-align:center;">Kategori</h5>

    <div class="row justify-content-md-center" style=" margin-bottom:20;margin-top:20">
        <div class="row  justify-content-md-center ml-3">
            @foreach($kategori as $kategori)
            <div class="row">
                <div class="col ml-3 mr-2 " >
                    <div class="card  mb-4" style="max-width:100rem; max-height:6rem; border-radius:20px;">
                        <a href="/search/{{$kategori['id']}}" class=" kartu" style="border-radius:20px;">
                            <div class="row no-gutters " style="padding-right:5;padding-left:5">
                                {{$kategori['kategori']}}
                                <form class="form-inline" method="GET" action="/search/{{$kategori['id']}}">
                                    @CSRF
                                    <input type="hidden" name="id" value="{{$kategori['id']}}">
                                    <!-- <button type="submit"></button> -->
                                </form>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <h5 style="text-align:center;">Katalog Produk</h5>
    @if(($data['data'])==NULL)
    <h5 class="row justify-content-md-center" style=" color: rgba(0, 0, 0, 0.5);margin-top:65;">
    Tidak Ada Barang Di Sekitar Anda
    </h5>
    @endif

    @isset($data['data'])
    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row ml-1">
                            @foreach($data['data'] as $barang)
                            <div class="row">
                                <div class="col ml-3 mr-2 ">
                                    <div class="card  mb-4" style="max-width:10rem; max-height:6rem; border-radius:20px;">
                                        @if (Session::has('login'))
                                        <a href="#modalPesan" data-toggle="modal" data-target="#modalPesan" id="{{$barang['id']}}" class=" kartu" style="border-radius:20px;">
                                            @else
                                            <a href="#modalLogin" data-toggle="modal" data-target="#modalLogin" id="{{$barang['id']}}" class=" kartu" style="border-radius:20px;">
                                                @endif
                                                <div class="row no-gutters " style="padding-right:15;">
                                                    <div class="col">
                                                        <img src="../storage/{{$barang['distributor_id']}}/{{$barang['item_image']}}" class="card-img p-2" style="height:6rem; width:4.5rem;">
                                                    </div>
                                                    <div class="col">
                                                        <div class="card-body p-1" id="{{$barang['id']}}isi">
                                                            <div class="card-text" style="font-size:65%;">
                                                                <form>
                                                                    <p class="m-0"> <text id='produk' >{{$barang['nama_barang']}}</text>
                                                                    </p>
                                                                    <p class="m-0"> harga : <text id='harga'>{{$barang['harga_barang']}}</text>
                                                                    </p>
                                                                    <p class="m-0"> stok : <text id='stok'>{{$barang['stok_barang']}}</text></p>
                                                                </form>
                                                                <p id='idbarang' hidden>{{$barang['id']}}</p>
                                                                @if($barang['global']==1)
                                                                <p id='wilayah' hidden>Global</p>
                                                                {{-- <p id='wilayah' hidden>{{$barang['wilayah'][0]['name']}}</p> --}}
                                                                @else
                                                                <p id='wilayah' hidden>{{$barang['wilayah'][0]['name']}}</p>
                                                                @endif
                                                                <p id='distri' hidden>{{$barang['distributor_id']}}</p>
                                                                <b>{{$barang['distributor']['nama_distributor']}}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row ml-1">
                            @isset($page2['data'])

                            @foreach($page2['data'] as $benda )
                            <div class="row">
                                <div class="col ml-3 mr-2 ">
                                    <div class="card  mb-4" style="max-width:10rem; max-height:6rem; border-radius:20px;">
                                        @if (Session::has('login'))
                                        <a href="#modalPesan" data-toggle="modal" data-target="#modalPesan" id="{{$benda['id']}}" class=" kartu" style="border-radius:20px;">
                                            @else
                                            <a href="#modalLogin" data-toggle="modal" data-target="#modalLogin" id="{{$benda['id']}}" class=" kartu" style="border-radius:20px;">
                                                @endif
                                                <div class="row no-gutters " style="padding-right:15;">
                                                    <div class="col">
                                                        <img src="../storage/{{$benda['distributor_id']}}/{{$benda['item_image']}}" class="card-img p-2" style="height:6rem; width:4.5rem;">
                                                    </div>
                                                    <div class="col">
                                                        <div class="card-body p-1" id="{{$benda['id']}}isi">
                                                            <div class="card-text" style="font-size:65%;">
                                                                <div style="text-align: center">
                                                                    <b class="m-0"><text id='produk'>{{$benda['nama_barang']}}</text></b></div>
                                                                <form>
                                                                    <p class="m-0 mt-1"> Rp. <text class='harga'>{{$benda['harga_barang']}}</text>
                                                                    </p>
                                                                    <p class="m-0"> stok : <text id='stok'>{{$benda['stok_barang']}}</text></p>
                                                                </form>
                                                                <p id='deskripsi_produk' hidden>{{$benda['deskripsi_produk']}}</p>
                                                                @if($barang['global']==1)
                                                                <p id='wilayah' hidden>Global</p>
                                                                {{-- <p id='wilayah' hidden>{{$barang['wilayah'][0]['name']}}</p> --}}
                                                                @else
                                                                <p id='wilayah' hidden>{{$barang['wilayah'][0]['name']}}</p>
                                                                @endif                                                                <p id='harga' hidden>{{$benda['harga_barang']}}</p>
                                                                <p id='fotoProduk' hidden>{{$benda['item_image']}}</p>
                                                                <p id='idbarang' hidden>{{$benda['id']}}</p>
                                                                <p id='distri' hidden>{{$benda['distributor_id']}}</p>
                                                                <p id="distributor">{{$benda['distributor']['nama_distributor']}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            @if($data['data']!=NULL)
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
    </div>
    @endisset

    <!-- Peta -->
    <!-- <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:50; ">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div style="text-align:center; margin-bottom:20;">
                        <h5>Peta Distributor</h5>
                    </div>
                </div>
            </div>
            <div class="row" id="mapid" style="height:400">
                <div class="col" id="" style=" height:300;">
                    <p>Peta</p>
                </div>
            </div>
        </div>
    </div> -->
</div>

<!-- Modal -->
@include('modal')
<!-- Peta -->
<!-- <script>
    var map = L.map('mapid').setView([-7.4568928, 109.3003901], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-7.4568928, 109.3003901]).addTo(map)
        .bindPopup('Reksa Karya')
        .openPopup();
</script> -->
@endsection