@extends('admin.layouts.admin')
@section('page')
    Modul Update
@endsection
@section('title')
    Modul
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Ubah Modul {{ $modul->nama_modul }}
                    </h4>
                    @if (session('success'))
                        <div class="w-full fixed top-0">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('pelatihan.modul.update', $modul->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        Nama Modul ( {{ $modul->nama_modul }} )*
                        <input class="form-control bg-light border-2 mr-4 mb-4" style="height: 48px;" type="text"
                            id="search" name="nama_modul" value="{{ $modul->nama_modul }}">
                        Durasi ( {{ $modul->durasi }} Menit )*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center"
                            style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search"
                                name="durasi" value="{{ $modul->durasi }}">
                            <span>
                                Menit
                            </span>
                        </div>
                        Jumlah Soal Opsi ( {{ $modul->jumlah_option }} )*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center"
                            style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search"
                                name="jumlah_option" value="{{ $modul->jumlah_option }}">
                        </div>
                        Jumlah Soal Esai ( {{ $modul->jumlah_esai }} )*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center"
                            style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search"
                                name="jumlah_esai" value="{{ $modul->jumlah_esai }}">
                        </div>

                        Nama Topik ( {{ $topik->nama_topik }} )*
                        <select class="form-control mb-4" name="id_topik">
                            <option value="{{ $topik->id }}">{{ $topik->nama_topik }}</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}">
                                    {{ $topic->nama_topik }}
                                </option>
                            @endforeach
                        </select>
                        Judul Modul ( {{ $modul->judul }} )*
                        <input class="form-control bg-light border-2 mr-4 mb-4" style="height: 48px;" type="text"
                            id="search" name="judul" value="{{ $modul->judul }}">
                        Deskripsi Modul
                        <br> ( {{ $modul->deskripsi }} )*
                        <textarea class="form-control bg-light border-2 mr-4 mb-4 mt-2" style="height: 96px;" id="search" name="deskripsi">{{ $modul->deskripsi }}</textarea>
                        <div class="d-sm-flex justify-content-end pt-5">
                            <button type="submit" class='btn btn-success'>
                                <span class="font-weight-bolder text m-3">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
