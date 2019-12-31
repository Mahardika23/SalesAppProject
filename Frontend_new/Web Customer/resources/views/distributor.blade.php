@extends('navbar')

@section('konten')

<div class="container">
    <h1 style="text-align:center;margin-top:50">Nama Distributor</h1>
    <div class="row justify-content-md-center" style="margin-top:30; margin-bottom:30; height:20%;">
        <div class="col-2 pt-5" style="background-color:lawngreen;">
            foto
        </div>
        <div class="col-3" style="background-color:blue;">
            data distributor
        </div>
        <div class="col-7">
            <div>
                <form action="/mitra">
                    <button type="submit"class="btn-purple" disabled style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Ajukan Permintaan Mitra</button>
                </form>
            </div>
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
                    <div class="col ml mr-4">
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
                <div class="row">
                    <div class="col ml mr-4">
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
                <div class="row">
                    <div class="col ml mr-4">
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
    <!-- Modal -->
    @include('modal')
</div>
@endsection