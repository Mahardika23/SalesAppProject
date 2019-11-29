@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:30; ">
        <div class="col-lg-9">
            <form class="form-inline" method="GET">
                <input class="form-control mr-2" style="width:90%" type="search" placeholder="Produk, toko" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>

    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div class="row ">
                @foreach($data['data'] as $barang)
                <div class="row">
                    <div class="col ml-5 mr-4">
                        <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:11rem;">
                            <div class="row no-gutters" style="padding-right:15;">
                                <div class="col-3">
                                    <img src="../img/ana.jpg" class="card-img p-2">
                                </div>
                                <!-- <form method="get"> -->
                                <div class="col-8">
                                    <div class="card-body p-2">
                                        <h2 style="padding-left:20%; margin-bottom:0;">Distributor {{$barang['distributor_id']}}</h2>
                                        <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                            nama produk : {{$barang['nama_barang']}}
                                            harga : {{$barang['harga_barang']}}
                                            stok : {{$barang['stok_barang']}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top:17%;">
                                    <button class="searchlink" type="submit" data-toggle="modal" data-target="#exampleModal">
                                        <img src="../img/shopping-cart.png" style="width:20;">
                                    </button>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
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
</div>
@endsection