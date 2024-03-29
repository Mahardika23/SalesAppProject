@extends('navbar')

@section('konten')

<link rel="stylesheet" href="{{ url('/css/tab.css')}}">

<div class='container mt-5' style="background-color:">
    <div class="tab">
        <button class="tablinks col-6" onclick="openTab(event, 'Pesanan')" id="defaultOpen">Pesanan</button>
        <button class="tablinks col-6" onclick="openTab(event, 'Riwayat')">Riwayat</button>
    </div>

    <!-- Tab content -->
    <div id="Pesanan" class="tabcontent">
        @empty($pesanan)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;padding-top:100;padding-bottom:100">
            Tidak Ada Pesanan
        </h2>
        @endempty
        @isset($pesanan)
        @foreach($pesanan as $pesanan)
        <div class="card mb-5">
            <div class="card-header form-inline" style="background-color:#B1A0C7">
                <h3 class="col-9"> <a href="/distributor/{{$pesanan['distributor']['id']}}" style="color:inherit;">{{$pesanan['distributor']['nama_distributor']}} </a></h3>
                <div class=" col-3" style="align-content:center;text-align:right">
                    <button type="submit" class="btn-purple " disabled style="width:100%;display: block;font-weight: 400;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">{{$pesanan['status_pemesanan']}}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row ml-2">

                    <div class="row no-gutters" style="padding-right:15;">
                        @foreach($pesanan['barang'] as $barang)
                        <div class="row ">
                            <div class="col ml-4 mr-3">
                                <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:12rem;">
                                    <div class="row no-gutters" style="padding-right:15;">
                                        <div class="col-4">
                                            <img style="height: 12rem" src="../storage/{{$pesanan['distributor']['id']}}/{{$barang['item_image']}}" class="card-img p-2">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-1">
                                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Nama Produk
                                                        </div>
                                                        <div class="col">
                                                            : {{$barang['nama_barang']}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Harga </div>
                                                        <div class="col">
                                                            : Rp. <text class="harga"> {{$barang['harga_barang']}} </text> </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Jumlah </div>
                                                        <div class="col">
                                                            : {{$barang['kuantitas_barang']}}
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <div class="row" style="text-align: ">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-1">
                        <h3 style="">Total</h3>
                    </div>
                    <div class="col-lg-3">
                        <h3 style="">: Rp. <text class="harga">{{$pesanan['total_harga']}}</text></h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
    </div>

    <div id="Riwayat" class="tabcontent">
        @empty($riwayat)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;padding-top:100;padding-bottom:100">
            Tidak Ada Riwayat Pesanan
        </h2>
        @endempty
        @isset($riwayat)
        @foreach($riwayat as $pesanan)
        <div class="card mb-5">
            <div class="card-header form-inline" style="background-color:#B1A0C7">
                <h3 class="col-9"> <a href="/distributor/{{$pesanan['distributor']['id']}}" style="color:inherit;"> {{$pesanan['distributor']['nama_distributor']}} </a></h3>
                <div class="col-3" style="text-align:RIGHT">
                    @if($pesanan['status_pemesanan']=='ditolak')
                    <button type="submit" class="btn-danger disabled" disabled style="width:100%;display:block;font-weight: 400;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Pesanan Ditolak</button>
                    @else
                    <button type="submit" class="btn-success disabled" disabled style="width:100%;display: block;font-weight: 400;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Pesanan Selesai</button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row ml-2">
                    <div class="row no-gutters" style="padding-right:15;">
                        @foreach($pesanan['barang'] as $barang)
                        <div class="row ">
                            <div class="col ml-4 mr-3">
                            <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:12rem;">
                                    <div class="row no-gutters" style="padding-right:15;">
                                        <div class="col-4">
                                            <img style="height: 12rem" src="../storage/{{$pesanan['distributor']['id']}}/{{$barang['item_image']}}" class="card-img p-2">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-1">
                                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Nama Produk
                                                        </div>
                                                        <div class="col">
                                                            : {{$barang['nama_barang']}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Harga </div>
                                                        <div class="col">
                                                            : Rp. <text class="harga"> {{$barang['harga_barang']}} </text> </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            Jumlah </div>
                                                        <div class="col">
                                                            : {{$barang['kuantitas_barang']}}
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row" style="text-align: ">
                <div class="col-lg-8"></div>
                <div class="col-lg-1">
                    <h3 style="">Total</h3>
                </div>
                <div class="col-lg-3">
                    <h3 style="">: Rp. <text class="harga">{{$pesanan['total_harga']}}</text></h3>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
    </div>

</div>
<script>
    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection