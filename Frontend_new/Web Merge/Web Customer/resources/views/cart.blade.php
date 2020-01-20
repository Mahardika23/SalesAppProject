@extends('navbar')

@section('konten')

<div class="container">
    @if(empty($isi))
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
                        <h3 class="col-6"><a href="/distributor/{{$distri[0]['attributes']['id_distributor']}}" style="color:inherit;">{{$distri[0]['attributes']['nama_distributor']}}</a></h3>
                        <h3 class="col-1 " style="text-align:right;">Rp.</h3>
                        <h3 class="col-3 " id="totalHarga{{$distri[0]['attributes']['id_distributor']}}" style="text-align:right;"></h3>
                        <button type="submit" class="col-2">Checkout</button>
                    </div>
                    <div class="card-body">
                        <div class="row ml-2">
                            @foreach($distri as $barang)
                            <input type="hidden" name="barang[harga_barang][]" value="{{$barang['price']}}">
                            <input type="hidden" name="barang[barang_id][]" value="{{$barang['id']}}">
                            <div class="row">
                                <div class="col ml-4 mr-3">
                                    <div class="card mb-4" style=" background-color: rgb(239, 233, 252); max-width: 30rem; max-height:12rem;">
                                        <div class="row-1 no-gutters mt-2" style="padding-right:15;text-align:center">
                                            <h5>{{$barang['name']}}</h5>
                                        </div>
                                        <div class="row no-gutters" style="padding-right:15;">
                                            <input type="hidden" name="distri_id" value="{{$distri[0]['attributes']['id_distributor']}}">

                                            <div class="col-3" >
                                                <img style="height:10rem;margin-top:-1rem" src="../storage/{{$barang['attributes']['id_distributor']}}/{{$barang['attributes']['foto_barang']}}" class="card-img p-2">
                                            </div>

                                            <div class="col-5">
                                                <div class="card-body p-1">
                                                    <p class="card-text" style="font-size:100%; ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                            Harga                                                             
                                                            </div>
                                                            <div class="col-7">
                                                            : Rp. <text class="harga">{{$barang['price']}}</text>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                            Stok                                                             
                                                            </div>
                                                            <div class="col-7">
                                                            : {{$barang['attributes']['stok_barang']}}                                                            </div>
                                                        </div>
                                                    </p>
                                                    <input type="" hidden name="harga" value={{$barang['price']}}>
                                                </div>
                                            </div>
                                            <div class="def-number-input number-input safari_only col-3" style="padding-top:17%;">
                                                {{-- <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button> --}}

                                                {{-- <span class="minus">-</span> --}}

                                                <input class="quantity" id="kuantitasbarang-{{$barang['id']}}-{{$distri[0]['attributes']['id_distributor']}}" min="0" name="barang[kuantitas_barang][]" value="{{$barang['quantity']}}" type="number">

                                                {{-- <span class="plus">+</span> --}}

                                                {{-- <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button> --}}
                                            </div>
                                            <div class="col-1" style="padding-top:18%;">
                                                <a href="/cart-delete?id={{$barang['id']}}">
                                                    <img class="searchlink" src="../img/delete.png" style="width:20;">
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
        <input type="hidden" name="kuantitas_pesanan" value={{count($distri)}}>
    </form>
    @endforeach
    @endisset

    <!-- Modal Mitra -->
    @if ($message = Session::get('gagal'))
    <div class="modal fade bd-example-modal-sm" id="checkoutfailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pastikan Anda Bermitra dengan Distributor
                </div>
                <div class="modal-footer">
                    <button type="button" class="m-3" id="distri" onclick="window.location.href = '/distributor/{{ $message }}';" onclick="">Oke</button>
                    <button type="button" class="" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($message = Session::get('notif'))
    <div class="modal fade bd-example-modal-sm" id="checkoutberhasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout Berhasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$message}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@if(Session::has('gagal'))
        <script type="text/javascript">
        console.log("test");
            $(window).on('load',function(){
                $('#checkoutfailed').modal('show');
            });
        </script>
@endif
@if(Session::has('notif'))
        <script type="text/javascript">
        console.log("test");
            $(window).on('load',function(){
                $('#checkoutberhasil').modal('show');
            });
        </script>
@endif

<script>
    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count <= 0 ? 0 : count;
            $input.val(count);
            $input.data('val', $input.val());

            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.data('val', $input.val());

            $input.change();
            return false;
        });
    });
</script>
<script>
    var harga = []

    $('form').each(function() {
        var distribId = 'distrib' + $(this).find('input[name=distributor_id]').val();
        var Id = $(this).find('input[name=distributor_id]').val();


        //  var qty =[]
        var a = [];
        var hasil = 0;
        $idBarang = $(this).find("input[name='barang[id][]'").val();
        //   console.log($idBarang)
        $(this).find("div[class='row no-gutters']").each(function() {
            var kuantitas = $(this).find("input[name='barang[kuantitas_barang][]']");
            var valKuantitas = $(this).find("input[name='barang[kuantitas_barang][]']").val();
            var harga = $(this).find("input[name='harga']").val();
            // console.log(harga);
            kuantitas.change(function(e) {
                valKuantitas = $('#' + e.target.id)

            })
            hasil = hasil + valKuantitas * harga;
        })
        $('#totalHarga' + Id).html(hasil);

        console.log(hasil);
        // console.log("\n")

    });
    $('input').on('focusin', function() {
        // console.log("Saving value " + $(this).val());
        $(this).data('val', $(this).val());
    });
    $('input').on('change', function(e) {
        var ortu = $('#' + e.target.id).parent().parent();

        distriId = ortu.find("input[name='distri_id']").val();

        var prev = $(this).data('val');
        console.log('tadinya ' + prev)
        var hasil = 0
        //  console.log("u just inpuuted on " + e.target.id)
        harga = ortu.find("input[name='harga']").val();
        var prevHarga = prev * harga;
        console.log("harga tadi" + prevHarga)
        var prevHargaTotal = $('#totalHarga' + distriId).html();

        console.log('harga total tadi ' + prevHargaTotal)
        kuantitas = $('#' + e.target.id).val();
        var hasilAkhir;

        hasil = hasil + harga * kuantitas
        console.log(hasil);
        var hasilAkhir = (prevHargaTotal - prevHarga) + hasil
        if (hasil == 0 && prevHargaTotal == prevHarga) {
            hasilAkhir = hasil;
            //  console.log("goblog")
        } else if (prevHargaTotal == kuantitas * harga || prevHargaTotal <= 0) {
            hasilAkhir = hasil;
        }


        //  console.log(distriId)
        $('#totalHarga' + distriId).html(hasilAkhir)
    })
</script>

@endsection