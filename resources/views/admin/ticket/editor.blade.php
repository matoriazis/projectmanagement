@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Buat Tiket</h6>
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
                            <label for="user-name" class="form-control-label">Judul Tiket</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Masukan Judul Tiket"
                                    id="user-name">
                            </div>
                            @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="about">Deskripsi</label>
                    <div class="@error('user.about')border border-danger rounded-3 @enderror">
                        <textarea wire:model="user.about" class="form-control" id="about" rows="3"
                            placeholder="Masukan Deskripsi"></textarea>
                    </div>
                    @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Assign By</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Aqil</option>
                          <option>Javascript</option>
                          <option>Java</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>In Progress</option>
                          <option>Javascript</option>
                          <option>Java</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ route('admin.ticket.index') }}" class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection