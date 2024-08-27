@extends('admin.layouts.admin')
@section('page')
    Modul Create
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
                        Buat Modul Baru
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
                    <form action="{{ route('pelatihan.modul.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        Nama Modul*
                        <input class="form-control bg-light border-2 mr-4 mb-4" style="height: 48px;" type="text"
                            id="search" name="nama_modul" placeholder="Masukan Nama Modul">
                        Durasi*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center" style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search" name="durasi" placeholder="1">
                            <span>
                                Menit
                            </span>
                        </div>
                        Jumlah Soal Opsi*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center" style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search" name="jumlah_option" placeholder="1" value="{{ old('jumlah-option') }}">
                        </div>
                        Jumlah Soal Esai*
                        <div class="form-control bg-light border-2 mr-4 mb-4 d-flex align-items-center" style="height: 48px;">
                            <input class="form-control bg-light border-0" style="width: 72px;" type="number" id="search" name="jumlah_esai" placeholder="1" value="{{ old('jumlah-esai') }}">
                        </div>
                        Nama Topik*
                        <select class="form-control mb-4" name="id_topik">
                            <option value="">Pilih Topik</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}">
                                    {{ $topic->nama_topik }}
                                </option>
                            @endforeach
                        </select>
                        Judul Modul*
                        <input class="form-control bg-light border-2 mr-4 mb-4" style="height: 48px;" type="text"
                            id="search" name="judul" placeholder="Masukan judul Topik">
                        Deskripsi Modul*
                        <textarea class="form-control bg-light border-2 mr-4 mb-4" style="height: 96px;" id="search" name="deskripsi"
                            placeholder="Masukan Deskripsi Topik"></textarea>
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
