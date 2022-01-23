@extends('../templates/layout')
@section('content')
    <div style="padding: 24px">
        @include('../templates/flash')
        <h2>Halo, {{ \Auth::user()->name }}</h2>
        @forelse ($dashboard_data as $item)
            <h6>Project: {{ $item['project_name'] }}</h6>
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Ticket To Do</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $item['counter']['todo'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tiket In Progress</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $item['counter']['in_progress'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Ticket Done</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $item['counter']['done'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12 mt-4 mb-4">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tiket
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item['my_inprogress_ticket'] as $ticket)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{ $ticket->title }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">{{ $ticket->status }}</span>
                                        </span>
                                    </td>

                                    <td class="align-middle">
                                        <a href="{{route('developer.ticket.assign.change')}}?id={{$ticket->id}}" title="Ubah Status Tiket"
                                            onclick="return confirm('Ubah staus menjadi selesai?')"
                                            class="btn btn-link text-secondary mb-0">
                                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td style="text-align: center;" colspan="3">Belum ada tiket yang dikerjakan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @empty

        @endforelse
    </div>
@endsection
