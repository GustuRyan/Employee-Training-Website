<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // Menentukan skor berdasarkan jawaban
        $scores = 0;
        if ($request->option_id != null) {
            // Memeriksa apakah jawaban benar sama dengan jawaban yang diberikan
            $scores = strcmp($request->true_answer, $request->answer) === 0 ? 10 : 0;
        }
        

        // Validasi data request
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'modul_id' => 'nullable|integer',
            'option_id' => 'nullable|integer',
            'essai_id' => 'nullable|integer',
            'answer' => 'nullable|string',
            'flag' => 'nullable|integer',
            'scores' => 'nullable|integer',
        ]);

        // Menggabungkan nilai skor ke dalam data yang sudah divalidasi
        $validatedData['scores'] = $scores;

        // Menentukan kondisi pencarian untuk update atau create
        $conditions = [
            'user_id' => $validatedData['user_id'],
            'modul_id' => $validatedData['modul_id'],
            'option_id' => $validatedData['option_id'],
            'essai_id' => $validatedData['essai_id'],
        ];

        // Membuat atau memperbarui rekaman penilaian
        $penilaian = Penilaian::updateOrCreate($conditions, [
            'user_id' => $validatedData['user_id'],
            'modul_id' => $validatedData['modul_id'],
            'option_id' => $validatedData['option_id'],
            'essai_id' => $validatedData['essai_id'],
            'answer' => $validatedData['answer'],
            'flag' => $validatedData['flag'],
            'scores' => $validatedData['scores'],
        ]);

        // Mengembalikan respon JSON
        return response()->json([
            'message' => 'Penilaian berhasil dibuat atau diperbarui!',
            'penilaian' => $penilaian,
        ]);
    }
}
