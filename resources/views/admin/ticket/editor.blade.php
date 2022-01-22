@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">Buat Tiket Baru</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{route('admin.ticket.editor.store')}}" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">Judul Tiket</label>
                                <input required class="form-control" name="title" type="text" placeholder="Masukan Judul Tiket" id="user-name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">Deskripsi</label>
                        <textarea required class="form-control" id="about" name="description" rows="3"
                            placeholder="Masukan Deskripsi Tiket"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama Project</label>
                            <select required class="form-control" name="project_id" id="exampleFormControlSelect1">
                                @foreach ($projects as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{ route('admin.ticket.index') }}"
                            class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
