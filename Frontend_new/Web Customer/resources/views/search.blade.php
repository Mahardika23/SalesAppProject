@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:30; ">
        <div class="col-lg-9">
            <form class="form-inline" action="/search" method="GET">
                @CSRF
                <input class="form-control mr-2" style="width:90%" type="search" name="search" placeholder="Produk, distributor" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>
    <div>
        @if(($data['data'])==NULL)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;margin-top:100;">
            Barang Tidak Ditemukan
        </h2>
        @endif
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
                                    <img src="../img/minyak.jpg" class="card-img p-2" style="height:11rem;">
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-2" id="{{$barang['id']}}isi">
                                        <a href="/distributor/{{$barang['distributor_id']}}" style="color:inherit;">
                                            <b style="padding-left:20%; margin-bottom:3; font-size:150%;">{{$barang['distributor']['nama_distributor']}}</b>
                                        </a>
                                        <form class="card-text">
                                            <p class="m-0"> nama produk : <text id='produk'>{{$barang['nama_barang']}}</text></p>
                                            <p class="m-0"> harga : <text id='harga'>{{$barang['harga_barang']}}</text></p>
                                            <p class="m-0"> stok : <text id='stok'>{{$barang['stok_barang']}}</text></p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top:17%;">
                                    <button name="shoplink" class="searchlink" type="submit" data-toggle="modal" data-target="#modalPesan" id="{{$barang['id']}}">
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