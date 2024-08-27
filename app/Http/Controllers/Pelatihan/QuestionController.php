<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use App\Models\QuestionEssay;

class QuestionController extends Controller
{
    // Display a listing of the questions
    public function index()
    {
        $questionsOpt = QuestionOption::paginate(10);
        $questionsEssay = QuestionEssay::paginate(10);
        return view('admin.pages.pelatihan.questions.index', compact('questionsOpt', 'questionsEssay'));
    }

    // Show the form for creating a new question
    public function createOpt()
    {
        return view('admin.pages.pelatihan.questions.option.create');
    }

    public function createEssay()
    {
        return view('admin.pages.pelatihan.questions.essay.create');
    }

    // Store a newly created question in the database
    public function storeOpt(Request $request)
    {
        $request->validate([
            'soal' => 'required',
            'jawaban' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'id_modul' => 'required|exists:modules,id',
        ]);

        QuestionOption::create($request->all());
        return redirect()->route('questions.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function storeEssay(Request $request)
    {
        $request->validate([
            'soal' => 'required',
            'jawaban' => 'required',
            'id_modul' => 'required|exists:modules,id',
        ]);

        QuestionEssay::create($request->all());
        return redirect()->route('questions.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    // Show the form for editing the specified question
    public function editOpt(QuestionOption $questionOpt)
    {
        return view('admin.pages.pelatihan.questions.option.edit', compact('questionOpt'));
    }

    public function editEssay(QuestionEssay $questionEssay)
    {
        return view('admin.pages.pelatihan.questions.essay.edit', compact('questionEssay'));
    }

    // Update the specified question in the database
    public function updateOpt(Request $request, QuestionOption $questionOpt)
    {
        $request->validate([
            'soal' => 'required',
            'jawaban' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'id_modul' => 'required|exists:modules,id',
        ]);

        $questionOpt->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Soal berhasil diedit.');
    }

    public function updateEssay(Request $request, QuestionEssay $questionEssay)
    {
        $request->validate([
            'soal' => 'required',
            'jawaban' => 'required',
            'id_modul' => 'required|exists:modules,id',
        ]);

        $questionEssay->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Soal berhasil diedit.');
    }

    // Remove the specified question from the database
    public function destroyOpt(QuestionOption $questionOpt)
    {
        $questionOpt->delete();
        return redirect()->route('questions.index')->with('success', 'Soal berhasil dihapus.');
    }

    public function destroyEssay(QuestionEssay $questionEssay)
    {
        $questionEssay->delete();
        return redirect()->route('questions.index')->with('success', 'Soal berhasil dihapus.');
    }
}
