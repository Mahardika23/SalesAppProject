@extends('navbar')

@section('konten')

<div class="container">
    <h1 style="text-align:center;margin-top:50">{{$data['nama_distributor']}}</h1>
    <div class="row justify-content-md-cente" style="margin-top:30; margin-bottom:30;">
        <div class="col-2" style="background-color:;">
            <div class="" style="text-align:;">
                <div style="overflow: hidden;border-radius: 3px;">
                    <img src="../img/gambarLogo.jpg" class="" alt="..." width='150px'>
                </div>
            </div>
        </div>
        <div class="col-4" style="background-color:;">
            <div class="row">
                <div class="col-lg-3">
                    Email
                </div>
                <div class="">
                    :
                </div>
                <div class="col">
                    {{$data['email_distributor']}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    Alamat
                </div>
                <div class="">
                    :
                </div>
                <div class="col">
                    {{$data['alamat_distributor']}}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div>
                <form action="/requestmitra">
                    <input type="hidden" value={{$data['id']}} name="distributor_id">
                    @if(isset($data['pivot']))
                        @if($data['pivot']['status']=='Ditolak')
                        <button type="submit" class="btn-danger" disabled style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Pengajuan Mitra Ditolak</button>
                        @else
                        <button type="submit" class="btn-purple" disabled style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Menunggu Persetujuan Pengajuan Mitra</button>
                        @endif
                    @else
                    <button type="submit" class="btn-purple"  style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Ajukan Permintaan Mitra</button>
                    @endif
                </form>
            </div>
            <form class="form-inline" method="GET" action="/distributor/{{$data['id']}}">
                @CSRF
                <input class="form-control mr-2" style="width:86%" type="search" placeholder="Produk" aria-label="Search" name="search">
                <button class="searchlink" type="submit">
                    <img class="btn" src="../img/search.png">
                </button>
            </form>
        </div>
    </div>

    @if(($barang)==NULL)
    <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;margin-top:100;">
        Barang Tidak Ditemukan
    </h2>
    @endif

    @isset($barang)
    <div class="row justify-content-md-center" style=" margin-bottom:50;">
        <div class="col">
            <div class="row ">
                @foreach($barang as $barang)
                <div class="row">
                    <div class="col ml mr-4">
                        <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 22rem; max-height:11rem;">
                            <div class="row no-gutters" style="padding-right:15;">
                                <div class="col-4">
                                    <img src="../img/minyak.jpg" class="card-img p-2" style="height:11rem;">
                                </div>
                                <div class="col-7">
                                    <div class="card-body p-2" id="{{$barang['id']}}isi">
                                    <b hidden style="padding-left:20%; margin-bottom:3; font-size:150%;">{{$data['nama_distributor']}}</b>
                                        <form class="card-text">
                                            <p class="m-0"> nama produk : <text id='produk'>{{$barang['nama_barang']}}</text></p>
                                            <p class="m-0"> harga : <text id='harga'>{{$barang['harga_barang']}}</text></p>
                                            <p class="m-0"> stok : <text id='stok'>{{$barang['stok_barang']}}</text></p>
                                        </form>
                                        <p id='idbarang' hidden>{{$barang['id']}}</p>
                                        <p id='distri' hidden>{{$data['id']}}</p>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top:17%;">
                                    <button class="searchlink" type="submit" data-toggle="modal" data-target="#modalPesan" id="{{$barang['id']}}">
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
    @endisset
    <!-- Modal -->
    @include('modal')
</div>
@endsection