@extends('../../templates/layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @include('../../templates/flash')
                <h3 class="mb-0">Daftar Project Anda</h3>
                <p class="mb-4">Klik kartu dibawah untuk melihat detail project sedang anda kerjakan</p>
                <div class="row">
                    @forelse ($projects as $item)
                        <div class="col-md-4">
                            <a href="{{ route('developer.project.detail', ['id' => $item->project_id]) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <p style="font-size: 11px" class="mb-0">
                                            {{ $item->project->client->company }}</p>
                                        <h3 class="gradientText my-auto">{{ $item->project->name }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-12" style="text-align: center">
                            <p style="margin-top: 10%" class="mx-auto"><b><i>Anda belum di assign ke project manapun</i></b></p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            cursor: pointer;
        }

        .card:hover {
            box-shadow: 1px 2px 30px rgba(255, 217, 0, 0.415);
        }

        .gradientText {
            margin-top: 13%;
            font-weight: bold;
            background: -webkit-linear-gradient(rgb(36, 203, 221), rgb(4, 49, 103));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

    </style>
@endpush
