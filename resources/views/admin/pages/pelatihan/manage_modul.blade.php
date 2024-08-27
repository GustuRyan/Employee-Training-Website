@extends('admin.layouts.admin')

@section('page')
    Manage Modul
@endsection

@section('title')
    Judul Modul
@endsection

@section('content')
    <div class="row g-4">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="font-weight-bold text-primary">
                        Informasi Modul
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul Modul</label>
                            <input type="text" id="modulTitle" name="modulTitle" required class="form-control"
                                    aria-describedby="createNewTitle" placeholder="Masukan judul modul disini...">
                        </div>
                        <div class="form-group">
                            <label for="judul">Deskripsi</label>
                            <input type="text" id="modulDescription" name="modulDescription" required class="form-control"
                                    aria-describedby="createNewTitle" placeholder="Masukan deskripsi modul disini...">
                        </div>
                        <div class="form-group">
                            <label for="judul">Batas Waktu</label>
                            <select class="form-control" name="timeLimit" required="">
                                <option value="10">10 Minutes</option> 
                                <option value="20">20 Minutes</option> 
                                <option value="30">30 Minutes</option> 
                                <option value="40">40 Minutes</option> 
                                <option value="50">50 Minutes</option> 
                                <option value="60">60 Minutes</option> 
                            </select>
                        </div>

                        <div class="form-group" align="right">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="font-weight-bold text-primary">
                        Available Questions for Module
                    </h4>
                </div>
                <div class="card-body">
                    @if ($questionOptions->isEmpty())
                        <p>No question yet</p>
                    @else
                        <ul class="list-group">
                            @foreach($questionOptions as $questionOption)
                                <li class="list-group-item">{{ $questionOption->soal }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-footer">
                    <!-- Button to Add a Question -->
                    <a href="{{ route('question.create') }}" class="btn btn-primary">Add Question</a>
                </div>
            </div>
        </div>
    </div>
@endsection
