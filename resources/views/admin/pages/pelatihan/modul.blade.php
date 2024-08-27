@extends('admin.layouts.admin')
@section('page')
    {{ $topik->judul }}
@endsection
@section('title')
    {{ $topik->judul }}
@endsection
@section('content')
    <div class="row g-3">
        @foreach($modules as $module)
        <div class="col-4">
            <a href="{{ route('manage.modul', $module->id) }}" class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="font-weight-bold text-primary">
                        {{ $module->nama_modul }}
                    </h4>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-normal text-primary">
                        {{ $module->deskripsi }}
                    </h6>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
