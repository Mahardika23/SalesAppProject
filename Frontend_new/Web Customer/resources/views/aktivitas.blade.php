@extends('navbar')

@section('konten')

<div class="container">
    @foreach($data['data'] as $barang)
    <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:50;">
        <div class="col">
            <div class="card p-0">
                <div class="card-header form-inline" style="background-color:#B1A0C7">
                    <h3 class="col-7">{{Session::get('nama_distributor')}}</h3>
                    <h3 class="col-3" style="text-align:right;"> Total : 30000</h3>
                    <button class="col-2">Checkout</button>
                </div>
                <div class="card-body" >
                    <div class="row ml-2">
                        @foreach($data['data'] as $barang)
                        <div class="row">
                            <div class="col ml-4 mr-3">
                                <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:11rem;">
                                    <div class="row no-gutters" style="padding-right:15;">
                                        <div class="col-3">
                                            <img src="../img/napoy.jpg" class="card-img p-2">
                                        </div>
                                        <!-- <form method="get"> -->
                                        <div class="col-4">
                                            <div class="card-body p-1">
                                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                    nama produk : {{Session::get('nama_barang')}}
                                                    harga : {{Session::get('harga_barang')}}
                                                    stok : {{Session::get('stok_barang')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="def-number-input number-input safari_only col-4" style="padding-top:17%;">
                                                <button onclick=" this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                            <input class="quantity" min="0" name="quantity" value="{{Session::get('quantity')}}" type="number">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                        </div>
                                        <div class="col-1" style="padding-top:17%;">
                                            <button class="searchlink" type="submit" data-toggle="modal" data-target="#exampleModal">
                                                <img src="../img/delete.png" style="width:20;">
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
        </div>
    </div>
    @endforeach
</div>

@endsection