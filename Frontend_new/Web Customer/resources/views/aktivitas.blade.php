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
        @if(($pesanan)==NULL)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;padding-top:100;padding-bottom:100">
            Tidak Ada Pesanan
        </h2>
        @endif
        @isset($pesanan)
        @foreach($pesanan as $pesanan)
        <div class="card mb-5">
            <div class="card-header form-inline" style="background-color:#B1A0C7">
                <h3 class="col-9"> <a href="/distributor/{{$pesanan['distributor_id']}}" style="color:inherit;">Nama Distributor </a></h3>
                <div class=" col-3" style="align-content:center;text-align:right">
                    <button type="submit" class="btn-purple" disabled style="display: inline-block;font-weight: 400;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">{{$pesanan['status_pemesanan']}}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row ml-2">

                    <div class="row no-gutters" style="padding-right:15;">
                        @foreach($pesanan['barang'] as $barang)
                        <div class="row ">
                            <div class="col ml-4 mr-3">
                                <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:11rem;">
                                    <div class="row no-gutters" style="padding-right:15;">
                                        <div class="col-4">
                                            <img src="../img/gambarLogo.jpg" class="card-img p-2">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-1">
                                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                    Nama Produk : {{$barang['nama_barang']}}
                                                    Harga : {{$barang['harga_barang']}}
                                                    Jumlah : {{$barang['pivot']['kuantitas_barang']}}
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
                    <div class="col-lg-2">
                        <h3 style="">Total :</h3>
                    </div>
                    <div class="col-lg-2">
                        <h3 style="">{{$pesanan['total_harga']}}</h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
    </div>

    <div id="Riwayat" class="tabcontent">
        @if(($riwayat)==NULL)
        <h2 class="col" style=" color: rgba(0, 0, 0, 0.5);text-align:center;padding-top:100;padding-bottom:100;">
            Tidak Ada Riwayat Pemesanan
        </h2>
        @endif
        @isset($riwayat)
        @foreach($riwayat as $pesanan)
        <div class="card mb-5">
            <div class="card-header form-inline" style="background-color:#B1A0C7">
                <h3 class="col-9"> <a href="/distributor/{{$pesanan['distributor_id']}}" style="color:inherit;">Nama Distributor </a></h3>
                <div class="col-3" style="text-align:RIGHT">
                    <button type="submit" class="btn-purple" disabled style="display: inline-block;font-weight: 400;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">{{$pesanan['status_pemesanan']}}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row ml-2">
                    <div class="row no-gutters" style="padding-right:15;">
                        @foreach($pesanan['barang'] as $barang)
                        <div class="row ">
                            <div class="col ml-4 mr-3">
                                <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:11rem;">
                                    <div class="row no-gutters" style="padding-right:15;">
                                        <div class="col-4">
                                            <img src="../img/gambarLogo.jpg" class="card-img p-2">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-1">
                                                <p class="card-text" style="font-size:100%; white-space:pre-line;">
                                                    Nama Produk : {{$barang['nama_barang']}}
                                                    Harga : {{$barang['harga_barang']}}
                                                    Jumlah : {{$barang['pivot']['kuantitas_barang']}}
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
                <div class="col-lg-2">
                    <h3 style="">Total :</h3>
                </div>
                <div class="col-lg-2">
                    <h3 style="">{{$pesanan['total_harga']}}</h3>
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