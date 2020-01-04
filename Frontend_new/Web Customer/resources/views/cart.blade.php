@extends('navbar')

@section('konten')

<div class="container">
    @if(empty($cart))
    <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;margin-top:200;">
        Tidak Ada Barang di Keranjang
    </h2>
    @endif
    @isset($cart)
    @foreach($cart as $distri)
    <form action="/checkout" method="POST">
        @CSRF
        <input type="hidden" name="toko_id" value="{{Session::get('id_toko')}}">
        <input type="hidden" name="distributor_id" value="{{$distri[0]['attributes']['id_distributor']}}">
        <input type="hidden" name="nama_toko" value="{{Session::get('nama_toko')}}">
        <div class="row justify-content-md-center" style="margin-top:50; margin-bottom:50;">
            <div class="col">
                <div class="card p-0">
                    <div class="card-header form-inline" style="background-color:#B1A0C7">
                        <h3 class="col-7"><a href="/distributor/{{$distri[0]['attributes']['id_distributor']}}" style="color:inherit;">{{$distri[0]['attributes']['nama_distributor']}}</a></h3>
                        <h3 class="col-3" style="text-align:right;"> Total : 30000</h3>
                        <button type="submit" class="col-2">Checkout</button>
                    </div>
                    <div class="card-body">
                        <div class="row ml-2">
                            @foreach($distri as $barang)
                            <input type="hidden" name="barang[id][]" value="{{$barang['id']}}">
                            <div class="row">
                                <div class="col ml-4 mr-3">
                                    <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:11rem;">
                                        <div class="row no-gutters" style="padding-right:15;">
                                            <div class="col-3">
                                                <img src="../img/gambarLogo.jpg" class="card-img p-2">
                                            </div>
                                            <div class="col-4">
                                                <div class="card-body p-1">
                                                    <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                        nama produk : {{$barang['name']}}
                                                        harga : {{$barang['price']}}
                                                        stok : {{$barang['attributes']['stok_barang']}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="def-number-input number-input safari_only col-4" style="padding-top:17%;">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="barang[kuantitas_barang][]" value="{{$barang['quantity']}}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                            <div class="col-1" style="padding-top:18%;">
                                                <a href="/cart-delete?id={{$barang['id']}}">
                                                        <img class="searchlink"  src="../img/delete.png" style="width:20;">
                                                </a>
                                            </div>
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
        <input type="hidden" name="status_pemesanan" value='menunggu konfirmasi'>
        <input type="hidden" name="total_harga" value=1000>
        <input type="hidden" name="kuantitas_pesanan" value={{count($distri)}}>
    </form>
    @endforeach
    @endisset
</div>

@endsection