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
                                <h5 class="mb-0">Daftar Client</h5>
                            </div>
                            <a href="{{ route('admin.client.editor') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; Client Baru</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div style="padding: 24px;">
                                <table id="datatable1">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->fullname}}</td>
                                                <td>{{$item->company}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    <a onclick="return confirm('Yakin ingin menhapus {{$item->fullname}}?')" href="{{route('admin.client.delete', ['id' => $item->id])}}" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Hapus user">
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
