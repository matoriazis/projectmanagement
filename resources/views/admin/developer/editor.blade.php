@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">Buat Developer</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('admin.developer.editor.create') }}" method="POST"> @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Nama Lengkap</label>
                                <input required class="form-control" type="text" name="fullname" placeholder="Masukan nama lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">Tempat Lahir</label>
                                <input required class="form-control" type="text" name="birth_date" placeholder="Bandung">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">Tanggal Lahir</label>
                                <input required class="form-control" type="date" name="birth_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">Jenis Kelamin</label>
                                <br>
                                <div class="form-check form-check-inline mt-2">
                                    <input required value="Laki - Laki" name="gender" class="form-check-input" type="radio" selected
                                        name="flexRadioDefault" id="customRadio1">
                                    <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input required value="Perempuan" name="gender" class="form-check-input" type="radio"
                                        name="flexRadioDefault" id="customRadio2">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">Email</label>
                                <input required class="form-control" type="email" name="email" placeholder="John@mail.com">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">Email</label>
                                <input required class="form-control" type="password" name="password" placeholder="************">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">No Ponsel</label>
                                <input required class="form-control" type="number" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status Perkawinan</label>
                                <select class="form-control" name="mariage_status" id="exampleFormControlSelect1">
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Agama</label>
                                <select class="form-control" name="religion" id="exampleFormControlSelect1">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Lainnya">Lainnya ..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">Kewarganegaraan</label>
                                <input required class="form-control" name="nationality" type="text">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Alamat Lengkap</label>
                                <input required class="form-control" name="address" type="text" placeholder="Jalan Soekarno Hatta">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Provinsi</label>
                                <input required class="form-control" name="province" type="text" placeholder="Provinsi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kota</label>
                                <input required class="form-control" name="city" type="text" placeholder="Kota">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kecamatan</label>
                                <input required class="form-control" name="district" type="text" placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Kelurahan</label>
                                <input required class="form-control" name="sub_district" type="text" placeholder="Kelurahan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Posisi</label>
                                <select class="form-control" name="position" id="exampleFormControlSelect1">
                                    <option value="Backend">Backend</option>
                                    <option value="Frontend">Frontend</option>
                                    <option value="Fullstack">FullStack</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Bahasa pemograman yang dikuasai</label>
                                <input required class="form-control" name="programing_language" type="text"
                                    placeholder="Golang, Java, Kotlin, Ruby, PHP ....">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{ route('admin.developer.index') }}"
                            class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
