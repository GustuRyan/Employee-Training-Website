<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Laravel</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        .modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }

        .module-wrapper {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #dde7ff;
        }
    </style>
</head>

<body>
    @include('user.components.navbar')

    <main class="w-full px-12 py-12">
        <div class="module-wrapper p-12 rounded-xl mt-24">
            <div class="w-full flex justify-between text-3xl font-bold mb-8">
                <span>
                    Daftar Modul
                </span>
                <div class="relative flex justify-between">
                    <button class="btn btn-success dropdown-toggle navbar-search font-weight-bold" type="button"
                            id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false"
                            style="height: 100%; width: 240px; font-size: 20px;">
                        {{ $id }}
                    </button>
                    <div class="dropdown-menu animated--fade-in mt-2" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('pelatihan.index', 'Semua') }}">Semua</a>
                        @foreach ($topics as $topic)
                            <a class="dropdown-item" href="{{ route('pelatihan.index', $topic->id) }}">
                                {{ $topic->nama_topik }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($moduls as $modul)
                    <card class="bg-white p-4 rounded-2xl shadow-lg"
                        onclick="showModal('Modul 1: Pengenalan Laravel', 'Laravel adalah framework PHP open-source yang populer untuk membangun aplikasi web modern...')">
                        <img src="/gapura.jpg" alt="Gambar Laravel"
                            class="w-full h-[280px] rounded-t-xl mb-2 object-cover">
                        <h3 class="text-lg font-bold">Modul: {{ $modul->nama_modul }}</h3>
                        <h3 class="text-lg font-bold">Judul: {{ $modul->judul }}</h3>
                        <a href="{{ route('pelatihan.detail', $modul->id) }}" class="text-black">Selengkapnya</a>
                    </card>
                @endforeach
            </div>
            <div class="mt-4 px-2">
                {{ $moduls->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4">
        <p>&copy; 2024 Pelatihan Laravel</p>
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

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownButton = document.getElementById('dropdownMenuButton');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            window.addEventListener('click', function(event) {
                if (!event.target.matches('#dropdownMenuButton')) {
                    if (dropdownMenu.classList.contains('show')) {
                        dropdownMenu.classList.remove('show');
                    }
                }
            });
        });
    </script>
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
