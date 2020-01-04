@extends('navbar')

@section('konten')

<div class="container">
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
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
                        <h3 class="col-3" id="totalHarga{{$distri[0]['attributes']['id_distributor']}}" style="text-align:right;"> Total : 30000</h3>
                        <button type="submit" class="col-2">Checkout</button>
                    </div>
                    <div class="card-body">
                        <div class="row ml-2">
                            @foreach($distri as $barang)
                            <input type="hidden" name="barang[harga][]" value="{{$barang['price']}}">
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
                                                <input class="quantity" id="kuantitasbarang-{{$barang['id']}}-{{$distri[0]['attributes']['id_distributor']}}" min="0" name="barang[kuantitas_barang][]" value="{{$barang['quantity']}}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
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
<script>
    var harga = []
    var i = 1 ;
  
     $('form').each(function() {
        var distribId = 'distrib'+$(this).find('input[name=distributor_id]').val();
        var Id = $(this).find('input[name=distributor_id]').val();

        $total = 0
      $idBarang =   $(this).find("input[name='barang[id][]'").val();
      console.log($idBarang)
        $(this).find("input[name='barang[harga][]']").each(function() {
           
        var qty=$('form').find($('#kuantitasbarang-'+$idBarang+'-'+Id));
        console.log(qty)

        
        // console.log(qty);
        // console.log( $(this).find("input[name='barang[kuantitas_barang][]']").val())
        // console.log(kuantitas_barang)
        
        $total = $total + (parseInt($(this).val()));

        });
        $('#totalHarga'+Id).html($total);
// $(this).find($('#')).html($total)
        console.log($total)
        harga[distribId] =$(this).find('input[name=distributor_id]').val();
        
        console.log($(this).find('input[name=distributor_id]').val());  
        
    });

    console.log(harga);


//     $("input[name='barang[harga][]']").each(function() {
//     harga.push($(this).val());
// });
 console.log(harga);





</script>
<script>
    var distri = '{{Session::get('gagal')}}';
    var notif = '{{Session::get('notif')}}';

    if(distri){
        $(window).on('load',function(){
        $('#checkoutfailed').modal('show');
    });
    }
    else if(notif){
        $(window).on('load',function(){
        $('#checkoutberhasil').modal('show');
    });
    }
</script>
@endsection