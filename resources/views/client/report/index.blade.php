@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Report Developer</h6>
        </div>
        <div class="card-body pt-4 p-3">

            <form action="#">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Tanggal Mulai</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <input wire:model="user.location" class="form-control" type="date" id="name">
                            </div>
                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Tanggal Selesai</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <input wire:model="user.location" class="form-control" type="date" id="name">
                            </div>
                            @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn bg-gradient-dark btn-md" style="margin-top: 31px;">Lihat</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div style="padding: 24px;">
                    <table id="datatable1">
                        <thead>
                            <th>No</th>
                            <th>Nama Tiket</th>
                            <th>Developer</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>API Guru</td>
                                <td>Rizal Solahudin</td>
                                <td>Done</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>API Siswa</td>
                                <td>Rizal Solahudin</td>
                                <td>Done</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>API User</td>
                                <td>Galang</td>
                                <td>Done</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end" style="padding: 24px">
                <a href="{{ route('admin.developer.editor') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Print Report</a>
            </div>
        </div>
    </div>
</div>
@endsection