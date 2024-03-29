@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:30; ">
        <div class="col-lg-9">
            <form class="form-inline" action="/search" method="GET">
                @CSRF
                <input class="form-control mr-2" style="width:90%" type="search" name="search"
                    placeholder="Produk, distributor" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>
    <div>
        @if(($data)==NULL)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;margin-top:100;">
            Barang Tidak Ditemukan
        </h2>
        @endif
    </div>
    <div class="col ml-3 mb-3">
        @isset($nama)
        @if($data!=NULL)
        Menampilkan produk untuk "{{$nama}}"
        @endif
        @endisset
    </div>
    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div class="row ">
                @foreach($data as $barang)
                <div class="row">
                    <div class="col ml-5 mr-4">
                        <div class="card mb-4"
                            style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:12rem;">
                            <div class="row no-gutters" style="padding-right:15;">
                                <div class="col-3" style="height:11rem">
                                    <!-- <img src="../img/chitato.jpg" class="card-img p-2" style="height:90%;"> -->
                                    <img src="../storage/{{$barang['distributor_id']}}/{{$barang['item_image']}}"
                                        class="card-img p-2" style="height:10rem;margin-top:1rem">
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-2" id="{{$barang['id']}}isi">
                                        <div style="text-align: center">
                                            <b class="m-0"><text id='produk'
                                                    style="font-size:120%;">{{$barang['nama_barang']}}</text></b></div>
                                        <form class="card-text">
                                            <p class="m-0 mt-2"> Rp. <text
                                                    class="harga">{{$barang['harga_barang']}}</text></p>
                                            <p class="m-0"> stok : <text id='stok'>{{$barang['stok_barang']}}</text></p>
                                        </form>
                                        <!-- <p id='fotoProduk' hidden>{{$barang['item_image']}}</p> -->
                                        <a href="/distributor/{{$barang['distributor_id']}}" style="color:inherit;">
                                            <p id="distributor" style=>{{$barang['distributor']['nama_distributor']}}
                                            </p>
                                        </a>
                                        <p id='deskripsi_produk' hidden>{{$barang['deskripsi_produk']}}</p>
                                        <p id='harga' hidden>{{$barang['harga_barang']}}</p>
                                        <p id='idbarang' hidden>{{$barang['id']}}</p>
                                        <p id='fotoProduk' hidden>{{$barang['item_image']}}</p>
                                        <p id='distri' hidden>{{$barang['distributor_id']}}</p>
                                        @if($barang['global']==1)
                                        <p id='wilayah' hidden>GLOBAL</p>
                                        @else
                                        <p id='wilayah' hidden>{{$barang['wilayah'][0]['name']}}</p>
                                        @endif
                                    </div>
                                    @if($barang['global']==1)
                                    <p style="text-align:right" id='wilayah'>Global</p>
                                    @else
                                    <p style="text-align:right" id='wilayah'>{{$barang['wilayah'][0]['name']}}</p>
                                    @endif
                                </div>
                                <div class="col-1" style="padding-top:17%;">
                                    <button name="shoplink" class="searchlink" type="submit" data-toggle="modal"
                                        data-target="#modalPesan" id="{{$barang['id']}}">
                                        <img src="../img/shopping-cart.png" style="width:20;">
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modal')
</div>
@endsection