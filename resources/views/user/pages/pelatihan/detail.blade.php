<!-- resources/views/detail.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        .modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
    @include('user.components.navbar')

    <main class="container mx-auto p-4">
        @php
            $isDone = App\Models\Penilaian::where('user_id', 3)->where('modul_id', $id)->first();
        @endphp
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-300 mt-24">
            <div class="flex items-center justify-between">
                <h1 class="font-bold text-4xl">{{ $modul->judul }}</h1>
            </div>
            <div class="flex items-start justify-between mt-4">
                <div class="flex-1 flex flex-col items-start">
                    <br><img src="/gapura.jpg" alt="Completed Info" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4 w-full flex">
                        @if ($isDone != null)
                            <div
                                class="w-full bg-green-500 text-center text-white px-4 py-2 rounded-lg flex-1 text-2xl font-bold">Sudah Selesai</div>
                        @else
                            <a href="{{ route('pelatihan.soal', $modul->id) }}"
                                class="w-full bg-blue-500 text-center text-white px-4 py-2 rounded-lg flex-1 text-2xl font-bold">Mulai
                                Latihan</a>
                        @endif
                    </div>
                </div>
                <div class="flex-1 flex flex-col items-end text-gray-500 text-right text-xl border-l-2">
                    <div class="mt-2 text-gray-700">
                        @if ($isDone != null)
                            <p class="font-bold text-3xl">Sudah Dikerjakan</p>
                        @else
                            <p class="font-bold text-3xl">Belum Pernah Dikerjakan</p>
                        @endif
                    </div>
                    <p class="mt-4">Online</p>
                    <p>{{ $modul->durasi }} Menit</p>
                    <p>Tanggal selesai pelatihan: 11 May 2024</p>
                    <p class="mt-4 font-bold">
                        Jumlah Soal:
                        <br>
                        <span class="font-normal">
                            {{ $total }} ( Kombinasi Option dan Esai )
                        </span>
                    </p>
                </div>
            </div>
            <div class="mt-6">
                <h2 class="text-2xl font-semibold border-b pb-2">Description</h2>
                <p class="mt-2 text-gray-700 w-[560px] text-xl">
                    {{ $modul->deskripsi }}
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-10">
        <p>&copy; 2024 Course Details</p>
    </footer>

    <div id="modal"
        class="fixed w-full h-full top-0 left-0 flex items-center justify-center opacity-0 pointer-events-none">
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="bg-white w-1/2 rounded shadow-lg z-50 overflow-y-auto">
            <div class="py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold" id="modal-title">Modal Title</p>
                    <div class="modal-close cursor-pointer z-50" onclick="closeModal()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 3.53a.75.75 0 00-1.06-1.06L9 6.94 4.53 2.47a.75.75 0 10-1.06 1.06L7.94 9l-4.47 4.47a.75.75 0 101.06 1.06L9 11.06l4.47 4.47a.75.75 0 001.06-1.06L10.06 9l4.47-4.47z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p id="modal-content">Modal Content</p>
                <div class="flex justify-end pt-2">
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"
                        onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(title, content) {
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-content').innerText = content;
            const modal = document.getElementById('modal');
            modal.classList.add('modal-active');
            modal.classList.remove('pointer-events-none', 'opacity-0');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('modal-active');
            modal.classList.add('pointer-events-none', 'opacity-0');
        }

        document.addEventListener('click', function(event) {
            const modal = document.getElementById('modal');
            const target = event.target;
            if (!modal.contains(target) && !modal.classList.contains('pointer-events-none')) {
                closeModal();
            }
        });
    </script>

</body>

</html>
