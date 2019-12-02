@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:30; ">
        <div class="col-lg-9">
            <form class="form-inline" method="GET" action="/search">
                @CSRF
                <input class="form-control mr-2" style="width:90%" type="search" name="search" placeholder="Produk, toko" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>
    <h1 class="align-self-center">Katalog Produk</h1>
    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <!-- <div class="carousel-caption">
                    <h5>Katalog Produk</h5>
                </div> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
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
            <div class="row">
                <div class="col" style="background-color:#B1A0C7; height:300;">
                    <p>Peta</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4" style=" max-width: 30rem; max-height:11rem;">
                    <div class="row no-gutters" style="padding-right:15;">
                        <div class="col-3">
                            <img src="../img/ana.jpg" class="card-img p-2">
                        </div>
                        <div class="col-9">
                            <div class="card-body p-2">
                                <h2 style="padding-left:20%; margin-bottom:0;">Distributor </h2>
                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                    nama produk : {{$barang['nama_barang']}}
                                    harga : {{$barang['harga_barang']}}
                                    stok : {{$barang['stok_barang']}}
                                </p>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="mb-4" style=" max-width: 30rem; max-height:11rem;">
                                                <div class="row no-gutters" style="padding-right:15;">
                                                    <div class="col-3">
                                                        <img src="../img/ana.jpg" class="card-img p-2">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="card-body p-2">
                                                            <h2 style="padding-left:20%; margin-bottom:0;">Distributor {{$barang['distributor_id']}}</h2>
                                                            <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                                nama produk : {{$barang['nama_barang']}}
                                                                harga : {{$barang['harga_barang']}}
                                                                stok : {{$barang['stok_barang']}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-inline">
                                            <p class=" m-4">Tambah produk ke pesanan ?</p>
                                            <button class=" m-3">Tambah</button>
                                            <button class=" m-3">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection