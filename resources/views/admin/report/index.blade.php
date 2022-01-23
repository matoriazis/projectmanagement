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
                                <h3 class="mb-0">Report Project</h3>
                                <p class="mb-1">Silahkan pilih project dibawah untuk melihat report</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{route('admin.report.create')}}" method="POST">@csrf
                            <div class="form-group">
                                <select name="project_id" class="form-control" style="width: 50%;">
                                    @foreach ($projects as $item)
                                        <option value="{{$item->id}}">{{$item->name}} - {{$item->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Lihat Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
