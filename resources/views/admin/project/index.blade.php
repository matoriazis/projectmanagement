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
                                <h5 class="mb-0">List Project</h5>
                            </div>
                            <a href="{{ route('admin.project.editor') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; New Project</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div style="padding: 24px;">
                                <table id="datatable1">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Project</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->start_date}}</td>
                                                <td>{{$item->end_date}}</td>
                                                <td>{{$item->client->fullname}}</td>
                                                <td>{{$item->status}}</td>
                                                <td>
                                                    @if ($item->status == 'Aktif')
                                                        <a onclick="return confirm('Ubah status projek menjadi selesai?')" href="{{route('admin.project.status.update', ['id' => $item->id])}}" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Tandai Project Telah Selesai">
                                                            <i class="fas fa-check text-info"></i>
                                                        </a>
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit Project">
                                                            <i class="fas fa-edit text-success"></i>
                                                        </a>
                                                    @else
                                                        <p style="font-size: 11px;">Project telah selesai</p>
                                                    @endif
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
