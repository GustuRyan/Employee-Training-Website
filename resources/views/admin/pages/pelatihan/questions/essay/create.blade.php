@extends('admin.layouts.admin')
@section('page', 'Soal')
@section('title', 'Daftar Soal')

@section('content')
<div class="container">
    <h1>Tambah Soal</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('questions.storeEssay') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="soal" class="form-label">Soal</label>
            <input type="text" class="form-control" id="soal" name="soal" required>
        </div>
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" class="form-control" id="jawaban" name="jawaban" required>
        </div>
        <div class="mb-3">
            <label for="id_modul" class="form-label">ID Modul</label>
            <input type="number" class="form-control" id="id_modul" name="id_modul" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
