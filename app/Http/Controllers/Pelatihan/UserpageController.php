<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;
use App\Models\Topic;
use App\Models\QuestionOption;
use App\Models\QuestionEssay;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class UserpageController extends Controller
{
    public function index($id)
    {
        $moduls = Modules::query();

        if ($id != 'Semua') {
            $moduls->where('id_topik', $id);
            $id = Topic::findOrFail($id);
            $id = $id->nama_topik;
        }
        $moduls = $moduls->paginate(6);

        $topics = Topic::all();

        return view('user.pages.pelatihan.index', compact('moduls', 'topics', 'id'));
    }

    public function detail($id)
    {
        $modul = Modules::findOrFail($id);
        $total = $modul->jumlah_option + $modul->jumlah_esai;

        return view('user.pages.pelatihan.detail', compact('modul', 'id', 'total'));
    }

    public function soal($id)
    {
        $modul = Modules::findOrFail($id);
        $total = $modul->jumlah_option + $modul->jumlah_esai;

        // Periksa apakah urutan soal sudah ada di sesi
        if (!session()->has('shuffled_questions')) {
            // Ambil soal pilihan ganda
            $options = QuestionOption::where('id_modul', $id)
                ->inRandomOrder()
                ->limit($modul->jumlah_option)
                ->get()
                ->map(function ($item) {
                    $item->type = 'option';
                    return $item;
                });
            $options = $options->take($modul->jumlah_option);
            // Ambil soal esai
            $essais = QuestionEssay::where('id_modul', $id)
                ->inRandomOrder()
                ->get()
                ->map(function ($item) {
                    $item->type = 'essay';
                    return $item;
                });
            $essais = $essais->take($modul->jumlah_essai);
            // Gabungkan kedua hasil ke dalam satu koleksi
            $questions = $options->merge($essais);

            $shuffled = $questions->take($total);
            $shuffled = $shuffled->shuffle();

            // Simpan urutan soal ke sesi
            session(['shuffled_questions' => $shuffled]);
        } else {
            // Ambil urutan soal dari sesi
            $shuffled = session('shuffled_questions');
        }

        $total = $shuffled->count();

        // Paginasi manual
        $page = Paginator::resolveCurrentPage('page');
        $perPage = 1; // Jumlah item per halaman
        $offset = ($page - 1) * $perPage;
        $paginatedItems = $shuffled->slice($offset, $perPage)->all();
        $paginatedQuestions = new LengthAwarePaginator($paginatedItems, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);

        return view('user.pages.pelatihan.latihan', compact('paginatedQuestions', 'total', 'shuffled', 'id', 'modul'));
    }

    public function restartSession()
    {
        // Menghapus semua data sesi
        session()->flush();

        return redirect()->route('login');
    }

}
