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
    <form action="{{ route('questions.storeOpt') }}" method="POST">
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
            <label for="option_a" class="form-label">Option A</label>
            <input type="text" class="form-control" id="option_a" name="option_a" required>
        </div>
        <div class="mb-3">
            <label for="option_b" class="form-label">Option B</label>
            <input type="text" class="form-control" id="option_b" name="option_b" required>
        </div>
        <div class="mb-3">
            <label for="option_c" class="form-label">Option C</label>
            <input type="text" class="form-control" id="option_c" name="option_c" required>
        </div>
        <div class="mb-3">
            <label for="option_d" class="form-label">Option D</label>
            <input type="text" class="form-control" id="option_d" name="option_d" required>
        </div>
        <div class="mb-3">
            <label for="option_e" class="form-label">Option E</label>
            <input type="text" class="form-control" id="option_e" name="option_e" required>
        </div>
        <div class="mb-3">
            <label for="id_modul" class="form-label">ID Modul</label>
            <input type="number" class="form-control" id="id_modul" name="id_modul" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
