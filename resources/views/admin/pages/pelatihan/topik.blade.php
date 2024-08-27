@extends('admin.layouts.admin')
@section('page')
    Daftar Topik
@endsection
@section('title')
    Daftar Topik
@endsection
@section('content')
    <div class="row g-3">
        @foreach($topiks as $topik)
        <div class="col-4">
            <a href="{{ route('topik.modul', ['id' => $topik->id]) }}" class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="font-weight-bold text-primary">
                        {{ $topik->nama_topik }}
                    </h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
