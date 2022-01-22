@extends('../../templates/layout')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">Buat Project</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{route('admin.project.editor.create')}}" method="POST"> @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama Project</label>
                                <input required class="form-control" type="text" placeholder="Masukan nama project" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Client</label>
                                <select required class="form-control" name="client_id" id="exampleFormControlSelect1">
                                    @foreach ($clients as $item)
                                        <option value="{{$item->id}}">{{$item->fullname}} | {{$item->company}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Mulai</label>
                                <input required class="form-control" type="date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Selesai</label>
                                <input required class="form-control" type="date" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textStack">Tech Stack</label>
                        <textarea required class="form-control" id="textStack" name="tech_stack" rows="3" placeholder="Masukan teknologi bahasa pemograman maupun teknologi pendukung yang digunakan dalam project, misalnya NodeJs, React, Docker, PostgreSQL dll"></textarea>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{ route('admin.project.index') }}"
                            class="btn bg-gradient-default btn-md mt-4 mb-4">Kembali</a>
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
