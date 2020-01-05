@extends('navbar')

@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-body" style="text-align:center">
                    <h4>Profil Toko</h4>
                    <div class="row no-gutters" style="background-color: ">
                        <div class="col-lg-4" style="background-color: ">
                            <div class="card mt-5 mb-3 mr-5 ml-5">
                                <div class="card-body" style="text-align:center; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                    <div>
                                        <img src="../storage/Avatar/{{Session::get('profile_image')}}" class="" alt="..." width='200px'>
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                <form action="/profil/edit">
                                    <button class='btn-purple' style="display: inline-block;font-weight: 400;text-align: center;border: 1px solid transparent;line-height: 1.5;border-radius: 0.25rem;padding: 0.375rem 0.75rem;">Edit Profil</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8" style="background-color: ">
                            <div class="m-5" style="text-align:left">
                                <b>Informasi Toko</b>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        Nama Toko
                                    </div>
                                    <div class="col">
                                        {{$data['nama_toko']}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Nama Pemilik
                                    </div>
                                    <div class="col">
                                        {{$data['nama_pemilik']}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Nomor HP
                                    </div>
                                    <div class="col">
                                        {{$data['no_telp']}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        Email Pemilik
                                    </div>
                                    <div class="col">
                                        {{$data['email_pemilik']}}
                                    </div>
                                </div>
                                <div class="row mt-2 mb-5">
                                    <div class="col-lg-4">
                                        Alamat Toko
                                    </div>
                                    <div class="col">
                                        {{$data['alamat_toko']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection