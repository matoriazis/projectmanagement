@extends('../../templates/layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @include('../../templates/flash')
                <h3 class="mb-0">{{ $project->name }}</h3>
                <p class="mb-4">Detail Project & TIcket</p>
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header mb-0">
                                <h4>To Do</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <div style="padding: 24px;">
                                        <table id="datatable1">
                                            <thead>
                                                <th>No</th>
                                                <th>Nama Tiket</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($todo_tickets as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>
                                                            {{ $item->status }}
                                                        </td>
                                                        <td>
                                                            <button class="btn bg-gradient-info btn-xs"
                                                                onclick="openDetailModal('{{ $item->title }}', '{{ $item->description }}', '{{ $item->status }}')"><i
                                                                    class="fa fa-eye text-white"></i>
                                                            </button>
                                                            @if ($item->status == 'Belum Dikerjakan')
                                                                <a href="{{ route('developer.ticket.assign') }}?id={{ $item->id }}"
                                                                    onclick="return confirm('Yakin akan mengambil tiket?')"
                                                                    class="btn bg-gradient-success btn-xs">
                                                                    <i class="fa fa-check text-white"></i>
                                                                    Ambil Tiket
                                                                </a>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tiket yang diambil / Sedang anda dikerjakan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <div style="padding: 24px;">
                                        <table id="datatable2">
                                            <thead>
                                                <th>No</th>
                                                <th>Nama Tiket</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($my_tickets as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>
                                                            @if ($item->status == 'Sedang Dikerjakan')
                                                                <a href="{{route('developer.ticket.assign.change')}}?id={{$item->id}}" title="Ubah Status Menjadi Selesai"
                                                                    style="cursor: pointer;"
                                                                    onclick="return confirm('Ubah status tiket menjadi selesai?')">
                                                                    <i class="fa fa-check text-success"></i>
                                                                </a>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ticketDetailModal" tabindex="-1" aria-labelledby="ticketDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="modalBody"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable2').DataTable();
        });
    </script>
    <script>
        function openDetailModal(title, desc, status) {
            var html = `
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketDetailModalLabel">${title}</h5>
                    <button style="color: black;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Description</h6>
                    <p>${desc}</p>
                    <h6>Status</h6>
                    <p><b>${status}</b></p>
                </div>
            `

            $('#modalBody').empty()
            $('#modalBody').append(html)
            $('#ticketDetailModal').modal('show');
        }
    </script>

@endpush
