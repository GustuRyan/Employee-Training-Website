<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Laravel</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
            border-radius: 0.5rem;
            background-color: lightblue;
        }
    </style>
</head>

<body>

    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Pelatihan Laravel</h1>
    </header>

    <main class="container mx-auto p-4">
        <div class="module-wrapper p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 1: Pengenalan Laravel', 'Laravel adalah framework PHP open-source yang populer untuk membangun aplikasi web modern...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" alt="Gambar Laravel" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 1: Pengenalan Laravel</h3>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 2: Blade Templating', 'Blade Templating adalah sistem templating dalam Laravel yang sangat berguna...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" alt="Gambar Blade Template" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 2: Blade Templating</h3>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 3: Routing Lanjutan', 'Routing Lanjutan adalah bagian penting dari Laravel...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" alt="Gambar Routing" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 3: Routing Lanjutan</h3>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 4: Eloquent ORM', 'Eloquent ORM dalam Laravel digunakan untuk mengelola data...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 4: Eloquent ORM</h3>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 5: Autentikasi dan Otorisasi', 'Autentikasi dan Otorisasi penting untuk keamanan aplikasi Laravel...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" alt="Gambar Autentikasi" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 5: Autentikasi dan Otorisasi</h3>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg" onclick="showModal('Modul 6: Advanced Topics', 'Topik Lanjutan mencakup berbagai fitur Laravel yang lebih kompleks...')">
                    <img src="https://images.unsplash.com/photo-1715616680818-43a4a55d4d17?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTYxMTc2NjV8&ixlib=rb-4.0.3&q=85" class="mb-2">
                    <h3 class="text-lg font-bold">Modul 6: Advanced Topics</h3>
                </div>

            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4">
        <p>&copy; 2024 Pelatihan Laravel</p>
    </footer>

    <div id="modal" class="fixed w-full h-full top-0 left-0 flex items-center justify-center opacity-0 pointer-events-none">
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="bg-white w-1/2 rounded shadow-lg z-50 overflow-y-auto">
            <div class="py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold" id="modal-title">Modal Title</p>
                    <div class="modal-close cursor-pointer z-50" onclick="closeModal()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 3.53a.75.75 0 00-1.06-1.06L9 6.94 4.53 2.47a.75.75 0 10-1.06 1.06L7.94 9l-4.47 4.47a.75.75 0 101.06 1.06L9 11.06l4.47 4.47a.75.75 0 001.06-1.06L10.06 9l4.47-4.47z"></path>
                        </svg>
                    </div>
                </div>
                <p id="modal-content">Modal Content</p>
                <div class="flex justify-end pt-2">
                    <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" onclick="closeModal()">Close</button>
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