@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div style="padding: 10px;">
                        <div class="card-body p4">
                            <h4>Detail {{ $project->name }}</h4>
                            <table style="width: 100%" class="mb-4">
                                <tr>
                                    <td><b>Project Dimulai :</b> {{ date('d F Y', strtotime($project->start_date)) }}</td>
                                    <td><b>Project Berakhir :</b> {{ date('d F Y', strtotime($project->end_date)) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Tech Stack</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">{{ $project->tech_stack }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total Developer</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">{{ count($developers) }} Dev</td>
                                </tr>
                            </table>

                            <h4>Developer</h4>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Posisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($developers as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-xs">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->fullname }}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->email }}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->position }}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <h4 class="mt-4">Aktivitas / Progress tiket developer</h4>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="datatable1">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Judul</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Diambil Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-xs">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->title }}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->status }}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot me-4">
                                                        <i class="bg-info"></i>
                                                        <span class="text-secondary text-xs">{{ $item->assign ? $item->assign->fullname : 'Tiket Belum Dikerjakan' }}</span>
                                                    </span>
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
