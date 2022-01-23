@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Daftar Project Anda</h3>
            @include('../../templates/flash')
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div style="padding: 24px;">
                            <table id="datatable1">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Total Developer</th>
                                    <th>Tech Stack</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->start_date}}</td>
                                            <td>{{$item->developers_count}}</td>
                                            <td>{{$item->tech_stack}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="{{route('client.project.detail', ['id' => $item->id])}}" data-bs-toggle="tooltip" data-bs-original-title="Lihat detail project">
                                                    <i class="fa fa-eye text-info"></i>
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