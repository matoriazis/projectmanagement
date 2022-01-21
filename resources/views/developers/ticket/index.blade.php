@extends('../../templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">List Tiket</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div style="padding: 24px;">
                            <table id="datatable1">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Tiket</th>
                                    <th>Project</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>API Guru</td>
                                        <td>Simak</td>
                                        <td>
                                            <button type="button" class="btn bg-gradient-primary btn-sm">Ambil Tiket</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>API Murid</td>
                                        <td>Simak</td>
                                        <td>
                                            <button type="button" class="btn bg-gradient-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail</button>
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
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">API SIMAK</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h6>Description</h6>
            <p>Membuat API</p>
            <ul>
                <li>Create</li>
                <li>Update</li>
                <li>Delete</li>
            </ul>
        </div>
        <form action="#">
        <div class="col-md-6" style="padding: 24px;">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>In Progress</option>
                    <option>Done</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection