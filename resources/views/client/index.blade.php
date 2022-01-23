@extends('../templates/layout')
@section('content')
<div style="padding: 24px">
  <h2>Halo, {{\Auth::user()->name}}</h2>
  <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tikcket In Progress</p>
                <h5 class="font-weight-bolder mb-0">
                  3
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
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ticket To Do</p>
                <h5 class="font-weight-bolder mb-0">
                  2
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
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ticket Done</p>
                <h5 class="font-weight-bolder mb-0">
                  10
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

  <div class="card col-md-9 mt-4">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tiket</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="d-flex px-2">
                <div class="my-auto">
                  <h6 class="mb-0 text-xs">FE Dashboard</h6>
                </div>
              </div>
            </td>
            <td>
              <span class="badge badge-dot me-4">
                <i class="bg-info"></i>
                <span class="text-dark text-xs">working</span>
              </span>
            </td>
  
            {{-- <td class="align-middle">
              <button class="btn btn-link text-secondary mb-0">
                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
              </button>
            </td> --}}
          </tr>
          <tr>
            <td>
              <div class="d-flex px-2">
                <div class="my-auto">
                  <h6 class="mb-0 text-xs">FE Wali Siswa</h6>
                </div>
              </div>
            </td>
            <td>
              <span class="badge badge-dot me-4">
                <i class="bg-info"></i>
                <span class="text-dark text-xs">To Do</span>
              </span>
            </td>
  
            {{-- <td class="align-middle">
              <button class="btn btn-link text-secondary mb-0">
                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
              </button>
            </td> --}}
          </tr>
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection