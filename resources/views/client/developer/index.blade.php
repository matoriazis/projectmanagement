@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">List Developer</h5>
                        </div>
\                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div style="padding: 24px;">
                            <table id="datatable1">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Bahasa Pemrograman</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Aqil Almuhtadi</td>
                                        <td>Golang</td>
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