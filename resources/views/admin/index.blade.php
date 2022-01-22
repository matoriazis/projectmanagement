@extends('../templates/layout')
@section('content')
    <div style="padding: 24px">
        <h2 style="padding: 24px">Dashboard</h2>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Developer</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $count['developer'] }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-html5 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Client</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $count['client'] }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Project Berjalan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $count['project_progress'] }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Project Selesai</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $count['project_done'] }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-12 mt-4">
            <h6 style="padding: 10px 0 0 15px">Project Sedang Berjalan</h6>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Projek</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $item)
                            <tr>
                                <th >
                                  <div class="d-flex px-3">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-xs">{{$loop->iteration}}</h6>
                                    </div>
                                </div></th>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-xs">{{ $item->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span
                                            class="text-dark text-xs">{{ $item->client->fullname . ' - ' . $item->client->company }}</span>
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
@endsection
