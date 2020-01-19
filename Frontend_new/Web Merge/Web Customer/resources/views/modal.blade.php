@if (Session::has('login'))
<div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4" style=" max-width: 30rem; max-height:11rem;">
                    <div class="row no-gutters" style="padding-right:15;">
                        <div class="col-3" id="fotoProduk">
                            <h2 style="padding-left:20%; margin-bottom:20;" id="fotoProduk"></h2>
                            <img id="image" src="" class="card-img p-1 mt-3" style="height: 10rem">
                        </div>
                        <div class="col-8">
                            <div class="card-body p-0">
                                <!-- <a href='#' onclick="geturl()" style="color:inherit;">
                                    <h2 style="padding-left:20%; margin-bottom:20;" id="namaDistributor"></h2>
                                </a> -->
                                <h2 style="padding-left:20%; margin-bottom:20;" id="namaBarang"></h2>
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <form id="dataProduk" action='/cart' action="POST">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">Distributor </div>
                                            <div class="col-6">:
                                            </div>
                                        </div>
                                        <a href='#' onclick="geturl()" style="color:inherit;">
                                            <p id="namaDistributor"></p>
                                        </a>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="def-number-input number-input safari_only col-6 pt-5">
                                        <input type="hidden" name="id" id="id_barang" value=''>
                                        <input type="hidden" name="stok_barang" id="stok_barang" value=''>
                                        <input type="hidden" name="foto_barang" id="foto_barang" value=''>
                                        <input type="hidden" name="id_distributor" id="idDistributor" value=''>
                                        <input type="hidden" name="nama_barang" id="nama_barang" value=''>
                                        <input type="hidden" name="harga_barang" id="harga_barang" value=''>
                                        <input type="hidden" name="nama_distributor" id="nama_distributor" value=''>
                                        <button type="button" onclick=" this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                        <input class="quantity" id="quantity" min="0" name="quantity" value="1" type="number">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                    </div>
                                </div>
                                <!-- <p style="text-align:right;margin-top:-10">Kota Produk</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-inline">
                    <p class="ml-4 mr-4" id="deskripsi_barang" style="text-indent: 5%;text-align: justify; text-justify: inter-word;">Deskripsi Produk sndjasdjhkjsa hdkkkkkkkds dkhajsdk ajsdhjkashd asjdashgd aghwdah jsdgj asgh djgashdjha sgj</p>
                    <div class="col-12"style="text-align:right">
                        <p class="ml-2 mr-2 mt-1" style="margin-bottom: -10" id="wilayahProduk">Kota Produk</p>
                    </div>
                </div>
                <hr>
                <div class="form-inline">
                    <p class="m-4">Tambah produk ke pesanan ?</p>
                    <button type="submit" class="m-3" id="tambah" onclick="">Tambah</button>
                    </form>
                    <button type="button" class="m-3" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm " id="modalNotif" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-body">
                produk berhasil ditambahkan
            </div>
        </div>
    </div>
</div>
@else
<div class="modal fade bd-example-modal-sm " id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                Harap Login Terlebih Dahulu
                <button type="button" onclick="window.location.href = '/login';" class="m-3" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    var login = '{{Session::get('
    login ')}}';
    console.log(login);
    $("button[name='shoplink']").on('click', function(params) {
        if (login) {
            $('#modalPesan').modal('toggle', $(this));
        } else {
            $('#modalLogin').modal('show');
        }
    });
    $('#modalPesan').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button[0].id;
        console.log(button[0].id);
        window.idDistributor = $('#' + id + 'isi').find('#distri').html();
        var idProduk = $('#' + id + 'isi').find('#idbarang').html();
        var namaDistributor = $('#' + id + 'isi').find('#distributor').html();
        var fotoProduk = $('#' + id + 'isi').find('#fotoProduk').html();
        var dataProduk = $('#' + id + 'isi').find('form').html();
        var hargaProduk = $('#' + id + 'isi').find('#harga').html();
        var namaProduk = $('#' + id + 'isi').find('#produk').html();
        var wilayahProduk = $('#' + id + 'isi').find('#wilayah').html();
        var stokProduk = $('#' + id + 'isi').find('form').find('#stok').html();
        var img = '../storage/' + window.idDistributor +'/'+ fotoProduk;
        console.log(wilayahProduk);
        // var fotoProduk = $('#' + id + 'isi').find('img').html();
        document.getElementById('foto_barang').value = fotoProduk;
        document.getElementById('idDistributor').value = idDistributor;
        document.getElementById('id_barang').value = idProduk;
        document.getElementById('namaBarang').innerHTML = namaProduk;
        document.getElementById('nama_distributor').value = namaDistributor;
        document.getElementById('harga_barang').value = hargaProduk;
        document.getElementById('nama_barang').value = namaProduk;
        document.getElementById('stok_barang').value = stokProduk;
        document.getElementById('namaDistributor').innerHTML = namaDistributor;
        document.getElementById('dataProduk').innerHTML = dataProduk;
        document.getElementById('wilayahProduk').innerHTML = wilayahProduk;
        
    $('#image').attr("src",img)
    console.log(img);
    })
    $('#tambah').click(function() {
        // event.stopPropagation();

        console.log($('#quantity').val());
        // $.ajax({
        //     type: "POST",
        //     url: 'http://localhost:8000/cart',
        //     data: {namaDistributor:namaDistributor},
        //     success: function(data){
        //        console.log(data);
        //     }
        // }); 

        $('#modalPesan').modal('hide').delay(2000);
        $('#modalNotif').modal('show');
        $('#btnSimpan').click();
        console.log("test");
    })



    function geturl() {
        window.location.href = '/distributor/' + window.idDistributor;
    }
</script>