@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">List Client</h5>
                        </div>
                        <a href="{{ route('admin.client.editor') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Client</a>
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
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Azis Matori</td>
                                        <td>PT Hasabi</td>
                                        <td>
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>
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