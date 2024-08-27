<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Forum Feedback</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="w-full h-full p-20">
        <div class="flex flex-col justify-center items-center">
            <div class="w-[720px] flex flex-col p-4 border-2 rounded-xl mt-8">
                <form action="{{ route('feedback.post') }}" method="POST">
                    @csrf
                    <input type="text" class="hidden" name="pengguna" value="1">
                    Masukan Komentar Baru
                    <textarea name="komentar" id="" cols="30" rows="10" class="w-full h-24 p-4 border-2 rounded-xl mt-2"></textarea>
                    <div class="w-full flex justify-end mt-2">
                        <button type="submit" class="px-4 py-3 bg-green-500 rounded-xl text-white font-bold">
                            Posting
                        </button>
                    </div>
                </form>
            </div>
            @foreach ($commands as $command)
                @if ($command->parent == null)
                    <div class="w-[720px] flex flex-col p-4 border-2 rounded-xl mt-8">
                        <span class="font-bold text-lg" >{{ $command->pengguna->nama }}</span>
                        <p>{{ $command->komentar }}</p>
                        <div class="w-full flex justify-end mb-2">
                            <button class="font-bold" onclick="showReplyForm({{ $command->id }})">Reply</button>
                            <form action="{{ route('feedback.like') }}" method="POST" class="mx-8">
                                @csrf
                                <input type="hidden" name="id_komen" value="{{ $command->id }}">
                                <input type="hidden" name="id_pengguna" value="{{ $command->id_pengguna }}">
                                @php
                                    $total_likes = App\Models\Like::where('id_komen', $command->id);
                                    $total_likes = $total_likes->count();
                                @endphp
                                <span class="font-bold">
                                    {{ $total_likes }}
                                </span>
                                <button type="submit" class="bg-red-500 px-2 py-1 rounded-full text-white font-bold">
                                    Likes
                                </button>
                            </form>
                            <form action="{{ route('feedback.share') }}" method="POST" class="">
                                @csrf
                                <input type="hidden" name="id_komen" value="{{ $command->id }}">
                                <input type="hidden" name="id_pengguna" value="{{ $command->id_pengguna }}">
                                @php
                                    $total_shares = App\Models\Share::where('id_komen', $command->id);
                                    $total_shares = $total_shares->count();
                                @endphp
                                <span class="font-bold">
                                    {{ $total_shares }}
                                </span>
                                <button type="submit" class="bg-blue-500 px-2 py-1 rounded-full text-white font-bold">
                                    Shares
                                </button>
                            </form>
                        </div>
                        <div id="reply-form-{{ $command->id }}" class="reply-form w-full flex flex-col p-4 border-2 rounded-xl my-2 hidden">
                            <form action="{{ route('feedback.reply') }}" method="POST">
                                @csrf
                                <input type="hidden" name="pengguna" value="1">
                                <input type="hidden" name="parent" value="{{ $command->id }}">
                                Masukan Komentar Baru
                                <textarea name="komentar" cols="30" rows="10" class="w-full h-24 p-4 border-2 rounded-xl mt-2"></textarea>
                                <div class="w-full flex justify-end mt-2">
                                    <button type="submit" class="px-4 py-3 bg-green-500 rounded-xl text-white font-bold">
                                        Posting
                                    </button>
                                </div>
                            </form>
                        </div>
                        @php
                            // Panggil fungsi showComments dari controller jika ada child-nya
                            $controller = app('App\Http\Controllers\FeedbackController'); // Ganti 'YourController' dengan nama controller kamu
                            echo $controller->showComments($command->id);
                        @endphp
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        function showReplyForm(commandId) {
            var form = document.getElementById('reply-form-' + commandId);
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
            } else {
                form.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
