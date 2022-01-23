@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h4 class="mb-0">Report Project</h4>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('client.project.report') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Filter Project</label>
                                <select name="project" class="form-control">
                                    @foreach ($projects as $item)
                                        @if (isset($project_id) && $project_id == $item->id)
                                            <option selected value="{{ $item->id }}">{{ $item->name }} -
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
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <div style="padding: 24px;">
                        <table id="datatable1">
                            <thead>
                                <th>No</th>
                                <th>Nama Developer</th>
                                <th>Project</th>
                                <th>Tiket Selesai</th>
                                <th>Tiket Dikerjakan</th>
                            </thead>
                            <tbody>
                                @foreach ($report_data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->dev_name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->ticket_done }}</td>
                                        <td>{{ $item->ticket_progress }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
