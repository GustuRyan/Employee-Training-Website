@extends('admin.layouts.admin')
@section('page', 'Soal')
@section('title', 'Edit Soal')

@section('content')
<div class="container">
    <h1>Edit Soal</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('questions.updateOpt', $questionOpt->id) }}" method="POST" id="edit-question-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="soal" class="form-label">Soal</label>
            <input type="text" class="form-control" id="soal" name="soal" value="{{ $questionOpt->soal }}" required>
        </div>
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" class="form-control" id="jawaban" name="jawaban" value="{{ $questionOpt->jawaban }}" required>
        </div>
        <div class="mb-3">
            <label for="option_a" class="form-label">Option A</label>
            <input type="text" class="form-control" id="option_a" name="option_a" value="{{ $questionOpt->option_a }}" required>
        </div>
        <div class="mb-3">
            <label for="option_b" class="form-label">Option B</label>
            <input type="text" class="form-control" id="option_b" name="option_b" value="{{ $questionOpt->option_b }}" required>
        </div>
        <div class="mb-3">
            <label for="option_c" class="form-label">Option C</label>
            <input type="text" class="form-control" id="option_c" name="option_c" value="{{ $questionOpt->option_c }}" required>
        </div>
        <div class="mb-3">
            <label for="option_d" class="form-label">Option D</label>
            <input type="text" class="form-control" id="option_d" name="option_d" value="{{ $questionOpt->option_d }}" required>
        </div>
        <div class="mb-3">
            <label for="option_e" class="form-label">Option E</label>
            <input type="text" class="form-control" id="option_e" name="option_e" value="{{ $questionOpt->option_e }}" required>
        </div>
        <div class="mb-3">
            <label for="id_modul" class="form-label">ID Modul</label>
            <input type="number" class="form-control" id="id_modul" name="id_modul" value="{{ $questionOpt->id_modul }}" required>
        </div>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back</a>
        <!-- Button for update with SweetAlert confirmation -->
        <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update</button>
    </form>
</div>

<!-- Script for SweetAlert confirmation -->
<script>
    function confirmUpdate() {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: 'Anda akan mengubah pertanyaan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, ubah pertanyaan!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, submit the form for update
                document.getElementById('edit-question-form').submit();
            }
        });
    }
</script>

@endsection
