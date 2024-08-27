@extends('admin.layouts.admin')
@section('page')
    Modul
@endsection
@section('title')
    Modul
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Topik
                    </h4>
                </div>
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between align-items-center h-full">
                            <button class="btn btn-success dropdown-toggle navbar-search font-weight-bold" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="height: 100%; width: 240px; font-size: 20px;">
                                {{ $id }}
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('pelatihan.modul.index', 'Semua') }}">Semua</a>
                                @foreach ($topics as $topic)
                                    <a class="dropdown-item" href="{{ route('pelatihan.modul.index', $topic->id) }}">
                                        {{ $topic->nama_topik }}
                                    </a>
                                @endforeach
                            </div>
                            <div class=" d-flex flex-row" style="height: 48px; gap: 6px;">
                                @if ($id != 'Semua' && $id != 'Umum')
                                    <a id="toggle-edit" class='btn btn-warning btn-none-border' style="height: 100%">
                                        <span class="icon text-white">
                                            <i class="fas fa-pen-alt fa-lg my-2"></i>
                                        </span>
                                    </a>
                                    <a href="{{ route('pelatihan.topic.delete', $topic->id) }}"
                                        class="btn btn-danger" data-confirm-delete="true">
                                        <span class="icon text-white">
                                            <i class="fas fa-trash fa-lg my-2" style="margin: 0 1px"></i>
                                        </span>
                                    </a>
                                @endif
                                <a id="toggle-create" class='btn btn-primary btn-none-border font-weight-bolder'
                                    style="height: 100%;">
                                    <span class="icon text-white">
                                        <i class="fas fa-plus fa-lg my-2 mr-2" style="margin: 0 1px"></i> Tambah Topik
                                    </span>
                                </a>
                                @if (session('success'))
                                    <div class="w-full">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('pelatihan.topic.update', $topic->id) }}" method="POST" id="toggled-edit"
                            class="mt-3 h-full p-4 border-2 font-weight-bolder"
                            style="border: 3px solid #dcdcdc; border-radius: 12px; font-size: 16px; display: none;">
                            @csrf
                            @method('PUT')
                            <div class="d-flex justify-content-between">
                                <span>
                                    Mengubah Topik: {{ $topic->nama_topik }}
                                </span>
                            </div>
                            <div class="d-flex pt-2">
                                <input class="form-control bg-light border-2 mr-4" style="height: 48px;" type="text"
                                    id="search" name="nama_topik" placeholder="Masukan Nama Topik">
                                <button type="submit" id="toggle-edit"
                                    class='btn btn-warning btn-none-border d-flex align-items-center font-weight-bolder'
                                    style="height: 48px; font-size: 16px;">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <form action="{{ route('pelatihan.topic.store') }}" method="POST" id="toggled-create"
                            class="mt-3 h-full p-4 border-2 font-weight-bolder"
                            style="border: 3px solid #dcdcdc; border-radius: 12px; font-size: 16px; display: none;">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <span>
                                    Menambah Topik Baru
                                </span>
                            </div>
                            <div class="d-flex pt-2">
                                <input class="form-control bg-light border-2 mr-4" style="height: 48px;" type="text"
                                    id="search" name="nama_topik" placeholder="Masukan Nama Topik">
                                <button type="submit" id="toggle-edit"
                                    class='btn btn-primary btn-none-border d-flex align-items-center font-weight-bolder'
                                    style="height: 48px; font-size: 16px;">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <div class="my-4" style="border-top: 2px solid #ccd6fc;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Daftar Modul
                    </h4>
                    <a id="" href="{{ route('pelatihan.modul.create') }}"
                        class='btn btn-primary btn-none-border font-weight-bolder' style="height: 100%;">
                        <span class="icon text-white">
                            <i class="fas fa-plus fa-lg my-2 mr-2" style="margin: 0 1px"></i> Tambah Modul
                        </span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="my-4"
                            style="border-top: 2px solid #ccd6fc; display: grid; grid-template-columns: repeat(3, 1fr);
                        gap: 10px;">
                            @foreach ($moduls as $modul)
                                <div class="mt-3 mx-2 h-full p-4 border-2 font-weight-bolder w-full"
                                    style="border: 3px solid #dcdcdc; border-radius: 12px; font-size: 16px;">
                                    <div class="w-full">
                                        <img src="/gapura.jpg" alt="Gambar {{ $modul->nama_modul }}" class="w-full"
                                            style="width: 100%; border-radius: 12px 12px 0px 0px;">
                                        <div class="mt-2">
                                            {{ $modul->nama_modul }}
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold mb-2">{{ $modul->judul }}</h3>
                                        <p class="text-gray-700 mb-4">{{ Str::limit($modul->deskripsi, 95) }}</p>
                                        <div class="d-flex justify-content-between  align-items-center">
                                            <span class="text-sm text-gray-700"> 1 jam 30 menit </span>
                                            <div>
                                                <a id="" class='btn btn-primary btn-none-border'
                                                    style="height: 100%">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-info-circle fa-lg my-2"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('pelatihan.modul.edit', $modul->id_topik) }}"
                                                    id="" class='btn btn-warning btn-none-border'
                                                    style="height: 100%">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-pen-alt fa-lg my-2"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('pelatihan.modul.delete', $modul->id) }}"
                                                    class="btn btn-danger" data-confirm-delete="true">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash fa-lg my-2" style="margin: 0 1px"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4 px-2">
                            {{ $moduls->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Ambil elemen tombol dan elemen yang akan ditoggle
        var toggleButton1 = document.getElementById("toggle-edit");
        var toggledElement1 = document.getElementById("toggled-edit");
        var toggleButton2 = document.getElementById("toggle-create");
        var toggledElement2 = document.getElementById("toggled-create");

        // Tambahkan event listener untuk mengatur toggle tombol edit
        toggleButton1.addEventListener("click", function() {
            // Periksa apakah elemen sudah ditampilkan atau disembunyikan
            if (toggledElement1.style.display !== "block") {
                // Jika belum ditampilkan, tampilkan elemen
                toggledElement1.style.display = "block";
                // Sembunyikan elemen lain jika sedang ditampilkan
                toggledElement2.style.display = "none";
            } else {
                // Jika sudah ditampilkan, sembunyikan elemen
                toggledElement1.style.display = "none";
            }
        });

        // Tambahkan event listener untuk mengatur toggle tombol create
        toggleButton2.addEventListener("click", function() {
            // Periksa apakah elemen sudah ditampilkan atau disembunyikan
            if (toggledElement2.style.display !== "block") {
                // Jika belum ditampilkan, tampilkan elemen
                toggledElement2.style.display = "block";
                // Sembunyikan elemen lain jika sedang ditampilkan
                toggledElement1.style.display = "none";
            } else {
                // Jika sudah ditampilkan, sembunyikan elemen
                toggledElement2.style.display = "none";
            }
        });
    </script>
@endsection
