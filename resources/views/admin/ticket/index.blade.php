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
                                <form action="{{ route('admin.ticket.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-control-label">Filter Project</label>
                                                <select name="project" class="form-control">
                                                    @foreach ($projects as $item)
                                                        @if (isset($project_id) && $project_id == $item->id)
                                                            <option selected value="{{ $item->id }}">{{ $item->name }}
                                                                -
                                                                {{ $item->status }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }} -
                                                                {{ $item->status }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn bg-gradient-dark btn-md"
                                                style="margin-top: 31px;">Lihat</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a style="max-height: 45px; margin-top: 31px;" href="{{ route('admin.ticket.editor') }}" class="btn bg-gradient-primary btn-md mb-0"
                                type="button">+&nbsp; New Tiket</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div style="padding: 24px;">
                                <table id="datatable1">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Tiket</th>
                                        <th>Status</th>
                                        <th>Project</th>
                                        <th>Di Assign Oleh</th>
                                        <th>Di Buat Oleh</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->project->name }}</td>
                                                @if ($item->assign)
                                                    <td>{{ $item->assign->fullname }}</td>
                                                @else
                                                    <td>
                                                        <p style="font-size: 11px">Belum ada yang mengambil tiket</p>
                                                    </td>
                                                @endif
                                                <td>{{ $item->user->name }}</td>
                                                <td>
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit Tiket">
                                                        <i class="fas fa-edit text-info"></i>
                                                    </a>
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Hapus Tiket">
                                                        <i class="fas fa-trash-alt text-danger"></i>
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
