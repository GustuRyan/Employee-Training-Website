<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;
use App\Models\Topic;

class ModulController extends Controller
{
    public function index($id)
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $moduls = Modules::query();

        if ($id != 'Semua') {
            $moduls->where('id_topik', $id);
            $id = Topic::findOrFail($id);
            $id = $id->nama_topik;
        }
        $moduls = $moduls->paginate(6);

        $topics = Topic::all();

        return view('admin.pages.pelatihan.modul.index', compact('moduls', 'topics', 'id'));
    }

    public function create()
    {
        $topics = Topic::all();

        return view('admin.pages.pelatihan.modul.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_modul' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'id_topik' => ['required'],
            'durasi' => ['required'],
            'jumlah_option' => ['required'],
            'jumlah_esai' => ['required'],
        ]);

        $request = Modules::create([
            'nama_modul' => $request->nama_modul,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'id_topik' => $request->id_topik,
            'durasi' => $request->durasi,
            'jumlah_option' => $request->jumlah_option,
            'jumlah_esai' => $request->jumlah_esai,
        ]);

        return redirect()->route('pelatihan.modul.create')->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $topics = Topic::all();
        $modul = Modules::findOrFail($id);
        $topik = Topic::findOrFail($modul->id_topik);

        return view('admin.pages.pelatihan.modul.update', compact('topics', 'modul', 'topik'));
    }

    public function update(Request $request, Modules $modul) // Use route model binding
    {
        $request->validate([
            'nama_modul' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'id_topik' => ['required'],
            'durasi' => ['required'],
            'jumlah_option' => ['required'],
            'jumlah_esai' => ['required'],
        ]);

        $modul->update([
            'nama_modul' => $request->nama_modul,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'id_topik' => $request->id_topik,
            'durasi' => $request->durasi,
            'jumlah_option' => $request->jumlah_option,
            'jumlah_esai' => $request->jumlah_esai,
        ]);

        return redirect()->route('pelatihan.modul.edit', $modul->id_topik)->with('success', 'Data created successfully.');
    }

    public function destroy(Modules $modul) // Use route model binding
    {
        $modul->delete();
        alert()->success('Hore!', 'Modul Telah Berhasil Dihapus');

        return redirect()->route('pelatihan.modul.index', 'Semua');
    }
}
