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
                                        <th>Developer</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->start_date }}</td>
                                                <td>{{ $item->end_date }}</td>
                                                <td>{{ $item->client->fullname }}</td>
                                                <td>
                                                    @if (count($item->developers) > 0)
                                                        <div style="background: whitesmoke; border-radius: 5px; padding: 5px;">
                                                            @foreach ($item->developers as $dev)
                                                                <div
                                                                    style="border-radius: 5px; background: #f1eeee; padding: 5px; margin-bottom: 5px;">
                                                                    <p
                                                                        style="font-size: 11px; font-family: Arial; margin-bottom: unset">
                                                                        <i class="fa fa-user">
                                                                            {{ $dev->developer->fullname }}</i>
                                                                        <a onclick="return confirm('Keluarkan developer?')" href="{{route('admin.project.remove.dev')}}?id={{ $dev->id }}" title="Hapus {{$dev->developer->fullname}} dari project" style="float: right">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <p style="font-size: 11px">Belum Ada Developer</p>
                                                    @endif
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    @if ($item->status == 'Aktif')
                                                        <a onclick="return confirm('Ubah status projek menjadi selesai?')"
                                                            href="{{ route('admin.project.status.update', ['id' => $item->id]) }}"
                                                            class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Tandai Project Telah Selesai">
                                                            <i class="fas fa-check text-info"></i>
                                                        </a>
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit Project">
                                                            <i class="fas fa-edit text-success"></i>
                                                        </a>
                                                        <a onclick="openModal('{{ $item->id }}', '{{ $item->name }}')"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-users text-warning" data-bs-toggle="tooltip"
                                                                data-bs-original-title="Assign Developer"></i>
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

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Developer Project <span
                            id="projectName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.project.assign.dev.store') }}" method="POST">@csrf
                        <input type="hidden" name="project_id" id="projectId">
                        <div class="row">
                            <div class="col-md-12" style="padding: 24px;">
                                <label for="exampleFormControlSelect1">Silahkan Pilih Developer</label>
                                <div class="form-group">
                                    <select style="width: 100%" class="js-example-basic-multiple" name="developer[]"
                                        multiple="multiple">
                                        @foreach ($developers as $item)
                                            <option value="{{ $item->id }}">{{ $item->fullname }} |
                                                {{ $item->position }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection


    @push('scripts')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>

        <script>
            function openModal(projectId, projectName) {
                $('#projectName').text(projectName);
                $('#projectId').val(projectId);
                $('#exampleModal').modal('show');
            }
        </script>
    @endpush
