@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-body" style="text-align:center">
                    <h4>Edit Profil</h4>
                    <form method="POST" action="/updateprofil">
                        @CSRF
                        <div class="row no-gutters" style="background-color: ">
                            <div class="col-lg-4" style="background-color: ">
                                <div class="card mt-5 mb-3 mr-5 ml-5">
                                    <div class="card-body" style="text-align:center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                        <div>
                                            <img src="../img/gambarLogo.jpg" class="" alt="..." width='200px'>
                                            <div class="form-group mt-3">
                                                <label for="exampleFormControlFile1">Pilih Foto</label>
                                                <input type="file" name='profile_image' class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8" style="background-color: ">
                                <div class="m-5" style="text-align:left">
                                    <b>Informasi Toko</b>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="nama_toko" class="col-form-label">Nama Toko
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name='nama_toko' autocomplete='off' required value="{{$data['nama_toko']}}"></input>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="nama_pemilik" class="col-form-label">Nama Pemilik
                                            </label>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name='nama_pemilik' autocomplete='off' required value="{{$data['nama_pemilik']}}"></input>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="no_telp" class="col-form-label">No Telp
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name='no_telp' autocomplete='off' required value="0{{$data['no_telp']}}"></input>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-5">
                                        <div class="col-lg-4">
                                            <label for="nama_pemilik" class="col-form-label">Email Pemilik
                                            </label> </div>
                                        <div class="col-lg-7">
                                            <input type="email" class="form-control" name='email_pemilik' autocomplete='off' required value="{{$data['email_pemilik']}}"></input>
                                            <span class='text-danger'></span>
                                        </div>
                                    </div>
                                    <b>Alamat Toko</b>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="alamat_toko" class="col-form-label">Alamat Lengkap
                                            </label> </div>
                                        <div class="col-lg-7">
                                            <textarea style="resize: none;" class="form-control" id="alamat_toko" autocomplete='off' rows="4" disable name='alamat_toko' required>{{$data['alamat_toko']}}</textarea> </div>
                                    </div>
                                    <div style="text-align: right">
                                        <div class="row mt-3">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-7">
                                                <button class='btn-purple' type="submit" style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Update Profil</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection