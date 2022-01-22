@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @include('../../templates/flash')
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">List Developer</h5>
                            </div>
                            <a href="{{ route('admin.developer.editor') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; New Developer</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div style="padding: 24px;">
                                <table id="datatable1">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Posisi Pekerjaan</th>
                                        <th>Bahasa Pemrograman</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($developers as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->fullname}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->position}}</td>
                                                <td>{{$item->programing_language}}</td>
                                                <td>
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit Developer">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Hapus Developer">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
