@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Buat Developer</h6>
        </div>
        <div class="card-body pt-4 p-3">

            {{-- @if ($showDemoNotification)
                <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                    role="alert">
                    <span class="alert-text text-white">
                        {{ __('You are in a demo version, you can\'t update the profile.') }}</span>
                    <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification"
                    class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span
                        class="alert-text text-white">{{ __('Your profile information have been successfuly saved!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif --}}

            <form action="#">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Nama Lengkap</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Nama"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Tempat Lahir</label>
                            <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                <input wire:model="user.phone" class="form-control" type="text"
                                    placeholder="Bandung" id="phone">
                            </div>
                            @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Tanggal Lahir</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <input wire:model="user.location" class="form-control" type="date" id="name">
                            </div>
                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Jenis Kelamin</label>
                            <br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                                <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                                <label class="custom-control-label" for="customRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Email</label>
                            <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                <input wire:model="user.phone" class="form-control" type="email"
                                    placeholder="Bandung" id="phone">
                            </div>
                            @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">No Ponsel</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <input wire:model="user.location" class="form-control" type="tel" id="name">
                            </div>
                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status Perkawinan</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Belum Menikah</option>
                              <option>Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Islam</option>
                              <option>Kristen</option>
                              <option>Protestan</option>
                              <option>Hindu</option>
                              <option>Budha</option>
                              <option>Lainnya ..</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Kewarganegaraan</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <input wire:model="user.location" class="form-control" type="text" id="name">
                            </div>
                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Alamat Lengkap</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Jalan Soekarno Hatta"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Provinsi</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Provinsi"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>                      
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Kota</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Kota"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>                      
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Kecamatan</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Kecamatan"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>                      
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Kelurahan</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Kelurahan"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Posisi</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Backend</option>
                              <option>Frontend</option>
                              <option>FullStack</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bahasa yang dikuasai</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>PHP</option>
                              <option>Javascript</option>
                              <option>Java</option>
                            </select>
                        </div>
                    </div>                    
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ route('admin.developer.index') }}" class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection