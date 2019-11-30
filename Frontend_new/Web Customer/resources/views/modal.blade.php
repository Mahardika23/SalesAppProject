<div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4" style=" max-width: 30rem; max-height:11rem;">
                    <div class="row no-gutters" style="padding-right:15;">
                        <div class="col-3" id="fotoProduk">
                        <img src="../img/minyak.jpg" class="card-img p-2" >
                        </div>
                        <div class="col-8">
                            <div class="card-body p-0">
                                <a href="/distributor" style="color:inherit;">
                                    <h2 style="padding-left:20%; margin-bottom:20;" id="namaDistributor"></h2>
                                </a>
                                <div class="row">
                                    <div class="col-6">
                                        <form id="dataProduk">

                                        </form>
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
                    <button type="submit" class="m-3" id="tambah">Tambah</button>
                    <button type="button" class="m-3" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modalPesan').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button[0].id;
        console.log(button[0].id);
        var namaDistributor = $('#' + id + 'isi').find('h2').html();
        var dataProduk = $('#' + id + 'isi').find('form').html();
        // var fotoProduk = $('#' + id + 'isi').find('img').html();
        document.getElementById('namaDistributor').innerHTML = namaDistributor;
        document.getElementById('dataProduk').innerHTML = dataProduk;
        // document.getElementById('fotoProduk').innerHTML = fotoProduk;
    })
</script>