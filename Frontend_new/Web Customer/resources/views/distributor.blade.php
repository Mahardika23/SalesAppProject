@extends('navbar')

@section('konten')

<div class="container">
    <h1 style="text-align:center;">Nama Distributor</h1>
    <div class="row justify-content-md-center" style="margin-top:30; margin-bottom:30; height:20%;">
        <div class="col-2 pt-5" style="background-color:lawngreen;">
            foto
        </div>
        <div class="col-3" style="background-color:blue;">
            data distributor
        </div>
        <div class="col-7 pt-4" style="background-color:pink;">
            <form class="form-inline" method="GET" action="/search">
                <input class="form-control mr-2" style="width:88%" type="search" placeholder="Produk" aria-label="Search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png" >
                </button>
            </form>
        </div>
    </div>

    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div class="row ">
                <div class="row">
                    <div class="col ml-5 mr-4">
                        <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 22rem; max-height:11rem;">
                            <div class="row no-gutters" style="padding-right:15;">
                                <div class="col-4">
                                    <img src="../img/minyak.jpg" class="card-img p-2" style="height:11rem;">
                                </div>
                                <div class="col-7">
                                    <div class="card-body p-2">
                                        <p class="m-0"> nama produk :</p>
                                        <p class="m-0"> harga : </p>
                                        <p class="m-0"> stok : </p>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top:17%;">
                                    <button class="searchlink" type="submit" data-toggle="modal" data-target="#modalPesan">
                                        <img src="../img/shopping-cart.png" style="width:20;">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-4" style=" max-width: 30rem; max-height:11rem;">
                        <div class="row no-gutters" style="padding-right:15;">
                            <div class="col-3">
                                <img src="../img/minyak.jpg" class="card-img p-2">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-0">
                                    <a href="/distributor" style="color:inherit;">
                                        <h2 style="padding-left:20%; margin-bottom:0;">Distributor </h2>
                                    </a>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                nama produk :
                                                harga :
                                                stok :
                                            </p>
                                        </div>
                                        <div class="def-number-input number-input safari_only col-6 pt-5">
                                            <button onclick=" this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-inline">
                        <p class="m-4">Tambah produk ke pesanan ?</p>
                        <button type="submit" class="m-3">
                            <input type="hidden">
                            Tambah
                        </button>
                        <button type="button" class="m-3" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection