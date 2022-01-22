@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h4 class="mb-0">Buat Client Baru</h4>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{route('admin.client.editor.post')}}" method="POST" autocomplete="off" > @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Nama Lengkap Client</label>
                                <input required class="form-control" type="text" name="fullname" placeholder="Masukan nama lengkap client">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Nama Perusahaan</label>
                                <input required class="form-control" name="company" type="text" placeholder="Masukan nama perusahaan client">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">Email</label>
                                <input required name="email" class="form-control" autocomplete="off" type="email" placeholder="john@mail.com">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">Password</label>
                                <input required class="form-control" autocomplete="off" placeholder="Digunakan untuk client masuk kedalam aplikasi" name="password" type="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">No Ponsel</label>
                                <input required class="form-control" placeholder="08239934" name="phone" type="number">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Alamat Lengkap</label>
                                <input required class="form-control" type="text" name="address" placeholder="Masukan Alamat Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Provinsi</label>
                                <input required class="form-control" type="text" name="province" placeholder="Provinsi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kota</label>
                                <input required class="form-control" type="text" name="city" placeholder="Kota">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kecamatan</label>
                                <input required class="form-control" type="text" name="district" placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kelurahan</label>
                                <input required class="form-control" type="text" name="sub_district" placeholder="Kelurahan">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{ route('admin.client.index') }}"
                            class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
