<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'nama_topik' => ['required', 'string', 'max:255']
        ]);

        $request = Topic::create([
            'nama_topik' => $request->nama_topik
        ]);

        return redirect()->route('pelatihan.modul.index', 'Semua')->with('success', 'Data created successfully.');
    }

    public function update (Request $request, Topic $topic) 
    {
        $request->validate([
            'nama_topik' => ['required', 'string', 'max:255']
        ]);

        $topic->update([
            'nama_topik' => $request->nama_topik
        ]);

        return redirect()->route('pelatihan.modul.index', 'Semua')->with('success', 'Data updated successfully.');
    }

    public function destroy(Topic $topic) // Use route model binding
    {
        $topic->delete();
        alert()->success('Hore!', 'Topic Telah Berhasil Dihapus');

        return redirect()->route('pelatihan.modul.index', 'Semua');
    }
}
