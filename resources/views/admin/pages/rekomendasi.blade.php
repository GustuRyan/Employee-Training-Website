@extends('admin.layouts.admin')
@section('page')
    Rekomendasi
@endsection
@section('title')
    Fitur Rekomendasi Penerimaan
@endsection
@section('content')
    @php
        $rating_options = [
            'Sangat Amat Tidak Baik',
            'Sangat Tidak Baik',
            'Tidak Baik',
            'Biasa',
            'Baik',
            'Sangat Baik',
            'Sangat Amat Baik',
        ];
    @endphp
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Input Skor Pelamar
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <h6 class="font-weight-normal text-primary">
                                Nama Pelamar*
                            </h6>
                            <div class="form-group">
                                <input type="text" id="product_name" name="product_name" required class="form-control"
                                    aria-describedby="createNewTitle" placeholder="Masukan Nama Pelamar Disini...">
                            </div>
                        </div>
                        <div style="border-top: 2px solid #ccd6fc;">
                            <h5 class="font-weight-bold text-primary my-4">
                                Kompetensi
                            </h5>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Riwayat Pendidikan*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Pengalaman*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Keahlian*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Prestasi*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="border-top: 2px solid #ccd6fc;">
                            <h5 class="font-weight-bold text-primary my-4">
                                Penugasan
                            </h5>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Kompleksitas*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Kreativitas*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Inovasi*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="border-top: 2px solid #ccd6fc;">
                            <h5 class="font-weight-bold text-primary my-4">
                                Wawancara
                            </h5>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Mental*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Attitude*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Komunikasi*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="dropdown mb-4">
                                <h6 class="font-weight-normal text-primary">
                                    Motivasi*
                                </h6>
                                <select class="form-control" name="pendidikan">
                                    @foreach ($rating_options as $key => $rating)
                                        <option value="{{ $key + 1 }}" class="dropdown-item">
                                            {{ $rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-sm-flex justify-content-end pt-5">
                            <button type="submit" class='btn btn-success'>
                                <span class="font-weight-bolder text m-3">Submit</span>
                            </button>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
