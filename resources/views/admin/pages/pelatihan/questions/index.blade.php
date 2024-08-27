@extends('admin.layouts.admin')
@section('page', 'Soal')
@section('title', 'Daftar Soal')

@section('content')
<div class="custom-container">
    <a href="{{ route('questions.createOpt') }}" class="btn btn-primary">Tambah Soal Option</a>
    <a href="{{ route('questions.createEssay') }}" class="btn btn-primary">Tambah Soal Essay</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        <script>
            // Display SweetAlert success message
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ $message }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div class="table-responsive mt-3">
        <h2>Soal Pilihan Ganda</h2> <!-- Title for the first table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Soal</th>
                    <th>Jawaban</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Option E</th>
                    <th>ID Modul</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questionsOpt as $questionOpt)
                <tr>
                    <td>{{ $questionOpt->id }}</td>
                    <td>{{ $questionOpt->soal }}</td>
                    <td>{{ $questionOpt->jawaban }}</td>
                    <td>{{ $questionOpt->option_a }}</td>
                    <td>{{ $questionOpt->option_b }}</td>
                    <td>{{ $questionOpt->option_c }}</td>
                    <td>{{ $questionOpt->option_d }}</td>
                    <td>{{ $questionOpt->option_e }}</td>
                    <td>{{ $questionOpt->id_modul }}</td>
                    <td>
                        <a href="{{ route('questions.editOpt', $questionOpt->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroyOpt', $questionOpt->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $questionOpt->id }}">
                            @csrf
                            @method('DELETE')
                            <!-- Delete button with SweetAlert confirmation -->
                            <button type="button" class="btn btn-danger" onclick="confirmDeleteOpt({{ $questionOpt->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <hr> <!-- Separator between tables -->
    <div class="table-responsive mt-3">
        <h2>Soal Essay</h2> <!-- Title for the second table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Soal</th>
                    <th>Jawaban</th>
                    <th>ID Modul</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questionsEssay as $questionEssay)
                <tr>
                    <td>{{ $questionEssay->id }}</td>
                    <td>{{ $questionEssay->soal }}</td>
                    <td>{{ $questionEssay->jawaban }}</td>
                    <td>{{ $questionEssay->id_modul }}</td>
                    <td>
                        <a href="{{ route('questions.editEssay', $questionEssay->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroyEssay', $questionEssay->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $questionEssay->id }}">
                            @csrf
                            @method('DELETE')
                            <!-- Delete button with SweetAlert confirmation -->
                            <button type="button" class="btn btn-danger" onclick="confirmDeleteEssay({{ $questionEssay->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $questionsEssay->links() }}
</div>

<script>
    function confirmDeleteOpt(questionOptId) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: 'Soal akan dihapus dan tidak dapat dipulihkan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus soal!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, submit the form for deletion
                document.getElementById('delete-form-' + questionOptId).submit();
            }
        });
    }

    function confirmDeleteEssay(questionEssayId) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: 'Soal akan dihapus dan tidak dapat dipulihkan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus soal!',
            cancelButtonText: 'Tidak, batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, submit the form for deletion
                document.getElementById('delete-form-' + questionEssayId).submit();
            }
        });
    }
</script>

@endsection
