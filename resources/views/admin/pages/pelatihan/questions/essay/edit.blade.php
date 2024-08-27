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
    <form action="{{ route('questions.updateEssay', $questionEssay->id) }}" method="POST" id="edit-question-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="soal" class="form-label">Soal</label>
            <input type="text" class="form-control" id="soal" name="soal" value="{{ $questionEssay->soal }}" required>
        </div>
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" class="form-control" id="jawaban" name="jawaban" value="{{ $questionEssay->jawaban }}" required>
        </div>
        <div class="mb-3">
            <label for="id_modul" class="form-label">ID Modul</label>
            <input type="number" class="form-control" id="id_modul" name="id_modul" value="{{ $questionEssay->id_modul }}" required>
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
