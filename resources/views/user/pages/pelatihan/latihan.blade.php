<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .no-select {
            user-select: none;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
        }

        /* CSS untuk menghilangkan scrollbar */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .countdown {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .countdown.warning {
            color: red;
            background-color: #ffe5e5;
        }

        .flagged {
            border: 2px solid #f54444;
            padding: 2px 5px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Course Details</h1>
    </header>

    <main x-data="{ open: false }" class="p-12">
        <div class="w-full h-screen p-8 pl-2 flex flex-col rounded-2xl shadow-lg border-2">
            <div class="w-full flex justify-between items-center px-8 font-bold text-xl">
                <p class="text-2xl flex items-center">
                    <span class="h-4">
                        Pelatihan Modul
                    </span>
                </p>
                <span class="hidden" id="moduleDuration">
                    {{ $modul->durasi }}
                </span>
                <div class="countdown px-4 py-2 text-green-800 bg-green-200 rounded-xl" id="countdown"></div>
            </div>
            <div class="w-full h-screen p-8 pl-2 flex">
                <div class="w-[20%] h-full overflow-y-scroll scrollbar-hide p-4 border-r-2">
                    <div class="grid grid-cols-4 w-48 gap-x-8 gap-y-2">
                        @foreach ($shuffled as $key => $question)
                            @php
                                if ($question->type == 'option') {
                                    $checkAnswer = App\Models\Penilaian::where('user_id', 3)
                                        ->where('option_id', $question->id)
                                        ->first();
                                } else {
                                    $checkAnswer = App\Models\Penilaian::where('user_id', 3)
                                        ->where('essai_id', $question->id)
                                        ->first();
                                }
                            @endphp

                            @if (request()->query('page') == $key + 1)
                                <a class="relative w-12 h-12 bg-white border-2 border-[#2c2c2c] flex items-center justify-center text-center text-[#2c2c2c] text-lg font-bold rounded-2xl"
                                    href="{{ route('pelatihan.soal', ['id' => $id, 'page' => $key + 1]) }}">
                                    {{ $key + 1 }}
                                    @if ($checkAnswer && $checkAnswer->answer != null)
                                        <div class="absolute w-4 h-4 rounded-full bg-[#2a61d8] top-0 right-0"></div>
                                    @endif
                                    @if ($checkAnswer && $checkAnswer->flag == 1)
                                        <div class="absolute w-4 h-4 rounded-full bg-red-600 top-0 right-0"></div>
                                    @endif
                                </a>
                            @else
                                <a class="relative w-12 h-12 bg-[#2c2c2c] flex items-center justify-center text-center text-white text-lg font-bold rounded-2xl hover:bg-[#525252]"
                                    href="{{ route('pelatihan.soal', ['id' => $id, 'page' => $key + 1]) }}">
                                    {{ $key + 1 }}
                                    @if ($checkAnswer && $checkAnswer->answer != null)
                                        <div class="absolute w-4 h-4 rounded-full bg-[#2a61d8] top-0 right-0"></div>
                                    @endif
                                    @if ($checkAnswer && $checkAnswer->flag == 1)
                                        <div class="absolute w-4 h-4 rounded-full bg-red-600 top-0 right-0"></div>
                                    @endif
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div>
                <section class="w-[80%] h-full flex flex-col p-4 no-select text-xl">
                    <form id="questionForm" action="{{ route('answer.post') }}" method="POST">
                        @csrf
                        <div class="w-full h-full flex flex-col justify-between">
                            <input type="text" name="user_id" value="3" class="hidden">
                            <input type="text" name="modul_id" value="{{ $id }}" class="hidden">
                            @foreach ($paginatedQuestions as $key => $question)
                                @php
                                    if ($question->type == 'option') {
                                        $isAnswered = App\Models\Penilaian::where('user_id', 3)
                                            ->where('option_id', $question->id)
                                            ->first();
                                    } else {
                                        $isAnswered = App\Models\Penilaian::where('user_id', 3)
                                            ->where('essai_id', $question->id)
                                            ->first();
                                    }
                                @endphp
                                <div class="w-full flex justify-end items-center mb-4">
                                    <input type="text" id="flagInput" name="flag"
                                        value="{{ $isAnswered && $isAnswered->flag == 1 ? '1' : '0' }}"
                                        class="mr-2 hidden">
                                    @if ($isAnswered && $isAnswered->flag == 1)
                                        <span id="flagLabel" class="flagged" style="cursor: pointer;">Tandai soal
                                            ini</span>
                                    @else
                                        <span id="flagLabel" class="" style="cursor: pointer;">Tandai soal
                                            ini</span>
                                    @endif
                                </div>
                                <input type="text" class="hidden" value="{{ $question->jawaban }}"
                                    name="true_answer">
                                @if ($question->type == 'option')
                                    <input type="text" value="{{ $question->id }}" name="option_id" class="hidden">
                                    <input type="text" value="" name="essai_id" class="hidden">
                                @else
                                    <input type="text" value="{{ $question->id }}" name="essai_id" class="hidden">
                                    <input type="text" value="" name="option_id" class="hidden">
                                @endif
                                <div class="flex flex-col">
                                    <p>{{ $question->soal }}</p>
                                    @if ($question->option_a != null)
                                        <div>
                                            <label class="pr-6 py-2 cursor-pointer">
                                                <input class="cursor-pointer" type="radio" name="answer"
                                                    value="{{ $question->option_a }}"
                                                    @if ($isAnswered && strcmp($isAnswered->answer, $question->option_a) == 0) checked @endif>
                                                {{ $question->option_a }}
                                            </label>
                                        </div>
                                        <div>
                                            <label class="pr-6 py-2 cursor-pointer">
                                                <input class="cursor-pointer" type="radio" name="answer"
                                                    value="{{ $question->option_b }}"
                                                    @if ($isAnswered && strcmp($isAnswered->answer, $question->option_b) == 0) checked @endif>
                                                {{ $question->option_b }}
                                            </label>
                                        </div>
                                        <div>
                                            <label class="pr-6 py-2 cursor-pointer">
                                                <input class="cursor-pointer" type="radio" name="answer"
                                                    value="{{ $question->option_c }}"
                                                    @if ($isAnswered && strcmp($isAnswered->answer, $question->option_c) == 0) checked @endif>
                                                {{ $question->option_c }}
                                            </label>
                                        </div>
                                        <div>
                                            <label class="pr-6 py-2 cursor-pointer">
                                                <input class="cursor-pointer" type="radio" name="answer"
                                                    value="{{ $question->option_d }}"
                                                    @if ($isAnswered && strcmp($isAnswered->answer, $question->option_d) == 0) checked @endif>
                                                {{ $question->option_d }}
                                            </label>
                                        </div>
                                        <div>
                                            <label class="pr-6 py-2 cursor-pointer">
                                                <input class="cursor-pointer" type="radio" name="answer"
                                                    value="{{ $question->option_e }}"
                                                    @if ($isAnswered && strcmp($isAnswered->answer, $question->option_e) == 0) checked @endif>
                                                {{ $question->option_e }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="my-4">
                                            @if ($isAnswered && $isAnswered->answer != null)
                                                <textarea class="w-full h-36 border-2 rounded-xl p-4" name="answer" id=""
                                                    placeholder="Masukan jawaban...">{{ $isAnswered->answer }}
                                            </textarea>
                                            @else
                                                <textarea class="w-full h-36 border-2 rounded-xl p-4" name="answer" id=""
                                                    placeholder="Masukan jawaban..."></textarea>
                                            @endif
                                        </div>
                                    @endif
                                    <input type="text" name="scores" value="0" class="hidden">
                                </div>
                                <div class="pt-28 w-full flex justify-end gap-2">
                                    @if ($key != 0)
                                        <button type="button" id="prevButton"
                                            class="px-8 py-2 bg-[#2c2c2c] hover:bg-[#525252] text-white rounded-xl"
                                            data-url="{{ route('pelatihan.soal', ['id' => $id, 'page' => $key]) }}">
                                            Prev
                                        </button>
                                    @endif
                                    @if ($key != ($total - 1))
                                        <button type="button" id="nextButton"
                                            class="px-8 py-2 bg-[#2c2c2c] hover:bg-[#525252] text-white rounded-xl"
                                            data-url="{{ route('pelatihan.soal', ['id' => $id, 'page' => $key + 2]) }}">
                                            Next
                                        </button>
                                    @endif
                                    @if ($key == ($total - 1))
                                        <button x-on:click="open = !open" type="button"
                                            class="px-8 py-2 bg-[#2a61d8] hover:bg-[#525252] text-white rounded-xl" data-url="{{ route('pelatihan.detail', $id)}}">
                                            Finish
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </form>
                </section>
            </div>
            <div x-show="open" @click.away="open = false" x-cloak class="h-screen w-screen z-50 absolute top-0 left-0 flex justify-center items-center">
                <div x-on:click="open = !open" class="h-screen w-screen fixed z-40 bg-black opacity-10"></div>
                <div class="flex flex-col p-12 bg-white text-center fixed z-50 rounded-xl shadow-xl w-[640px] h-[320px] justify-between">
                    <p class="font-bold text-2xl">Peringatan Untuk Finish Pelatihan</p>
                    <p class="font-bolde text-xl">Apakah Anda yakin untuk menyelesaikan latihan soal ini? Sebaiknya periksa terlebih dahulu sebelum menyelesaikan pelatihan ini!</p>
                    <div class="flex justify-between text-white text-xl">
                        <button x-on:click="open = !open" class="px-4 py-2 bg-[#525252] rounded-lg hover:opacity-90 ">Batal</button>
                        <button id="finishButton" data-url="{{ route('pelatihan.detail', $id)}}" class="px-4 py-2 hover:opacity-90 bg-[#2a61d8] rounded-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-10">
        <p>&copy; 2024 Course Details</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function sendFormData(url, button) {
                var formData = $("#questionForm").serialize();
    
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        if (button.attr('id') === 'prevButton' || button.attr('id') === 'nextButton') {
                            window.location.href = button.data('url');
                        } else if (button.attr('id') === 'finishButton') {
                            window.location.href = button.data('url'); // Ubah halaman saat quiz selesai
                        }
                    },
                    error: function(error) {
                        console.error('Error status:', error.status);
                        console.error('Error status text:', error.statusText);
                        console.error('Error response text:', error.responseText);
                        console.error('Error details:', error);
                    }
                });
            }
    
            $("#prevButton, #nextButton, #finishButton").on('click', function() {
                var url = '{{ route('answer.post') }}'; // Pastikan rute ini benar
                sendFormData(url, $(this));
            });
        });
    
        var duration = document.getElementById('moduleDuration').innerText.trim();
        var countDownDate = localStorage.getItem('countDownDate');
    
        if (!countDownDate) {
            countDownDate = new Date().getTime() + duration * 60 * 1000;
            localStorage.setItem('countDownDate', countDownDate);
        }
    
        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();
    
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
    
            // Time calculations for minutes and seconds
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            // Display the result in the element with id="countdown"
            document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";
    
            // Change color to red if less than 10 minutes remain
            if (minutes < 10) {
                document.getElementById("countdown").classList.add('warning');
            }
    
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Latihan Berakhir";
                localStorage.removeItem('countDownDate');
    
                // Automatically submit the form
                var finishButton = $("#finishButton");
                var url = '{{ route('answer.post') }}'; // Pastikan rute ini benar
                sendFormData(url, finishButton);
            }
        }, 1000);
    </script>    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const label = document.getElementById('flagLabel');
            const flagInput = document.getElementById('flagInput');

            label.addEventListener('click', function() {
                // Toggle the input value
                flagInput.value = flagInput.value === '0' ? '1' : '0';

                // Toggle the 'flagged' class
                if (flagInput.value === '1') {
                    label.classList.add('flagged');
                } else {
                    label.classList.remove('flagged');
                }
            });
        });
    </script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
