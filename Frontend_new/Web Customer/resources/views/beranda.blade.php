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
    <h5 style="text-align:center;">Katalog Produk</h5>
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
                                        <a href="#modalPesan" data-toggle="modal" data-target="#modalPesan" id="{{$barang['id']}}" class=" kartu" style="border-radius:20px;">
                                            <div class="row no-gutters " style="padding-right:15;">
                                                <div class="col">
                                                    <img src="../img/minyak.jpg" class="card-img p-2" style="height:6rem; width:4.5rem;">
                                                </div>
                                                <div class="col">
                                                    <div class="card-body p-1" id="{{$barang['id']}}isi">
                                                        <div class="card-text" style="font-size:65%;">
                                                            <form>
                                                                <p class="m-0"> {{$barang['nama_barang']}}</p>
                                                                <p class="m-0"> harga : {{$barang['harga_barang']}}</p>
                                                                <p class="m-0"> stok : {{$barang['stok_barang']}}</p>
                                                            </form>
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
                            @foreach($data['data'] as $barang)
                            <div class="row">
                                <div class="col ml-3 mr-2 ">
                                    <div class="card  mb-4" style="max-width:10rem; max-height:6rem; border-radius:20px;">
                                        <a href="/search" class=" kartu" style="border-radius:20px;">
                                            <div class="row no-gutters " style="padding-right:15;">
                                                <div class="col">
                                                    <img src="../img/minyak.jpg" class="card-img p-2" style="height:6rem; width:4.5rem;">
                                                </div>
                                                <div class="col">
                                                    <div class="card-body p-1">
                                                        <p class="card-text" style="font-size:65%; white-space:pre-line;">
                                                            {{$barang['nama_barang']}}
                                                            harga : {{$barang['harga_barang']}}
                                                            stok : {{$barang['stok_barang']}}
                                                        </p>
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
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:50; ">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div style="text-align:center; margin-bottom:20;">
                        <h5>Peta Distributor</h5>
                    </div>
                </div>
            </div>
            <div class="row" id="mapid" style="height:400">
                <div class="col" id=""style=" height:300;">
                    <p>Peta</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<script>
   var map = L.map('mapid').setView([-7.414236, 109.338078], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-7.414236, 109.338078]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();
</script>
@include('modal')
@endsection